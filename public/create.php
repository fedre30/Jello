<?php
require_once "../src/database.php";

if ($_POST) {
    $req = 'INSERT INTO
`users`
  (`lastName`, `firstName`)
 VALUES
  (:lastName, :firstName)
 ;';
    $stmt = $conn->prepare($req);
    //$stmt->bindValue(':userID', $_POST['id']);
    $stmt->bindValue(':lastName', $_POST['lastName']);
    $stmt->bindValue(':firstName', $_POST['firstName']);
    $stmt->execute();
}