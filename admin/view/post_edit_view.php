<?php
if (isset($_GET['status'])) {
    if ($_GET['status']=['editPost']) {
        $id = $_GET['id'];
        $postsData = $obj->display_post_update($id);
    }
}

if(isset($_POST['update_post'])){
    $update = $obj->update_post_ct($_POST);
}

?>

<div class="shadow m-5 p-5">
    <?php if(isset($update)){echo $update;} ?>
    <form action="" method="POST" class="form">
        <input type="hidden" name="edit_post_id" id="edit_post_id" value="<?php echo $id ?>">
        <div class="form-group">
            <label for="update_title" class="mb-1">Post Title</label>
            <input value="<?php echo $postsData['post_title']; ?>" type="text" class="form-control py-4" name="update_title" id="update_title">
        </div>
        <div class="form-group">
            <label for="update_content" class="mb-1">Post Content</label><br>
            <textarea class="form_control py-4" name="update_content" id="update_content" cols="100" rows="5">
            <?php echo $postsData['post_content']; ?>
            </textarea>
        </div>
        <input class="btn btn-primary" type="submit" name="update_post" id="update_post" value="Update">
    </form>
</div>