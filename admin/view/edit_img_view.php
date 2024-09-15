<?php
if (isset($_GET['status'])) {
    if ($_GET['status']=='editImg') {
        $id = $_GET['id'];
    }
}

if (isset($_POST['img_change_btn'])) {
    $return_msg = $obj->edit_img($_POST);
}

?>



<div class="shadow m-5 p-5">
    <form action="" method="POST" enctype="multipart/form-data" class="form">
        <?php if (isset($return_msg)) {
            echo $return_msg;
        } ?>
        <input type="hidden" name="editImg_id" id="" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="change_img">Change Thumbnail</label><br>
            <input type="file" name="change_img" class="py-2" id="change_img">
        </div>
        <input type="submit" name="img_change_btn" id="img_change_btn" value="Change" class="btn btn-primary">

    </form>
</div>