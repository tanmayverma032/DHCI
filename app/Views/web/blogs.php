<!-- START HEADER -->

<?php include("inc/header.php"); ?>

<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->

<?php include("inc/headtitle.php"); ?>

<!-- END SECTION BREADCRUMB -->

<!-- START SECTION BLOG -->

<section class="small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($blogs as $data) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog_post box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="blog_img radius_ltrt_10">
                            <a href="<?= url_to('blog', $data["slug"]) ?>">
                                <img src="<?= site_url() . $data["thumbnail"] ?>" alt="blog_small_img1">
                                <div class="link_blog">
                                    <span class="ripple"><i class="fa fa-link"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="blog_content bg-white">
                            <h6 class="blog_title"><a href="<?= url_to('blog', $data["slug"]) ?>"><?= $data["title"] ?></a></h6>
                            <p><?= htmlspecialchars_decode(substr($data["content"], 0, 200)) ?></p>
                            <a href="<?= url_to('blog', $data["slug"]) ?>" class="text-capitalize">Read More</a>
                        </div>
                        <div class="blog_footer bg-white radius_lbrb_10">
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ion-calendar"></i><?= date('jS M Y', strtotime($data["created_at"])) ?></a></li>
                                <li><a href="#"><i class="ion-chatbubbles"></i>2 Comment</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
       
        <div class="row">
            <div class="col-12">
                <div class="medium_divider"></div>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="ion-ios-arrow-thin-left"></i></a></li>
                    <li class="page-item active"> <?= $pager->links() ?></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="ion-ios-arrow-thin-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- END SECTION BLOG -->

<!-- START FOOTER -->

<?php include("inc/footer.php"); ?>

<!-- END FOOTER -->