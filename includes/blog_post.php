<?php
$posts_data = $obj->display_post_public();

?>



<div class="col-lg-8">
    <div class="all-blog-posts">
        <div class="row">
            <div class="col-lg-12">
                <?php while ($post_data = mysqli_fetch_assoc($posts_data)) { ?>
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="./upload/<?php echo $post_data['post_img']; ?>" alt="">
                        </div>
                        <div class="down-content">
                            <span><?php echo $post_data['post_title']; ?></span>
                            <a href="single_post.php?view=postView&&id=<?php echo $post_data['post_id']; ?>">
                                <h4><?php echo $post_data['post_summary']; ?></h4>
                            </a>
                            <ul class="post-info">
                                <li><a href="#"><?php echo $post_data['post_author']; ?></a></li>
                                <li><a href="#"><?php echo $post_data['post_date']; ?></a></li>
                                <li><a href="#"><?php echo $post_data['post_comment_count']; ?> Comments</a></li>
                            </ul>
                            <p><?php echo $post_data['post_content']; ?></p>
                            <div class="post-options">
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="post-tags">
                                            <li><i class="fa fa-tags"></i></li>
                                            <li><a href="#"><?php echo $post_data['cat_name']; ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="post-share">
                                            <li><i class="fa fa-share-alt"></i></li>
                                            <li><a href="#">Facebook</a>,</li>
                                            <li><a href="#"> Twitter</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>