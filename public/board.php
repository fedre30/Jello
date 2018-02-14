<?php require_once('../src/init.php'); ?>
<?php
$createLane = $db->createLane(1, 'cool');
$lanes = $db->getBoardLanes(1);
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
          <div class="cardArea_card">
            <div class="cardArea_title"><?= $card['title'] ?></div>
            <div class="cardArea_tags"><?= $card['tags'] ?></div>
            <div class="cardArea_description"><?= $card['description'] ?></div>
            <button class="cardArea_buttonEdit">details</button>
          </div>
        </div>
        <?php } ?>

    <?php } ?>
  <!--  <div class="cardArea_addList">
      <form action="db.php" method="get">
        <label for="board_lanes" class="label-list"></label>
        <input type="text" name="boardTitle" id="title">
        <input type="submit" value="Submit">
      </form>
    </div>-->

</div>
<script src="/JS/addCard.js"></script>
</body>
</html>

