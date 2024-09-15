<?php 
$cats_data = $obj->display_cat();
if(isset($_GET['status'])){
    if($_GET['status']='delete'){
        $id = $_GET['id'];
        $return_msg = $obj->del_category($id);
    }
}

?>

<h2>Manage Category Page</h2>
<table class="table">
    <?php if(isset($return_msg)){echo $return_msg;} ?>
    <thead>
        <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($cat_data = mysqli_fetch_assoc($cats_data)){ ?>
        <tr>
            <td> <?php echo $cat_data['cat_id']; ?> </td>
            <td><?php echo $cat_data['cat_name']; ?></td>
            <td><?php echo $cat_data['cat_des']; ?></td>
            <td>
                <a class="btn btn-success" href="cat_edit.php?status=edit&&id=<?php echo $cat_data['cat_id']; ?>">Edit</a>
                <a class="btn btn-danger" href="?status=delete&&id=<?php echo $cat_data['cat_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>