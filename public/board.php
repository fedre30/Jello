<?php require_once('../src/init.php'); ?>
<?php
if (isset($_GET['id'])) {
    $board = $db->getBoard($_GET['id']);

    if ($board === false OR authenticatedUserId() !== $board['ownerID']) {
        $error = 'Board does not exist';
        require_once('../src/error.php');
        exit;
    } else {
        $lanes = $db->getBoardLanes($_GET['id']);
        require_once('../src/boardPage.php');
    }


} else {
    $error = 'BoardID not specified';
    require_once('../src/error.php');
    exit;
}

?>

