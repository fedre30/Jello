<?php
class Database {
    const NAME = "jello";
    const HOST = "localhost";
    const PORT = 8889;
    const USERNAME = "root";
    const PASSWORD = "root";
    function __construct()
    {
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ];

        try{
            $conn = new PDO('mysql:host='.Database::HOST.':'.Database::PORT.';dbname='.Database::NAME, Database::USERNAME, Database::PASSWORD, $options);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS jello";
            $conn->exec($sql);
            $sql = "use jello";
            $conn->exec($sql);
            echo "DB created successfully";
        }
        catch(PDOException $e){
            die('DB Error');
        }

    }
    function createUser($firstName, $lastName, $email, $password) {
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
        if($passwordHashed === false){
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
    function connectUser($email, $password){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $result = $stmt->fetchAll();
        if(count($result) === 0){
            return false;
        }
        $passwordHashed = $result[0]['password'];
        $passwordVerified = password_verify($password, $passwordHashed);
        if($passwordVerified === false){
            return false;
        }
        else{
            setcookie("JelloUser", serialize(['id' => $result[0]['userID'], 'email' => $result[0]['email']]), time() + 60*60*24*365);
            return true;
        }
    }
    function createBoard($userId){
        $stmt = $this->db->prepare("INSERT INTO boards(ownerID) VALUES (:userId)");
        $stmt->execute([
            ':userId' => $userId
        ]);
        // TODO: return true if everything is okay, else false
    }

   /* function createLane($laneID) {
        $stmt = $this->db->prepare("INSERT INTO boards(boardID) VALUES (:laneID)");
        $stmt->execute([
            ':laneId' => $laneID;
        ]);
    }

    function createCard($cardID, $title, $description, $tags, $cardPosition) {
        $stmt = $this->db->prepare("INSERT INTO board_lane(laneID) VALUES (:cardID, :title, :description, :tags, :cardPosition)");
        $stmt->execute([
            ':cardID' => $cardID;
            ':title' => $title;
            ':description' => $description;
            ':tags' => $tags;
            ':cardPosition' => $cardPosition;
        ]);
    }*/

}
