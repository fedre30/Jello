<?php require_once('../src/init.php'); ?>
<?php
if (false === isset($_GET['id']))
    die('Missing board ID');
$lanes = $db->getBoardLanes($_GET['id']);
?>

<!DOCTYPE html>
<html>
<?php require_once('../src/head.php'); ?>
<body>
<div class="boardPage">
    <div class="toolBar">
        <h4 class="toolBar_title">SEMAINE INTENSIVE PHP</h4>
    </div>
    <?php foreach ($lanes as $lane) {
        $cards = $db->getLanesCards($lane['laneID']);
        ?>
    <div class="cardArea_container">
        <h4 class="cardArea_container_title"><?= $lane['name'] ?></h4>
        <?php foreach ($cards as $card) { ?>
        <div class="cardArea_wrapper">
          <div class="cardArea_card"><?= $card['cardId'] ?>
            <div class="cardArea_title"><?= $card['title'] ?></div>
            <div class="cardArea_tags"><?= $card['tags'] ?></div>
            <div class="cardArea_description"><?= $card['description'] ?></div>
          </div>
        </div>
        <?php } ?>
        <form action="" method="get">
            <label for="cardTitle" class="label-card"></label>
            <input type="text" name="cardTitle" id="cardTitle">
            <label for="description" class="label-card"></label>
            <textarea id="description" name="cardDescription"></textarea>
            <label for="tags" class="label-card"></label>
            <input type="color" id="tags" name="cardTags">
            <input type="submit"  value="Submit">
        </form>
    </div>
    <?php } ?>
    <div class="cardArea_addList">
      <form action="" method="get">
        <label for="listTitle" class="label-list"></label>
        <input type="text" placeholder="Add list">
        <input type="submit" value="Submit">
      </form>
    </div>

</div>
<script src="/JS/addCard.js"></script>
</body>
</html>
