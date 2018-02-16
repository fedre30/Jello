<?php
    require_once 'init.php';
?>

<nav class="navBar">
    <div class="navbar__Container">
        <div class="navBar__logo">
            <a class="navBar__logoLink" href="../../index.php">Jello</a>
        </div>
        <div class="navBar__research">
            <label for=""></label> <input class="navBar__researchInputText" type="text" placeholder="">
            <button class="navBar__researchBtn">search</button>
        </div>
        <div class="navBar__account">
            <a href="account.php?id=<?=$_GET['id']?>" class="navBar__accountText">My account</a>
            <a href="logOut.php" class="navBar__accountLogOut">Log Out</a>
        </div>
    </div>
</nav>