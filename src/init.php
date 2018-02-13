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