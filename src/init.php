<?php
require("db.php");
$db = new Database();
function isAuthenticated() {
    return isset($_COOKIE['JelloUser']);
}
function authenticatedUserId() {
    if (false === isAuthenticated())
        return null;
    $cookieData = unserialize($_COOKIE['JelloUser']);
    return $cookieData['id'];
}
function authenticatedUserEmail() {
    if (false === isAuthenticated())
        return null;
    $cookieData = unserialize($_COOKIE['JelloUser']);
    return $cookieData['email'];
}

function redirectToIndex() {
    header("Location: /");
    die();
}

function redirectToBoard($db) {
    $boards = $db->getUserBoards(authenticatedUserId());
    header("Location: /board.php?id=".$boards[0]['boardID']);
    die();
}

function logOut() {
    setcookie('JelloUser', null, -1);
    redirectToIndex();
}