<!DOCTYPE html>
<html>
<?php require_once('../src/head.php'); ?>
<body>
<?php require_once ('header.php') ?>
<div class="boardPage">
    <div class="toolBar">
        <h4 class="toolBar_title">JELLO</h4>
    </div>


    <form class="formAddLane" action="addLane.php" method="post">
        <input type="hidden" name="boardID" value="<?= $board['boardID'] ?>">
        <input type="text" name="name" placeholder="Name">
        <input type="submit">
    </form>
    <?php foreach ($lanes as $lane) { ?>
        <div class="cardArea_container">
            <?php $cards = $db->getLanesCards($lane['laneID']); ?>

            <div class="cardArea_container_title">
                <div style="margin-top: 40px;"><?= $lane['name'] ?></div>

                <form  class="deleteLane" action="deleteLane.php" method="post">
                    <input type="hidden" name="laneID" value="<?= $lane['laneID'] ?>" >
                    <input type="submit" value="Delete">
                </form>
            </div>

            <div class="cardArea_addCard">
                <form class="formAddCard" action="addCard.php" method="post">
                    <input type="hidden" name="cardPosition" value="<?= $lane['laneID'] ?>">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title">
                    <label for="description-add">Description</label>
                    <textarea name="description" id="description-add"></textarea>
                    <input type="submit">
                </form>
            </div>

            <?php foreach ($cards as $card) { ?>
                <div class="cardArea_card">
                    <form class="editForm" action="editCard.php" method="post">
                        <input type="hidden" name="cardID" value="<?= $card['cardID'] ?>">
                        <div class="cardTitle">
                            <label for="title">Title</label>
                            <input class="formEditCard"  type="text" name="title" id="title" value="<?= $card['title'] ?>">
                        </div>
                        <label for="description-<?= $card['cardID'] ?>">Description</label>
                        <textarea class="description" name="description" id="description-<?= $card['cardID'] ?>"><?= $card['description'] ?></textarea>
                        <select name="cardPosition">
                            <?php foreach ($lanes as $lanePosition) { ?>
                                <option value="<?= $lanePosition['laneID'] ?>"
                                    <?php
                                    if ($lanePosition['laneID'] === $card['cardPosition']) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $lanePosition['name'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="submit">
                    </form>

                    <form class="deleteForm" action="deleteCard.php" method="post">
                        <input type="hidden" name="cardID" value="<?= $card['cardID'] ?>">
                        <input type="submit" value="Delete">
                    </form>
                </div>
            <?php } ?>


        </div>

    <?php } ?>



</div>

</body>
</html>