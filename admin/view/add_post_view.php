<?php  
$categories = $obj->display_cat();

if(isset($_POST['add_post'])){
    $return_msg = $obj->add_post($_POST);
}
?>


<h2>Add Post Page</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <?php if (isset($return_msg)) {
        echo $return_msg;
    } ?>
    <div class="form-group">
        <label for="post_title" class="mb-1">Post Title</label>
        <input type="text" class="form-control py-4" name="post_title" id="post_title">
    </div>
    <div class="form-group">
        <label for="post_content" class="mb-1">Post Content</label>
        <textarea name="post_content" id="post_content" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="post_img">Upload Thumbnail</label><br>
        <input type="file"  name="post_img" id="post_img">
    </div>
    <div class="form-group">
        <label for="post_cat" class="mb-1">Select Post Category</label>
        <select name="post_cat" id="post_cat" class="form-control">
            <?php while($category = mysqli_fetch_assoc($categories)){ ?>
                <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
                <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_summary" class="mb-1">Post Summary</label>
        <input type="text" class="form-control py-4" name="post_summary" id="post_summary">
    </div>
    <div class="form-group">
        <label for="post_tags" class="mb-1">Post Tags</label>
        <input type="text" class="form-control py-4" name="post_tags" id="post_tags">
    </div>
    <div class="form-group">
        <label for="post_status" class="mb-1">Post Status</label>
        <select name="post_status" id="post_status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input type="submit" name="add_post" id="" value="Add Post" class="btn btn-block btn-primary">
</form>