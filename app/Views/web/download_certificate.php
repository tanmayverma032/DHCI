<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->


<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION COURSES -->
<section class="small_pt bgimg">
    <div class="container bgragistration">
        <div class="contact-form-wrap p-4">
            <h2 class="border-title text_blue3 mb-3">Downlaod Result</h2>

            <?php if (session()->has("error")) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session()->get("error"); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session()->get('success'); ?>
                </div>
            <?php endif; ?>



            <?php if (isset($certificate)) { ?>
                <a href="<?= site_url('public/' . $certificate['file']) ?>" class="btn btn-primary">Download</a>
            <?php  } else { ?>
                <form action="<?= url_to('certificate_store') ?>" class="contact-form" method="post" accept-charset="utf-8">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="reg_no" id="name" placeholder="Registration Number">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="date" class="form-control" name="dob">
                        </div>
                        <div class="form-btn col-12 mt-10">
                            <button class="btn btn-primary" type="submit" style="background-color: #00588b; border-color: #00588b;" name="search_registration">Submit <i class="fa fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            <?php  } ?>
        </div>
    </div>
</section>
<!-- END SECTION COURSES -->


<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->