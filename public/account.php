<?php
require_once '../src/init.php';

if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovidedaccount.php');
    exit;
}

$row = $db->getUserInformation($_GET['id']);
var_dump($row);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
    <link rel="stylesheet" href="style/main.css" />
</head>
<body class="account">
<p><span class="field">First name:</span> <?= $row['firstName'] ?></p>
<p><span class="field">Last name:</span> <?= $row['lastName'] ?></p>
<p><span class="field">E-mail:</span> <?= $row['email'] ?></p>


<a href="board.php?id=<?= $_GET['id'] ?>">Go back</a>
</body>
</html>
