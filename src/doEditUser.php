<?php
if (!isset($_POST['userID']) || empty($_POST['lastName']) || empty($_POST['firstName']) || empty($_POST['email']) || empty($_POST['password'])) {
    header('Location: board.php?error=noidorelseprovided');
    exit;
}

try {
    $conn = new PDO('mysql:host=localhost;dbname=jello', 'root', 'root');
} catch (PDOException $e) {
    die($e->getMessage());
}

//require_once 'init.php';

$request = 'UPDATE `users` SET `lastName` = :lastName, `firstName` = :firstName, `email` = :email, `password` = :password WHERE `userID` = :userID;';

$stmt = $conn->prepare($request);
$stmt->bindValue(':userID', $_POST['userID']);
$stmt->bindValue(':lastName', $_POST['lastName']);
$stmt->bindValue(':firstName', $_POST['firstName']);
$stmt->bindValue(':email', $_POST['email']);
$stmt->bindValue(':password', $_POST['password']);
$stmt->execute();
header('Location: account.php?userID=1');