<?php
require_once('../src/init.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['name']) && $_POST['name'] !==''){
        $name = $_POST['name'];
    }
    else{
        die('Name is required');
    }


    if(isset($_POST['boardID'])){
        $boardID = $_POST['boardID'];
    }
    else{
        die('BoardID is required');
    }

    if($db->createLane($boardID, $name)){
        redirectToBoard($db);
    }
}

