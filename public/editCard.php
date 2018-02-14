<?php
require_once('../src/init.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['title']) && $_POST['title'] !==''){
        $title = $_POST['title'];
    }
    else{
        die('Title is required');
    }

    $description = '';
    if(isset($_POST['description'])){
        $description = $_POST['description'];
    }

    if(isset($_POST['cardPosition'])){
        $cardPosition = $_POST['cardPosition'];
    }
    else{
        die('LaneID is required');
    }

    if(isset($_POST['cardID'])){
        $cardID = $_POST['cardID'];
    }
    else{
        die('no CardID');
    }

    if($db->updateCard($cardID, $title, $description, $cardPosition)){
        redirectToBoard($db);
    }
}
