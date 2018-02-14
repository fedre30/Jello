<?php

class Database
{
    const NAME = "jello";
    const HOST = "localhost";
    const PORT = 3306;
    const USERNAME = "root";
    const PASSWORD = "root";

    private $db;

    function __construct()
    {
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ];

        try {
            $this->db = new PDO('mysql:host=' . Database::HOST . ':' . Database::PORT . ';dbname=' . Database::NAME, Database::USERNAME, Database::PASSWORD, $options);
        } catch (PDOException $conn) {
            $conn = new PDO("mysql:host=" . Database::HOST , Database::USERNAME, Database::PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS jello";
            $conn->exec($sql);
        }

    }

    //USER

    function createUser($firstName, $lastName, $email, $password)
    {
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        if ($passwordHashed === false) {
            return false;
        }
        $stmt = $this->db->prepare("INSERT INTO users (lastName, firstName, email, password) VALUES (:lastName, :firstName, :email, :password)");
        $stmt->execute([
            ':lastName' => $lastName,
            ':firstName' => $firstName,
            ':email' => $email,
            ':password' => $passwordHashed
        ]);
        $result = $stmt->rowCount();
        return $result === 1;
    }

    function connectUser($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $result = $stmt->fetchAll();
        if (count($result) === 0) {
            return false;
        }
        $passwordHashed = $result[0]['password'];
        $passwordVerified = password_verify($password, $passwordHashed);
        if ($passwordVerified === false) {
            return false;
        } else {
            setcookie("JelloUser", serialize(['id' => $result[0]['userID'], 'email' => $result[0]['email']]), time() + 60 * 60 * 24 * 365);
            return true;
        }
    }

    // CREATE

    function createBoard($userId)
    {
        $stmt = $this->db->prepare("INSERT INTO boards(ownerID) VALUES (:userId)");
        $stmt->execute([
            ':userId' => $userId
        ]);
        $result = $stmt->rowCount();
        return $result === 1;

    }

    function createCard($title, $description, $tags, $laneId) {
         $stmt = $this->db->prepare("INSERT INTO cards(title, description, tags, cardPosition) VALUES (:title, :description, :tags, :cardPosition)");
         $stmt->execute([
             ':title' => $title,
             ':description' => $description,
             ':tags' => $tags,
             ':cardPosition' => $laneId
         ]);
         $result = $stmt->rowCount();
         return $result === 1;
    }

    // READ

    function getBoardLanes($boardId){
        $stmt = $this->db->prepare('SELECT * FROM board_lanes WHERE boardID = :boardId');
        $stmt->execute([':boardId' => $boardId]);
        $result = $stmt->fetchAll();

        return $result;
    }

    function getLanesCards($cardPosition){
        $stmt = $this->db->prepare('SELECT * FROM cards WHERE cardPosition = :cardPosition');
        $stmt->execute([':cardPosition'=> $cardPosition]);
        $result = $stmt->fetchAll();

        return $result;
    }

    function getBoardFromCard($cardId){
        $stmt = $this->db->prepare('SELECT * FROM cards
                                                  JOIN board_lanes
                                                    ON  cards.cardPosition = board_lanes.laneID
                                                  JOIN boards
                                                    ON board_lanes.boardID = boards.boardID
                                                WHERE cards.cardID = :cardId');
        $stmt->execute([':cardId' => $cardId]);
        $result = $stmt->fetchAll();

        return $result;
    }

    function getUserInformation($userID) {
        $request = 'SELECT `lastName`, `firstName`, `email`, `password` FROM `users` WHERE `userID` = :userID;';

        $stmt = $this->db->prepare($request);
        $stmt->bindValue(':userID', $userID);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    //UPDATE

    function updateCard($cardID, $title, $description, $cardPosition){
        $stmt = $this->db->prepare('UPDATE cards SET title = :title, description = :description, cardPosition = :cardPosition WHERE cardID = :cardID');
        $stmt->execute([
            ':cardID'=> $cardID,
            ':title'=>$title,
            ':description'=>$description,
            ':cardPosition'=>$cardPosition
        ]);
    }


    // DELETE
}
