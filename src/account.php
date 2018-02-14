<?php
    require_once '../src/init.php';

    if (!isset($_GET['userID'])) {
        header('Location: index.php?error=noidprovidedaccount.php');
        exit;
    }

    $row = $db->getUserInformation($_GET['userID']);
/*
    try {
        $conn = new PDO('mysql:host=localhost;dbname=jello', 'root', 'root');
    } catch (PDOException $e) {
        die($e->getMessage());
    }


    $request = 'SELECT `lastName`, `firstName`, `email`, `password` FROM `users` WHERE `userID` = :userID;';

    $stmt = $conn->prepare($request);
    $stmt->bindValue(':userID', $_GET['userID']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    */
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
    <a href="board.php">Go back</a>

    <form action="doEditUser.php" method="post">
        <input type="hidden" name="userID" value="<?=$row['userID']?>">
        <label for="lastName"></label> <input type="text" name="lastName" value="<?=$row['lastName']?>">
        <label for="firstName"></label> <input type="text" name="firstName" value="<?=$row['firstName']?>">
        <label for="email"></label> <input type="text" name="email" value="<?=$row['email']?>">
        <label for="password"></label> <input type="password" name="password" value="<?=$row['password']?>">
        <input type="submit" value="submit">
    </form>
</body>
</html>
