<?php  
include("Class/function.php");
$obj= new BlogProject();

if(isset($_GET['status'])){
    if($_GET['status']='edit'){
        $id = $_GET['id'];
        $cats_edit_data = $obj->display_cat_by_id($id);
    }
}

if(isset($_POST['u_sub_btn'])){
    $msg = $obj->update_category($_POST);
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Category Edit</title>
</head>

<body>
    <h2 class="text-center">Category Edit Page</h2>
    <form action="" method="POST" class="px-5">
        <?php if(isset($msg)){echo $msg;} ?>
        <div class="form-group">
            <label for="cat_name" class="mb-1">Category Name</label>
            <input type="text" class="form-control" name="u_cat_name" id="cat_name" value="<?php echo $cats_edit_data['cat_name']; ?>">
        </div>
        <div class="form-group">
            <label for="cat_des" class="mb-1">Category Description</label>
            <input type="text" class="form-control" name="u_cat_des" id="cat_des" value="<?php echo $cats_edit_data['cat_des']; ?>">
        </div>
        <input type="hidden" name="category_id" id="" value="<?php echo $cats_edit_data['cat_id']; ?>">
        <input type="submit" name="u_sub_btn" id="" value="Update Category" class="form-control my-2 btn btn-primary">
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
</body>

</html>