<?php
include("admin/Class/function.php");
$obj = new BlogProject();
if (isset($_GET['view'])) {
    if ($_GET['view'] == 'postView') {
        $id = $_GET['id'];
        $single = $obj->display_post_update($id);
    }
}
?>
<?php include_once("includes/head.php"); ?>
<body>
<?php include_once("includes/preloader.php"); ?>
<?php include_once("includes/header.php"); ?>
<!-- Page Content -->
<?php include_once("includes/banner.php"); ?>
<?php include_once("includes/cta.php"); ?>
<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <img src="upload/<?php echo $single['post_img']; ?>" alt="">
                <h2><?php echo $single['post_title']; ?></h2>
                <p><?php echo $single['post_content']; ?></p>
            </div>
            <?php include_once("includes/sidebar.php"); ?>
        </div>
    </div>
</section>
<?php include_once("includes/footer.php"); ?>
<?php include_once("includes/script.php"); ?>