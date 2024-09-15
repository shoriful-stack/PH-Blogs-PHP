<?php
$posts_data = $obj->display_post();
if(isset($_GET['status'])){
    if($_GET['status']='deletePost'){
        $id = $_GET['id'];
        $del_post_msg = $obj->del_post($id);
    }
}

?>


<h2>Manage Post Page</h2>
<?php if(isset($del_post_msg)){echo $del_post_msg;} ?>
<div class="table-responsive">
    <table class="table">
        <?php if (isset($return_msg)) {
            echo $return_msg;
        } ?>
        <thead>
            <tr>
                <th>Id</th>
                <th>Post Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Category</th>
                <th>Author</th>
                <th>Date</th>
                <th>Comment</th>
                <th>Tag</th>
                <th>Summary</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($post_data = mysqli_fetch_assoc($posts_data)) { ?>
                <tr>
                    <td> <?php echo $post_data['post_id']; ?> </td>
                    <td><?php echo $post_data['post_title']; ?></td>
                    <td><?php echo $post_data['post_content']; ?></td>
                    <td>
                        <img style="height: 80px; width: 120px;" src="../upload/<?php echo $post_data['post_img']; ?>" alt=""><br>
                        <a href="edit_img.php?status=editImg&&id=<?php echo $post_data['post_id']; ?>">Change</a>
                    </td>
                    <td><?php echo $post_data['cat_name']; ?></td>
                    <td><?php echo $post_data['post_author']; ?></td>
                    <td><?php echo $post_data['post_date']; ?></td>
                    <td><?php echo $post_data['post_comment_count']; ?></td>
                    <td><?php echo $post_data['post_tag']; ?></td>
                    <td><?php echo $post_data['post_summary']; ?></td>
                    <td><?php if ($post_data['post_status'] == 1) {
                            echo "Published";
                        } else {
                            echo "Unpublished";
                        } ?></td>
                    <td>
                        <a class="btn btn-success mb-2" href="post_edit.php?status=editPost&&id=<?php echo $post_data['post_id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="?status=deletePost&&id=<?php echo $post_data['post_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>