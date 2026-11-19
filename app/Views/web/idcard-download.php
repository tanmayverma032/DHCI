<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->


<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION COURSES -->
<section class="small_pt bgimg">
    <div class="container bgragistration" >
        <div class="contact-form-wrap p-4" >
            <h2 class="border-title text-danger mb-3">Enter Your details</h2>
            <form action="<?=url_to('idcard_download_post')?>" class="contact-form" method="post"
                accept-charset="utf-8">
                <?=csrf_field()?>
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="reg_no" id="name"
                            placeholder="Registration Number">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="date" class="form-control" name="dob" id="dob">
                    </div>
                    <div class="form-btn col-12 mt-10">
                        <button class="btn btn-primary" type="submit" name="search_registration">Submit <i
                                class="fa fa-arrow-right"></i></button>
                    </div>
                </div>   
            </form>
        </div>
    </div>
</section>
<!-- END SECTION COURSES -->

<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->