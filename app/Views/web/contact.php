<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* =========================
   CONTACT PAGE
========================= */

.contact-modern-section{
    padding:90px 0;
    background:#f7f9fc;
    position:relative;
    overflow:hidden;
}

.contact-modern-section::before{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    background:rgba(3,136,198,0.05);
    border-radius:50%;
    top:-120px;
    left:-120px;
}

.contact-modern-section::after{
    content:'';
    position:absolute;
    width:300px;
    height:300px;
    background:rgba(255,122,0,0.05);
    border-radius:50%;
    bottom:-120px;
    right:-120px;
}

/* =========================
   HEADING
========================= */

.contact-badge{
    display:inline-block;
    background:linear-gradient(90deg,#ff7a00,#ff9d42);
    color:#fff;
    padding:8px 20px;
    border-radius:50px;
    font-size:14px;
    margin-bottom:15px;
}

.contact-title{
    font-size:48px;
    font-weight:800;
    color:#0f172a;
    line-height:1.2;
    margin-bottom:18px;
}

.contact-title span{
    color:#0388c6;
}

.contact-line{
    width:80px;
    height:4px;
    background:linear-gradient(to right,#0388c6,#ff7a00);
    border-radius:20px;
    margin:0 auto 22px;
}

.contact-desc{
    color:#64748b;
    max-width:820px;
    margin:auto;
    line-height:1.8;
    font-size:16px;
}

/* =========================
   MAIN BOX
========================= */

.contact-main-box{
    margin-top:70px;
    background:#fff;
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 15px 45px rgba(15,23,42,0.08);
    position:relative;
    z-index:2;
}

/* =========================
   FORM SIDE
========================= */

.contact-form-side{
    padding:50px 40px;
    background:linear-gradient(135deg,#0388c6,#0f172a);
    height:100%;
}

.contact-form-side h3{
    color:#fff;
    font-size:32px;
    font-weight:800;
    margin-bottom:12px;
}

.contact-form-side p{
    color:#dbeafe;
    line-height:1.8;
    margin-bottom:35px;
}

/* =========================
   FORM
========================= */

.contact-form .form-control{
    height:55px;
    border:none;
    border-radius:14px;
    background:rgba(255,255,255,0.12);
    color:#fff;
    padding:0 18px;
    margin-bottom:20px;
    box-shadow:none;
}

.contact-form textarea.form-control{
    height:130px;
    padding-top:15px;
    resize:none;
}

.contact-form .form-control::placeholder{
    color:#dbeafe;
}

.contact-form select.form-control{
    color:#fff;
}

.contact-form select option{
    color:#000;
}

.contact-btn{
    width:100%;
    border:none;
    height:58px;
    border-radius:16px;
    background:#fff;
    color:#0388c6;
    font-size:16px;
    font-weight:700;
    transition:0.3s ease;
}

.contact-btn:hover{
    transform:translateY(-3px);
    background:#f8fafc;
}

/* =========================
   MAP
========================= */

.contact-map{
    height:100%;
    min-height:620px;
}

.contact-map iframe{
    width:100%;
    height:100%;
    border:0;
}

/* =========================
   CONTACT INFO
========================= */

.contact-info-section{
    padding:90px 0;
    background:#ffffff;
}

.info-card{
    background:#fff;
    border-radius:26px;
    padding:40px 30px;
    text-align:center;
    transition:0.3s ease;
    height:100%;
    border:1px solid #edf2f7;
    box-shadow:0 8px 24px rgba(15,23,42,0.06);
}

.info-card:hover{
    transform:translateY(-6px);
    box-shadow:0 16px 40px rgba(15,23,42,0.12);
}

.info-icon{
    width:78px;
    height:78px;
    margin:0 auto 24px;
    border-radius:22px;
    background:linear-gradient(135deg,#0388c6,#00b8ff);
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 10px 25px rgba(3,136,198,0.20);
}

.info-icon i{
    font-size:30px;
    color:#fff;
}

.info-card h5{
    font-size:22px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:14px;
}

.info-card p,
.info-card a{
    font-size:15px;
    color:#64748b;
    line-height:1.8;
    text-decoration:none;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:991px){

    .contact-title{
        font-size:38px;
    }

    .contact-form-side{
        padding:40px 30px;
    }

    .contact-map{
        min-height:400px;
    }

}

@media(max-width:767px){

    .contact-modern-section{
        padding:70px 0;
    }

    .contact-title{
        font-size:30px;
    }

    .contact-desc{
        font-size:15px;
    }

    .contact-form-side{
        padding:35px 25px;
    }

    .contact-form-side h3{
        font-size:26px;
    }

    .contact-info-section{
        padding:70px 0;
    }

}

</style>

<!-- =========================
     CONTACT SECTION
========================= -->

<section class="contact-modern-section">

    <div class="container">

        <!-- HEADING -->
        <div class="text-center">

            <div class="contact-badge">
                CONTACT US
            </div>

            <h2 class="contact-title">
                Get In Touch With <br>
                <span>DHCI India</span>
            </h2>

            <div class="contact-line"></div>

            <p class="contact-desc">
                Connect with our team for admissions, course details,
                career guidance, and healthcare education support.
            </p>

        </div>

        <!-- MAIN BOX -->
        <div class="contact-main-box">

            <div class="row no-gutters">

                <!-- FORM -->
                <div class="col-lg-6">

                    <div class="contact-form-side">

                        <h3>Send Your Query</h3>

                        <p>
                            Fill out the enquiry form and our team will
                            contact you shortly with complete information.
                        </p>

                        <form method="post" action="<?= base_url('enquiry/submit') ?>" class="contact-form">

                            <?= csrf_field() ?>

                            <input required placeholder="Enter Name *"
                            class="form-control" name="name" type="text">

                            <input required placeholder="Enter Email *"
                            class="form-control" name="email" type="email">

                            <input required placeholder="Enter Phone No *"
                            class="form-control" name="phone" type="tel">

                            <select class="form-control" name="course" required>
                                <option value="">Select Course</option>
                                <option value="Nursing Courses">Nursing Courses</option>
                                <option value="B Voc">B Voc</option>
                                <option value="M-Voc">M-Voc</option>
                                <option value="Paramedical Courses">Paramedical Courses</option>
                            </select>

                            <textarea required placeholder="Message *"
                            class="form-control"
                            name="message"></textarea>

                            <button type="submit" class="contact-btn">
                                Register Now
                                <i class="fa-solid fa-arrow-right ml-2"></i>
                            </button>

                        </form>

                        <!-- Flash Messages -->

                        <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger mt-4">
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <p><?= esc($error) ?></p>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success mt-4">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                        <?php endif; ?>

                    </div>

                </div>

                <!-- MAP -->
                <div class="col-lg-6">

                    <div class="contact-map">
                        <?=site_setting('map_link') ?>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
     CONTACT INFO
========================= -->

<section class="contact-info-section">

    <div class="container">

        <div class="row justify-content-center mb-5">

            <div class="col-lg-7 text-center">

                <div class="contact-badge">
                    CONTACT INFORMATION
                </div>

                <h2 class="contact-title">
                    Reach Us Anytime
                </h2>

                <div class="contact-line"></div>

            </div>

        </div>

        <div class="row">

            <!-- ADDRESS -->
            <div class="col-lg-4 col-md-6 mb-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <h5>Address</h5>

                    <p><?=site_setting('address') ?></p>

                </div>

            </div>

            <!-- PHONE -->
            <div class="col-lg-4 col-md-6 mb-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>

                    <h5>Call Us</h5>

                    <a href="tel:<?=site_setting('number') ?>">
                        <?=site_setting('number') ?>
                    </a>

                </div>

            </div>

            <!-- EMAIL -->
            <div class="col-lg-4 col-md-6 mb-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <h5>Email Us</h5>

                    <a href="mailto:<?=site_setting('email') ?>">
                        <?=site_setting('email') ?>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->