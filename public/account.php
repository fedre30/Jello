<?php
require_once '../src/init.php';

if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovidedaccount.php');
    exit;
}

$row = $db->getUserInformation($_GET['id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="board.php?id=<?= $_GET['id'] ?>">Go back</a>

<p>First name: <?= $row['firstName'] ?></p>
<p>Last name: <?= $row['lastName'] ?></p>
<p>E-mail: <?= $row['email'] ?></p>
</body>
</html>
