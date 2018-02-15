<?php
require_once('../src/init.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['cardID'])){
        $cardID = $_POST['cardID'];
    }
    else{
        $error = 'No card ID';
        require_once('../src/error.php');
        exit;
    }

    if($db->deleteCard($cardID)){
        redirectToBoard($db);
    }
}
