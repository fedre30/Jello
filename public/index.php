<?php require_once ('../src/init.php'); ?>
<!doctype html>
<html lang="en">
<?php require('../src/head.php');
?>
<body>
<?php
    require_once('../src/loginPage.php');
    var_dump($db->createLane(2, 'first'));

?>

<a href="board.backup.php">BOARD</a>
</body>
</html>