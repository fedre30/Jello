<?php require_once ('../src/init.php'); ?>
<!doctype html>
<html lang="en">
<?php require('../src/head.php');
?>
<body>
<?php
    require_once('../src/loginPage.php');

    echo '<pre>'; var_dump($db->getBoardLanes(1));
    var_dump($db->getLanescards(1)); echo '</pre>';

?>

<a href="board.backup.php">BOARD</a>
</body>
</html>