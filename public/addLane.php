<?php
require_once('../src/init.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['name']) && $_POST['name'] !==''){
        $name = htmlentities($_POST['name']);
    }
    else{
        $error = 'Name is required';
        require_once('../src/error.php');
        exit;
    }


    if(isset($_POST['boardID'])){
        $boardID = $_POST['boardID'];
    }
    else{
        $error = 'Board ID is required';
        require_once('../src/error.php');
        exit;
    }

    if($db->createLane($boardID, $name)){
        redirectToBoard($db);
    }
}

