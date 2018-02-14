<?php
require_once('../src/init.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['cardID'])){
        $cardID = $_POST['cardID'];
    }
    else{
        die('no CardID');
    }

    if($db->deleteCard($cardID)){
        redirectToBoard($db);
    }
}
