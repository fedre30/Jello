<?php
require_once('../src/init.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title']) && $_POST['title'] !== '') {
        $title = htmlentities($_POST['title']);
    } else {
        $error = 'Title is required';
        require_once('../src/error.php');
        exit;
    }

    $description = '';
    if (isset($_POST['description'])) {
        $description = htmlentities($_POST['description']);
    }

    if (isset($_POST['cardPosition'])) {
        $cardPosition = $_POST['cardPosition'];
    } else {
        $error = 'Lane ID is required';
        require_once('../src/error.php');
        exit;
    }

    if (isset($_POST['cardID'])) {
        $cardID = $_POST['cardID'];
    } else {
        $error = 'No card ID';
        require_once('../src/error.php');
        exit;
    }

    $db->updateCard($cardID, $title, $description, $cardPosition);
    redirectToBoard($db);
}
