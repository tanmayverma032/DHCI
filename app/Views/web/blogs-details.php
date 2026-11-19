<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION BLOG -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="single_post">
                    <div class="blog_img">
                        <a href="#">
                            <img src="<?= site_url() . $blog["thumbnail"] ?>" alt="blog_img1">
                        </a>
                    </div>
                    <div class="single_post_content">
                        <div class="blog_text">
                            <h3><?= $blog['title']  ?></h3>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ion-calendar"></i><?= date('jS M Y', strtotime($blog["created_at"])) ?></a></li>
                                <li><a href="#"><i class="ion-chatbubbles"></i>2 Comment</a></li>
                            </ul>
                            <div style="text-align: justify;">
                                <p><?= htmlspecialchars_decode($blog["content"]) ?></p>
                            </div>

                            <div class="border-top border-bottom py-2 py-md-4 blog_post_footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="share">
                                            <h5>Share :</h5>
                                            <ul class="list_none social_icons radius_social">
                                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                <li><a href="#" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post_navigation">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <i class="ion-ios-arrow-thin-left mr-3"></i>
                                        <div>
                                            <span>previous Post</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="#">
                                    <div class="d-flex align-items-center flex-row-reverse text-right">
                                        <i class="ion-ios-arrow-thin-right ml-3"></i>
                                        <div>
                                            <span>Next Post</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="related_post">
                        <div class="comment-title">
                            <h5>Related posts</h5>
                        </div>
                        <div class="row">
                            <?php foreach ($recentBlogs as $blogs) : ?>
                                <div class="col-md-6">
                                    <div class="blog_post box_shadow1 radius_all_10">
                                        <div class="blog_img radius_ltrt_10">
                                            <a href="<?= url_to('blog', $blogs["slug"]) ?>">
                                                <img src="<?= site_url() . $blogs["thumbnail"] ?>" alt="blog_small_img1">
                                                <div class="link_blog">
                                                    <span class="ripple"><i class="fa fa-link"></i></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="blog_content bg-white">
                                            <h6 class="blog_title"><a href="<?= url_to('blog', $blogs["slug"]) ?>"><?= $blogs["title"] ?></a></h6>
                                            <p><?= htmlspecialchars_decode(substr($blogs["content"], 0, 200)) ?></p>
                                            <a href="#" class="text-capitalize">Read More</a>
                                        </div>
                                        <div class="blog_footer bg-white radius_lbrb_10">
                                            <ul class="list_none blog_meta">
                                                <li><a href="#"><i class="ion-calendar"></i><?= date('jS M Y', strtotime($blogs["created_at"])) ?></a></li>
                                                <li><a href="#"><i class="ion-chatbubbles"></i>2 Comment</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
                <div class="sidebar">
                    <div class="widget widget_search">
                        <form class="search_form">
                            <input required="" class="form-control" placeholder="Search..." type="text">
                            <button type="submit" title="Subscribe" name="submit" value="Submit">
                                <span class="ti-search"></span>
                            </button>
                        </form>
                    </div>
                    <div class="widget widget_categories">
                        <h5 class="widget_title">Categories</h5>
                        <ul>
                            <li><a href="#"><span class="categories_name">General Nursing and Midwifery</span></a></li>
                            <li><a href="#"><span class="categories_name">Auxiliary Nursing Midwifery</span></a></li>
                            <li><a href="#"><span class="categories_name">Certificate In Hotel Management</span></a></li>
                            <li><a href="#"><span class="categories_name">Diploma In Hotel Management </span></a></li>
                            <li><a href="#"><span class="categories_name">Graduation In Hotel Management</span></a></li>
                        </ul>
                    </div>
                    <div class="widget widget_recent_post">
                        <h5 class="widget_title">Recent Post</h5>
                        <?php foreach ($recentBlogs as $blogs) : ?>
                            <ul class="recent_post border_bottom_dash list_none">
                                <li>
                                    <div class="post_footer">
                                        <div class="post_img">
                                            <a href="<?= url_to('blog', $blogs["slug"]) ?>"><img src="<?= site_url() . $blogs["thumbnail"] ?>" alt="letest_post1"></a>
                                        </div>
                                        <div class="post_content">
                                            <h6><a href="<?= url_to('blog', $blogs["slug"]) ?>"><?= $blogs["title"] ?></a></h6>
                                            <span class="post_date"><?= date('jS M Y', strtotime($blogs["created_at"])) ?></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                    <div class="widget widget_tags">
                        <h5 class="widget_title">tags</h5>
                        <div class="tags">
                            <a href="#">Law Collage</a>
                            <a href="#">Nursing College</a>
                            <a href="#">Hotel Management</a>
                            <a href="#">College</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BLOG -->






<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->