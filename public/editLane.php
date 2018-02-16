<?php
require_once('../src/init.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && $_POST['name'] !== '') {
        $name = htmlentities($_POST['name']);
    } else {
        $error = 'Name is required';
        require_once('../src/error.php');
        exit;
    }


    if (isset($_POST['laneID'])) {
        $laneID = $_POST['laneID'];
    } else {
        $error = 'No lane ID';
        require_once('../src/error.php');
        exit;
    }



    $db->updateLane($laneID, $name);
    redirectToBoard($db);
}
