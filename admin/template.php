<?php  
include("Class/function.php");
$obj = new BlogProject();
session_start();
$id = $_SESSION['adminId'];
if($id == null){
    header("location: index.php");
}

if(isset($_GET['adminLogout'])){
    if($_GET['adminLogout']=='logout'){
       $obj->admin_Logout();
    }
}

?>


<?php include_once("includes/head.php"); ?>

<body class="sb-nav-fixed">
    <?php include_once("includes/topnav.php"); ?>
    <div id="layoutSidenav">
        <?php include_once("includes/sideNav.php"); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <?php 
                    if(isset($view)){
                        if($view=="dashboard"){
                            include("view/dashboard_view.php");
                        }elseif ($view == "add_category") {
                            include("view/add_cate_view.php");
                        }elseif ($view == "add_post") {
                            include("view/add_post_view.php");
                        }elseif ($view == "manage_category") {
                            include("view/manage_cate_view.php");
                        }elseif ($view == "manage_post") {
                            include("view/manage_post_view.php");
                        }elseif ($view == "edit_img") {
                            include("view/edit_img_view.php");
                        }elseif ($view == "post_edit") {
                            include("view/post_edit_view.php");
                        }
                    }
                    ?>
                </div>
            </main>
            <?php include_once("includes/footer.php"); ?>
        </div>
    </div>
    <?php include_once("includes/script.php"); ?>
</body>

</html>