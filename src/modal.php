<?php require_once('init.php'); ?>
<!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<body>



<button type="button" name="button"></button>

<div class="modal">
    <div class="modal_overlay">
        <div class="modal_content">

            

            <h4 class="modal_title"><?= $card['title'] ?></h4>
            <p class="modal_list">list : <span class="modal_selectedList"> <?= $lane['name'] ?></span></p>
            <div class="modal_filter"><input type="color"></div>
            <p class="modal_description"><?= $card['description'] ?></p>


            <div class="modal_addAction">
                <h4 class="modal_addAction_title">ADD</h4>
                <p class="modal_addAction_item">Members</p>
                <p class="modal_addAction_item">Filters</p>
                <p class="modal_addAction_item">Displace</p>
                <p class="modal_addAction_item">Delete</p>
            </div>
        </div>


    </div>
</div>
</div>
<script src="../public/JS/modal.js" type="text/javascript"></script>
</body>
</html>
