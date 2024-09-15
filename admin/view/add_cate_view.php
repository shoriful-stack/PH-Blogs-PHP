<?php 
if(isset($_POST['sub_btn'])){
    $return_msg = $obj->add_cat($_POST);
}

?>

<h2>Add Category Page</h2>
<form action="" method="POST">
    <?php if(isset($return_msg)){echo $return_msg;} ?>
<div class="form-group">
    <label for="cat_name" class="mb-1">Category Name</label>
    <input type="text" class="form-control py-4" name="cat_name" id="cat_name">
</div>
<div class="form-group">
    <label for="cat_des" class="mb-1">Category Description</label>
    <input type="text" class="form-control py-4" name="cat_des" id="cat_des">
</div>
<input type="submit" name="sub_btn" id="" value="Add Category" class="btn btn-block btn-primary">
</form>