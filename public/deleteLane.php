<?php
require_once('../src/init.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['laneID'])){
        $laneID = $_POST['laneID'];
    }
    else{
        $error = 'No lane ID';
        require_once('../src/error.php');
        exit;
    }

    if($db->deleteLane($laneID)){
        redirectToBoard($db);
    }
}
