<!-- START SECTION BREADCRUMB -->

<section class="page-title-light breadcrumb_section overlay_bg_50"
    style="
        background-image: url('<?= base_url('public/assets/img/1.png') ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 120px 0;
    ">

    <div class="container">
        <div class="row align-items-center">

            <!-- Page Title -->
            <div class="col-sm-6">
                <div class="page-title">
                    <h1 class="text-white"><?= $pagetitle ?></h1>
                </div>
            </div>

            <!-- Breadcrumb -->
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-sm-end">

                        <li class="breadcrumb-item">
                            <a href="<?= base_url('/') ?>" class="text-white">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active text-white"
                            aria-current="page">
                            <?= $pagetitle ?>
                        </li>

                    </ol>
                </nav>
            </div>

        </div>
    </div>

</section>

<!-- END SECTION BREADCRUMB -->