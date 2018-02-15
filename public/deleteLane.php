<?php
require_once('../src/init.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['laneID'])){
        $laneID = $_POST['laneID'];
    }
    else{
        die('no laneID');
    }

    if($db->deleteLane($laneID)){
        redirectToBoard($db);
    }
}
