<!-- START HEADER -->
<?php include("inc/header.php"); ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NP6LWDMX');</script>
<!-- End Google Tag Manager -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18194245812">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-18194245812');
</script>

<!-- Owl Carousel CSS -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

<!-- Font Awesome -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<link rel="stylesheet" href="<?= base_url('public/assets/css/custom-home.css') ?>">

<!-- END HEADER -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NP6LWDMX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog"
     aria-labelledby="contactModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content" style="background-color:#093e4e; padding:20px;">

            <!-- Modal Header -->
            <div class="modal-header" style="border-bottom:1px solid #ccc;">
                <h5 class="modal-title text-white" id="contactModalLabel">
                    Enquiry Form
                </h5>

                <button type="button"
                        class="close text-white"
                        data-dismiss="modal"
                        aria-label="Close"
                        style="font-size:28px; border:none; background:none;">

                    <span aria-hidden="true">&times;</span>

                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form method="post"
                      action="<?= base_url('enquiry/submit') ?>"
                      id="popupEnquiryForm">

                    <?= csrf_field() ?>

                    <div class="row">

                        <div class="form-group col-sm-12">
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter Name *"
                                   required>
                        </div>

                        <div class="form-group col-sm-12">
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter Email *"
                                   required>
                        </div>

                        <div class="form-group col-sm-12">
                            <input type="tel"
                                   name="phone"
                                   class="form-control"
                                   placeholder="Enter Phone No *"
                                   required>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="custom_select">
                                <select class="form-control"
                                        name="course"
                                        required>

                                    <option value="">Select Course</option>
                                    <option value="Nursing Courses">Nursing Courses</option>
                                    <option value="B Voc">B Voc</option>
                                    <option value="M-Voc">M-Voc</option>
                                    <option value="B.sc Nursing">B.sc Nursing</option>
                                    <option value="GNM">GNM</option>
                                    <option value="DMLT">DMLT</option>
                                    <option value="BMLT">BMLT</option>
                                    <option value="BRIT">BRIT</option>
                                    <option value="OT">OT</option>
                                    <option value="OTT">OTT</option>
                                    <option value="OTHER COURSES">OTHER COURSES</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <textarea name="message"
                                      rows="4"
                                      class="form-control"
                                      placeholder="Message *"
                                      required></textarea>
                        </div>

                        <div class="col-md-12">
                            <button type="submit"
                                    class="btn btn-default"
                                    style="background:#0389c6;color:#fff;border:none;">

                                Register Now

                            </button>
                        </div>

                        <div class="col-sm-12">
                            <div id="alert-msg"
                                 class="alert-msg text-center text-dark">
                            </div>
                        </div>

                    </div>

                </form>

                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger mt-3">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <p><?= esc($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success mt-3">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

            </div> <!-- modal-body -->

        </div> <!-- modal-content -->

    </div> <!-- modal-dialog -->

</div> <!-- modal -->


<!-- START SLIDER BANNER -->
<?php include("inc/slider.php"); ?>


<!-- =========================================
     TOP MARQUEE
========================================= -->

<div class="top-marquee">
    <marquee behavior="scroll"
             direction="left"
             scrollamount="4"
             onmouseover="this.stop();"
             onmouseout="this.start();">

        The Delhi Health Care Institute INDIA, Established in the year 2014 with a view to build a remarkable education domain.

    </marquee>
</div>

<!-- =========================================
     WHY CHOOSE SECTION
========================================= -->

<section class="section-space why-section">

    <div class="container">

        <!-- HEADING -->
        <div class="section-heading">

            <span>Why Choose Us</span>

            <h2>
                Why Choose DHCI – Delhi Healthcare Institute
            </h2>

            <p>
                DHCI is committed to building successful healthcare careers through professional education,
                practical exposure, mentorship, and career-focused learning programs.
            </p>

        </div>

        <!-- GRID -->
        <div class="why-grid">

            <!-- CARD -->
            <div class="modern-card why-card">

                <div class="why-icon">🏆</div>

                <h4>Trusted Healthcare Institute</h4>

                <p>
                    Leading institute for Nursing, Pharmacy,
                    Paramedical, and Healthcare courses.
                </p>

            </div>

            <!-- CARD -->
            <div class="modern-card why-card">

                <div class="why-icon">🎓</div>

                <h4>Career-Oriented Learning</h4>

                <p>
                    Industry-focused education that prepares students
                    for real healthcare careers.
                </p>

            </div>

            <!-- CARD -->
            <div class="modern-card why-card">

                <div class="why-icon">🏥</div>

                <h4>Hospital Exposure</h4>

                <p>
                    Practical clinical training and professional
                    healthcare environment exposure.
                </p>

            </div>

            <!-- CARD -->
            <div class="modern-card why-card">

                <div class="why-icon">📈</div>

                <h4>Career Growth Focus</h4>

                <p>
                    Programs designed to improve confidence,
                    communication, and job-ready skills.
                </p>

            </div>

            <!-- CARD -->
            <div class="modern-card why-card">

                <div class="why-icon">🌍</div>

                <h4>Professional Courses</h4>

                <p>
                    Wide range of healthcare, nursing,
                    vocational, and paramedical programs.
                </p>

            </div>

            <!-- CARD -->
            <div class="modern-card why-card">

                <div class="why-icon">📜</div>

                <h4>Recognized Programs</h4>

                <p>
                    Guidance for PCI, INC, UGC,
                    and university-approved courses.
                </p>

            </div>

            <!-- CARD -->
            <div class="modern-card why-card">

                <div class="why-icon">👨‍⚕️</div>

                <h4>Professional Mentorship</h4>

                <p>
                    Continuous guidance and counseling
                    throughout the learning journey.
                </p>

            </div>

            <!-- CARD -->
            <div class="modern-card why-card">

                <div class="why-icon">🚀</div>

                <h4>Future-Focused Skills</h4>

                <p>
                    Training based on modern healthcare
                    industry requirements and opportunities.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
     ABOUT SECTION
========================================= -->

<section class="section-space about-section">

    <div class="container">

        <div class="row align-items-center gy-5">

            <!-- LEFT -->
            <div class="col-lg-6">

                <div class="about-content">

                    <span class="about-tag">
                        Trusted Nursing & Paramedical Institute
                    </span>

                    <h1>
                        Best Nursing & Paramedical Institute in Delhi
                    </h1>

                    <h2>
                        <?= site_setting('site_name') ?>
                    </h2>

                    <p>
                        <strong><?= site_setting('site_name') ?></strong>
                        is one of the leading healthcare education institutes,
                        offering Nursing, GNM, B.Sc Nursing, Pharmacy,
                        and Paramedical programs with practical training,
                        expert faculty, and placement support.
                    </p>

                    <!-- STATS -->
                    <div class="about-stats">

                        <div class="stat-box">

                            <h3>
                                <span class="counter">7500</span>+
                            </h3>

                            <h6>Total Students</h6>

                        </div>

                        <div class="stat-box">

                            <h3>
                                <span class="counter">1500</span>+
                            </h3>

                            <h6>Students Placed</h6>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-6">

                <div class="about-media">

                    <!-- IMAGE -->
                    <img class="about-img"
                         src="<?= base_url('public') ?>/assets/images/about_img.jpg"
                         alt="About DHCI">

                    <!-- BADGE -->
                    <div class="floating-badge">

                        10+ Years of Excellence

                    </div>

                    <!-- VIDEO -->
                    <div class="video-card">

                        <iframe
                            src="https://www.youtube.com/embed/IVvweOpfe74"
                            title="DHCI Video"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================================
     NEWS & EVENTS SECTION
========================================= -->

<section class="section-space news-section">

    <div class="container">

        <!-- HEADING -->
        <div class="section-heading">

            <span>Latest Updates</span>

            <h2>
                News & Upcoming Events
            </h2>

            <p>
                Stay updated with institute announcements,
                seminars, workshops, academic activities,
                and upcoming healthcare events.
            </p>

        </div>

        <div class="row g-4">

            <!-- NEWS -->
            <div class="col-lg-6">

                <div class="modern-card info-card">

                    <!-- TOP -->
                    <div class="card-top">

                        <div class="card-icon">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>

                        <div>

                            <h3>News Updates</h3>

                            <p>
                                Latest institute announcements
                            </p>

                        </div>

                    </div>

                    <!-- SCROLL -->
                    <div class="scroll-box">

                        <?php if (!empty($news)): ?>

                            <?php foreach ($news as $row): ?>

                                <div class="news-box">

                                    <div class="news-title">

                                        <?php if ($row['pdf_file']): ?>

                                            <a href="<?= base_url('uploads/news/' . $row['pdf_file']) ?>"
                                               target="_blank">

                                                <?= esc($row['title']) ?>

                                            </a>

                                        <?php else: ?>

                                            <?= esc($row['title']) ?>

                                        <?php endif; ?>

                                    </div>

                                    <div class="news-meta">

                                        <span>
                                            <i class="fa-solid fa-building"></i>
                                            <?= esc($row['department']) ?>
                                        </span>

                                        <span>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <?= date('d M Y', strtotime($row['publish_date'])) ?>
                                        </span>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <div class="text-center py-5">

                                <h5>No News Available</h5>

                                <p>
                                    Latest updates will appear soon.
                                </p>

                            </div>

                        <?php endif; ?>

                    </div>

                    <!-- BUTTON -->
                    <div class="button-wrap">

                        <a href="<?= base_url('all-news') ?>"
                           class="theme-btn">

                            View All News

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

            <!-- EVENTS -->
            <div class="col-lg-6">

                <div class="modern-card info-card">

                    <!-- TOP -->
                    <div class="card-top">

                        <div class="card-icon">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>

                        <div>

                            <h3>Upcoming Events</h3>

                            <p>
                                Workshops & seminars
                            </p>

                        </div>

                    </div>

                    <!-- SCROLL -->
                    <div class="scroll-box">

                        <?php if (!empty($events)): ?>

                            <?php foreach ($events as $ev): ?>

                                <div class="event-box">

                                    <!-- DATE -->
                                    <div class="event-date">

                                        <h4>
                                            <?= date('d', strtotime($ev['start_date'])) ?>
                                        </h4>

                                        <span>
                                            <?= date('M', strtotime($ev['start_date'])) ?>
                                        </span>

                                    </div>

                                    <!-- CONTENT -->
                                    <div class="event-content">

                                        <h5>

                                            <?= esc($ev['title']) ?>

                                            <?php if ($ev['pdf_file']): ?>

                                                <a href="<?= base_url('public/uploads/events/' . $ev['pdf_file']) ?>"
                                                   target="_blank">

                                                    (PDF)

                                                </a>

                                            <?php endif; ?>

                                        </h5>

                                        <div class="event-time">

                                            <i class="fa-solid fa-clock"></i>

                                            <?= date('d M Y', strtotime($ev['start_date'])) ?>

                                        </div>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <div class="text-center py-5">

                                <h5>No Events Available</h5>

                                <p>
                                    Upcoming events will appear soon.
                                </p>

                            </div>

                        <?php endif; ?>

                    </div>

                    <!-- BUTTON -->
                    <div class="button-wrap">

                        <a href="<?= base_url('all-events') ?>"
                           class="theme-btn">

                            View All Events

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- UGC Pathner -->

<section class="small_pt">
    <div class="container">
        <div class="heading_s1 text-center">
            <h2>Our UGC Recognised Partners</h2>
        </div>
    </div>

    <!-- Left to Right Slider -->
    <div class="partner-slider left-to-right">
        <div class="slide-track">

            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/UGC/1.webp" alt="Partner 15">
            </div>
            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/UGC/2.webp" alt="Partner 16">
            </div>
            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/UGC/3.webp" alt="Partner 17">
            </div>
            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/3.jpg" alt="Partner 22">
            </div>
            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/4.jpg" alt="Partner 22">
            </div>
            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/UGC/4.webp" alt="Partner 18">
            </div>
            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/UGC/5.webp" alt="Partner 19">
            </div>
            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/UGC/6.webp" alt="Partner 20">
            </div>
            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/UGC/7.webp" alt="Partner 21">
            </div>
             <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/UGC/1.webp" alt="Partner 15">
            </div>
            <div class="slide">
                <img src="<?=base_url('public') ?>/assets/images/partner/UGC/2.webp" alt="Partner 16">
            </div>
            <div class="slide">
                <img src="<?=base_url('public') ?>/assets/images/partner/UGC/3.webp" alt="Partner 17">
            </div>
            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/3.jpg" alt="Partner 22">
            </div>
            <div class="slide">
                <img src="<?= base_url('public') ?>/assets/images/partner/4.jpg" alt="Partner 22">
            </div>
            <div class="slide">
                <img src="<?=base_url('public') ?>/assets/images/partner/UGC/4.webp" alt="Partner 18">
            </div>
            <div class="slide">
                <img src="<?=base_url('public') ?>/assets/images/partner/UGC/5.webp" alt="Partner 19">
            </div>
            <div class="slide">
                <img src="<?=base_url('public') ?>/assets/images/partner/UGC/6.webp" alt="Partner 20">
            </div>
            <div class="slide">
                <img src="<?=base_url('public') ?>/assets/images/partner/UGC/7.webp" alt="Partner 21">
            </div>



        </div>
    </div>

</section>

<!-- UGC Pathaner -->

<!-- START SECTION COURSES -->
<section class="small_pt" style="background-color: aliceblue;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2>Our Courses</h2>
                    </div>
                    <p>Start, switch, or advance your career with more than 100+ courses, Professional Certificates, and
                        Diploma Courses from world-class Institute</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($courses)) { ?>
                <?php foreach ($courses as $row): ?>

                        <?php
                        if (
                            stripos($row['name'], 'nursing') === false &&
                            stripos($row['name'], 'b-voc') === false
                        ) {
                            continue;
                        }
                        ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="content_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp"
                            data-animation-delay="0.01s">
                            <div class="content_img radius_ltrt_10">
                                <a href="<?= site_url('course_details/') . $row['slug'] ?>"><img
                                        src="<?= site_url('public/') . $row['thumbnail'] ?>" alt="course_img1"></a>
                            </div>
                            <div class="content_desc">
                                <h4 class="content_title"><a href="<?= site_url('course_details/') . $row['slug'] ?>">
                                        <?= $row['name'] ?>
                                    </a></h4>
                                <!-- <p><?= substr($row["description"], 0, 200) ?>..</p> -->
                                <p><b>Eligibility : </b>
                                    <?= $row['course_eligibility'] ?>
                                </p>
                                <p><b>Duration : </b>
                                    <?= $row['duration'] ?> Months
                                </p>
                            </div>
                            <div class="content_footer" style="display:none;">
                                <div class="teacher">
                                    <a href="<?= site_url('course_details/') . $row['slug'] ?>"><span>Total Modules Covered :
                                            <?= $row["modules"] ?>
                                        </span></a>
                                </div>
                                <div class="price">
                                    <span class="alert alert-success">
                                        <?= $row['course_fees'] ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php } else { ?>
                <div class="col-md-12 justify-content-center">
                    <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                        <div class="heading_s1 text-center">
                            <h2>Ooops.. Courses Not Found !!!</h2>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- END SECTION COURSES -->

<section class="small_pt" style="background-color: aliceblue;">
    <div class="container">
        <div class="heading_s1 text-center">
            <h2>OUR PLACEMENTS CENTERS</h2>
        </div>
    </div>

    <!-- Left to Right Slider -->
   <div class="partner-slider left-to-right" style="background-color: aliceblue;">
    <div class="slide-track">
        <?php for ($i = 1; $i <= 9; $i++): ?>
            <div class="slide">
                <img src="<?= base_url('public/assets/images/partner/partners/' . $i . '.png') ?>" alt="Partner <?= $i ?>">
            </div>
        <?php endfor; ?>

        <!-- Duplicate for smooth infinite scroll -->
        <?php for ($i = 1; $i <= 9; $i++): ?>
            <div class="slide">
                <img src="<?= base_url('public/assets/images/partner/partners/' . $i . '.png') ?>" alt="Partner <?= $i ?>">
            </div>
        <?php endfor; ?>
    </div>
</div>

    <div class="partner-slider right-to-left" style="background-color: aliceblue;">
    <div class="slide-track">
        <?php for ($i = 1; $i <= 9; $i++): ?>
            <div class="slide">
                <img src="<?= base_url('public/assets/images/partner/partners/' . $i . '.png') ?>" alt="Partner <?= $i ?>" class="box_shadow1">
            </div>
        <?php endfor; ?>

        <!-- Duplicate for smooth infinite scroll -->
        <?php for ($i = 1; $i <= 9; $i++): ?>
            <div class="slide">
                <img src="<?= base_url('public/assets/images/partner/partners/' . $i . '.png') ?>" alt="Partner <?= $i ?>" class="box_shadow1">
            </div>
        <?php endfor; ?>
    </div>
</div>

</section>

<!-- START SECTION TEACHER -->

<section class="parallax_bg overlay_bg_blue_90" data-parallax-bg-image="<?= base_url('public') ?>/assets/images/teacher_bg.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center text_white animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                     <div class="heading_s1 heading_light text-center" style="margin-bottom:15px;">
    <h2 style="font-weight:600; margin-bottom:10px;">
        Glimpses of Our Institute
    </h2>
</div>

<p style="font-size:16px; line-height:1.7; margin:0;">
    Take a quick look at life at <strong>DHCIINDIA VOCATIONAL INSTITUTE</strong>.
    These photos and videos highlight our training sessions, student activities,
    and the practical learning environment we provide every day.
</p>
                </div>
            </div>
        </div>
       <div class="row">

    <!-- VIDEO CARD -->
    <div class="col-lg-3 col-sm-6">
        <div class="team_box team_style1 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">

            <div class="team_img" style="height:250px; overflow:hidden;">
                <video style="width:100%; height:100%; object-fit:cover;" autoplay muted loop playsinline>
                    <source src="<?= base_url('public') ?>/assets/images/videos/1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

        </div>
    </div>


    <!-- IMAGE CARD 1 -->
    <div class="col-lg-3 col-sm-6">
        <div class="team_box team_style1 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.04s">

            <div class="team_img" style="height:250px; overflow:hidden;">
                <img src="<?= base_url('public') ?>/assets/images/a.jpeg"
                     style="width:100%; height:100%; object-fit:cover;"
                     alt="image">
            </div>

        </div>
    </div>


    <!-- IMAGE CARD 2 -->
    <div class="col-lg-3 col-sm-6">
        <div class="team_box team_style1 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.06s">

            <div class="team_img" style="height:250px; overflow:hidden;">
                <img src="<?= base_url('public') ?>/assets/images/b.jpeg"
                     style="width:100%; height:100%; object-fit:cover;"
                     alt="image">
            </div>

        </div>
    </div>


    <!-- IMAGE CARD 3 -->
    <div class="col-lg-3 col-sm-6">
        <div class="team_box team_style1 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.08s">

            <div class="team_img" style="height:250px; overflow:hidden;">
                <img src="<?= base_url('public') ?>/assets/images/c.jpeg"
                     style="width:100%; height:100%; object-fit:cover;"
                     alt="image">
            </div>

        </div>
    </div>

</div>
    </div>
</section>

<!-- END SECTION TEACHER -->


<!-- =========================
    MODERN TESTIMONIAL SECTION
========================== -->

<section class="modern-testimonial-section">
    <div class="container">

        <!-- Section Heading -->
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-heading text-center">

                    <span class="sub-title">Student Reviews</span>

                    <h2>What Our Students Say</h2>

                    <p>
                        Hear from our students about their learning experience,
                        practical training, career growth, and success journey at DHCI.
                    </p>

                </div>
            </div>
        </div>

        <!-- Testimonial Slider -->
        <div class="row">
            <div class="col-12">

                <div class="testimonial_slider owl-carousel owl-theme"
                    data-margin="30"
                    data-loop="true"
                    data-autoplay="true"
                    data-dots="true"
                    data-nav="false"
                    data-responsive='{
                        "0":{"items":"1"},
                        "768":{"items":"1"},
                        "992":{"items":"2"}
                    }'>

                    <!-- ITEM -->
                    <div class="testimonial-card">

                        <div class="quote-icon">
                            <i class="fas fa-quote-right"></i>
                        </div>

                        <div class="testimonial-top">

                            <div class="testimonial-img">
                                <img src="<?= base_url('public') ?>/assets/images/pawan.jpeg"
                                    alt="Pawan Kumar">
                            </div>

                            <div class="testimonial-user">
                                <h4>Pawan Kumar</h4>
                                <span>Student</span>
                                </div>

                        </div>

                        <div class="testimonial-content">
                            <p>
                                My name is Pawan Kumar. I am pursuing B.Voc RIT from Delhi Healthcare Institute under Subharti University, Meerut. The institute provides excellent technical knowledge, practical exposure, and training opportunities.
                            </p>
                        </div>

                    </div>



                    <!-- ITEM -->
                    <div class="testimonial-card">

                        <div class="quote-icon">
                            <i class="fas fa-quote-right"></i>
                        </div>

                        <div class="testimonial-top">

                            <div class="testimonial-img">
                                <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                    alt="Amwesha">
                            </div>

                            <div class="testimonial-user">
                                <h4>Amwesha</h4>
                                <span>Radiology Technician</span>
                            </div>

                        </div>

                        <div class="testimonial-content">
                            <p>
                                The faculty is supportive, practical training is excellent, and the institute provides a positive learning environment with strong career opportunities.
                            </p>
                        </div>

                    </div>

                    <!-- ITEM -->
                    <div class="testimonial-card">

                        <div class="quote-icon">
                            <i class="fas fa-quote-right"></i>
                        </div>

                        <div class="testimonial-top">

                            <div class="testimonial-img">
                                <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                    alt="Pankaj Kaushik">
                            </div>

                            <div class="testimonial-user">
                                <h4>Pankaj Kaushik</h4>
                                <span>Student</span>
                            </div>

                        </div>

                        <div class="testimonial-content">
                            <p>
                                Best leading institute in Delhi providing quality education for ANM, GNM, B.Sc Nursing, and vocational programs. Highly recommended for healthcare education.
                            </p>
                        </div>

                    </div>

                    <!-- ITEM -->
                    <div class="testimonial-card">

                        <div class="quote-icon">
                            <i class="fas fa-quote-right"></i>
                        </div>

                        <div class="testimonial-top">

                            <div class="testimonial-img">
                                <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                    alt="Navdeep Jasaiwal">
                            </div>

                            <div class="testimonial-user">
                                <h4>Navdeep Jasaiwal</h4>
                                <span>Student</span>
                            </div>

                        </div>

                        <div class="testimonial-content">
                            <p>
                                Faculty members are extremely supportive and always available to solve students' issues. I would definitely recommend this institution.
                            </p>
                        </div>

                    </div>

                    <!-- ITEM -->
                    <div class="testimonial-card">

                        <div class="quote-icon">
                            <i class="fas fa-quote-right"></i>
                        </div>

                        <div class="testimonial-top">

                            <div class="testimonial-img">
                                <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                    alt="Navdeep Jasaiwal">
                            </div>

                            <div class="testimonial-user">
                                <h4>Jatin Kohli</h4>
                                <span>Student</span>
                            </div>

                        </div>

                        <div class="testimonial-content">
                            <p>
                                Delhi healthcare institute provides quality education with experienced teachers and excellent practical exposure.
                                The institute offers proper guidance, modern facilities and supportive counselling. Student get good academic as well as practical learning experience.
                            </p>
                        </div>

                    </div>

                       <!-- ITEM -->
                    <div class="testimonial-card">

                        <div class="quote-icon">
                            <i class="fas fa-quote-right"></i>
                        </div>

                        <div class="testimonial-top">

                            <div class="testimonial-img">
                                <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                    alt="Navdeep Jasaiwal">
                            </div>

                            <div class="testimonial-user">
                                <h4>Khushi Thakuri</h4>
                                <span>Student</span>
                            </div>

                        </div>

                        <div class="testimonial-content">
                            <p>
                                DHCI is a good institute with supportive teachers and a positive learning environment. The faculty explains concepts clearly and helps students whenever needed.
                                Facilities are decent and the atmosphere is disciplined. Overall, it is a good place for learning.
                            </p>
                        </div>

                    </div>

                      <!-- ITEM -->
                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>

                            <div class="testimonial-top">

                                <div class="testimonial-img">
                                    <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                        alt="Shraddha">
                                </div>

                                <div class="testimonial-user">
                                    <h4>Shraddha</h4>
                                    <span>Student</span>
                                </div>

                            </div>

                            <div class="testimonial-content">
                                <p>
                                    A very professional institute with supportive teachers. Great learning environment and well-structured courses. The institute focuses on both knowledge and confidence building.
                                </p>
                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>

                            <div class="testimonial-top">

                                <div class="testimonial-img">
                                    <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                        alt="Chanchal">
                                </div>

                                <div class="testimonial-user">
                                    <h4>Chanchal</h4>
                                    <span>Student</span>
                                </div>

                            </div>

                            <div class="testimonial-content">
                                <p>
                                    The doctors, nurses, and support staff are qualified, trained, and professional. They are polite, cooperative, and attentive towards patients. The teachers are also good and polite in nature.
                                </p>
                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>

                            <div class="testimonial-top">

                                <div class="testimonial-img">
                                    <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                        alt="Sakshi Palriwal">
                                </div>

                                <div class="testimonial-user">
                                    <h4>Sakshi Palriwal</h4>
                                    <span>Student</span>
                                </div>

                            </div>

                            <div class="testimonial-content">
                                <p>
                                    Very well-managed institute with skilled mentors. DHCI ensures both theory knowledge and strong practical exposure.
                                </p>
                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>

                            <div class="testimonial-top">

                                <div class="testimonial-img">
                                    <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                        alt="Tanishka Thakur">
                                </div>

                                <div class="testimonial-user">
                                    <h4>Tanishka Thakur</h4>
                                    <span>Student</span>
                                </div>

                            </div>

                            <div class="testimonial-content">
                                <p>
                                    Very good institute with supportive teachers and a positive learning environment. Concepts are explained clearly and doubts are solved properly. Best experience ever.
                                </p>
                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>

                            <div class="testimonial-top">

                                <div class="testimonial-img">
                                    <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                        alt="Devansh Vidyasaria">
                                </div>

                                <div class="testimonial-user">
                                    <h4>Devansh Vidyasaria</h4>
                                    <span>Student</span>
                                </div>

                            </div>

                            <div class="testimonial-content">
                                <p>
                                    DHCI provides quality education with hands-on learning. The environment is positive, disciplined, and truly student-friendly.
                                </p>
                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>

                            <div class="testimonial-top">

                                <div class="testimonial-img">
                                    <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                        alt="Shayna Shaikh">
                                </div>

                                <div class="testimonial-user">
                                    <h4>Shayna Shaikh</h4>
                                    <span>Student</span>
                                </div>

                            </div>

                            <div class="testimonial-content">
                                <p>
                                    Excellent Institute for Healthcare Education. I recently completed my course at Delhi Health Care Institute, and I had an excellent experience.
                                </p>
                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>

                            <div class="testimonial-top">

                                <div class="testimonial-img">
                                    <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                        alt="Junaid Ali">
                                </div>

                                <div class="testimonial-user">
                                    <h4>Junaid Ali</h4>
                                    <span>Student</span>
                                </div>

                            </div>

                            <div class="testimonial-content">
                                <p>
                                    It was a marvellous experience indeed. They not only focused upon education but also worked upon cultural and psychological development of the students.
                                </p>
                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>

                            <div class="testimonial-top">

                                <div class="testimonial-img">
                                    <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                        alt="Vivek Yadav">
                                </div>

                                <div class="testimonial-user">
                                    <h4>Vivek Yadav</h4>
                                    <span>Student</span>
                                </div>

                            </div>

                            <div class="testimonial-content">
                                <p>
                                    Excellent healthcare institute with experienced faculty and great learning atmosphere. Practical knowledge and student support are really impressive.
                                </p>
                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="testimonial-card">

                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>

                            <div class="testimonial-top">

                                <div class="testimonial-img">
                                    <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                        alt="Mihir Choudhary">
                                </div>

                                <div class="testimonial-user">
                                    <h4>Mihir Choudhary</h4>
                                    <span>Student</span>
                                </div>

                            </div>

                            <div class="testimonial-content">
                                <p>
                                    DHCI is the best institute with supportive faculty and practical learning environment. Helpful for building a career in healthcare.
                                </p>
                            </div>

                        </div>

                    <!-- ITEM -->
                    <div class="testimonial-card">

                        <div class="quote-icon">
                            <i class="fas fa-quote-right"></i>
                        </div>

                        <div class="testimonial-top">

                            <div class="testimonial-img">
                                <img src="<?= base_url('public') ?>/assets/images/dummy-teacher-img-1.jpg"
                                    alt="Manish Gupta">
                            </div>

                            <div class="testimonial-user">
                                <h4>Manish Gupta</h4>
                                <span>Student</span>
                            </div>

                        </div>

                        <div class="testimonial-content">
                            <p>
                                One of the best institutions for paramedical, regular, and online programs. The counselors and faculty provide excellent guidance and support.
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</section>




<!-- END SECTION TESTIMONIAL -->

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- TESTIMONIAL SLIDER -->
<script>
$(document).ready(function(){

    $('.testimonial_slider').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        dots:true,
        autoplay:true,
        autoplayTimeout:4000,
        smartSpeed:800,

        responsive:{
            0:{
                items:1
            },
            768:{
                items:1
            },
            992:{
                items:2
            }
        }
    });

});
</script>

<!-- START SECTION BLOG -->
<section class="blog-section section-space">
    <div class="container">

        <!-- Heading -->
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <span>Latest Updates</span>
                    <h2>Our Blog Events</h2>
                    <p>
                        Explore our latest blogs, educational updates, events, and important announcements.
                    </p>
                </div>
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="row g-4">

        <?php foreach ($blogs as $data):

            // SEO Slug
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data["title"])));

            // Short Description
            $desc = mb_strimwidth(strip_tags($data["content"]), 0, 120, "...");

        ?>

            <div class="col-lg-4 col-md-6">

                <div class="blog-card h-100">

                    <!-- Image -->
                    <div class="blog-img">

                        <a href="<?= site_url('blog/'.$slug) ?>">
                            <img src="<?= site_url().$data["thumbnail"] ?>"
                                 alt="<?= htmlspecialchars($data["title"]) ?>">
                        </a>

                        <!-- Date Badge -->
                        <div class="blog-date">
                            <h5><?= date('d', strtotime($data["created_at"])) ?></h5>
                            <span><?= date('M', strtotime($data["created_at"])) ?></span>
                        </div>

                    </div>

                    <!-- Content -->
                    <div class="blog-content d-flex flex-column">

                        <!-- Meta -->
                        <div class="blog-meta">
                            <span>
                                <i class="ti-user"></i>
                                <?= htmlspecialchars($data["author"]) ?>
                            </span>

                            <span>
                                <i class="ti-location-pin"></i>
                                Laxmi Nagar, Delhi
                            </span>
                        </div>

                        <!-- Title -->
                        <h4>
                            <a href="<?= site_url('blog/'.$slug) ?>">
                                <?= htmlspecialchars($data["title"]) ?>
                            </a>
                        </h4>

                        <!-- Description -->
                        <p>
                            <?= $desc ?>
                        </p>

                        <!-- Button -->
                        <a href="<?= site_url('blog/'.$slug) ?>" class="theme-btn mt-auto">
                            Read More →
                        </a>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

        </div>

    </div>
</section>


<!-- START SECTION REGISTER -->
<section class="modern-enquiry-section">

    <!-- Background Shapes -->
    <div class="shape shape-one"></div>
    <div class="shape shape-two"></div>

    <div class="container">
        <div class="row align-items-center g-5">

            <!-- LEFT CONTENT -->
            <div class="col-lg-6">

                <div class="enquiry-content">

                    <span class="mini-tag">
                        Free Career Guidance
                    </span>

                    <h2>
                        Get A Free Counseling
                        <span>Session At DHCI</span>
                    </h2>

                    <p>
                        Start your healthcare career journey with expert guidance from our experienced counselors.
                        Get complete information about admissions, courses, fees, placements, and career opportunities.
                    </p>

                    <!-- Features -->
                    <div class="feature-list">

                        <div class="feature-item">
                            <i class="ti-check-box"></i>
                            Expert Career Guidance
                        </div>

                        <div class="feature-item">
                            <i class="ti-check-box"></i>
                            Admission Assistance
                        </div>

                        <div class="feature-item">
                            <i class="ti-check-box"></i>
                            Placement Support
                        </div>

                        <div class="feature-item">
                            <i class="ti-check-box"></i>
                            Scholarship Information
                        </div>

                    </div>

                    <!-- FORM CARD -->
                    <div class="enquiry-form-card">

                        <form method="post"
                              action="<?= base_url('enquiry/submit') ?>"
                              id="enquiryForm">

                            <?= csrf_field() ?>

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <input type="text"
                                           name="name"
                                           class="form-control modern-input"
                                           placeholder="Enter Name *"
                                           required>
                                </div>

                                <div class="col-md-6">
                                    <input type="email"
                                           name="email"
                                           class="form-control modern-input"
                                           placeholder="Enter Email *"
                                           required>
                                </div>

                                <div class="col-md-6">
                                    <input type="tel"
                                           name="phone"
                                           class="form-control modern-input"
                                           placeholder="Enter Phone No *"
                                           required>
                                </div>

                                <div class="col-md-6">
                                    <select class="form-control modern-input"
                                            name="course"
                                            required>

                                        <option value="">Select Course</option>
                                        <option value="Nursing Courses">Nursing Courses</option>
                                        <option value="B Voc">B Voc</option>
                                        <option value="BMLT">BMLT</option>
                                        <option value="DMLT">DMLT</option>
                                        <option value="BRIT">BRIT</option>
                                        <option value="OT">OT</option>
                                        <option value="ANM">ANM</option>
                                        <option value="M-Voc">M-Voc</option>
                                        <option value="GNM">GNM</option>

                                    </select>
                                </div>

                                <div class="col-12">
                                    <textarea name="message"
                                              rows="5"
                                              class="form-control modern-input"
                                              placeholder="Write Your Message *"
                                              required></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="theme-btn submit-btn">
                                        Book Free Session →
                                    </button>
                                </div>

                                <div class="col-12">
                                    <div id="enquiry-alert-msg" class="alert-msg text-center"></div>
                                </div>

                            </div>

                        </form>

                        <!-- Flash Messages -->
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger mt-4">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <p class="mb-1"><?= esc($error) ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success mt-4">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <!-- RIGHT IMAGE -->
            <div class="col-lg-6">

                <div class="enquiry-image">

                    <img src="<?= base_url('public') ?>/assets/images/girl_img.png"
                         alt="Counseling">

                    <!-- Floating Card -->
                    <div class="floating-card">
                        <h4>1000+</h4>
                        <p>Students Guided Successfully</p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>


<!-- END SECTION REGISTER -->

<!-- START SECTION GALLERY -->
<section class="modern-gallery-section">

    <div class="container">

        <!-- Heading -->
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="section-heading text-center">

                    <span>Campus Moments</span>

                    <h2>Our Gallery</h2>

                    <p>
                        Explore the vibrant learning environment, student activities,
                        workshops, campus events, and memorable moments at DHCI.
                    </p>

                </div>

            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="row g-4">

            <?php if (!empty($gallery)): ?>

                <?php foreach ($gallery as $row): ?>

                    <div class="col-lg-3 col-md-6 col-sm-6">

                        <div class="gallery-card">

                            <!-- Image -->
                            <div class="gallery-img">

                                <img src="<?= base_url('uploads/gallery/' . $row['image']); ?>"
                                     alt="<?= esc($row['alt']); ?>">

                                <!-- Overlay -->
                                <div class="gallery-overlay">

                                    <a href="<?= base_url('uploads/gallery/' . $row['image']); ?>"
                                       class="gallery-icon image_popup">

                                        <i class="ion-image"></i>

                                    </a>

                                </div>

                            </div>

                            <!-- Content -->
                            <div class="gallery-content">

                                <h5>
                                    <?= esc($row['title']); ?>
                                </h5>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="col-12 text-center">
                    <p>No gallery images available.</p>
                </div>

            <?php endif; ?>

        </div>

    </div>

</section>


<!-- END SECTION GALLERY -->



<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->

<!-- Popup modal + AJAX form handling -->
<script>
$(document).ready(function () {

    // Show enquiry modal 3 seconds after page load
    setTimeout(function () {
        $('#contactModal').modal('show');
    }, 3000);

    // ------------------------------------------------------
    // Generic AJAX submit handler for both enquiry forms
    // ------------------------------------------------------
    function handleEnquiryForm(formSelector, alertBoxSelector, closeModal) {
        $(formSelector).on('submit', function (e) {
            e.preventDefault();

            var $form = $(this);
            var $alertBox = $(alertBoxSelector);
            var $btn = $form.find('button[type="submit"]');
            var originalBtnText = $btn.html();

            $btn.prop('disabled', true).text('Please wait...');
            $alertBox.removeClass('text-danger text-success').text('');

            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                success: function (response) {
                    if (response && response.success) {
                        $alertBox.addClass('text-success').text(response.message || 'Thank you! We will contact you shortly.');
                        $form[0].reset();

                        if (closeModal) {
                            setTimeout(function () {
                                $('#contactModal').modal('hide');
                            }, 1200);
                        }
                    } else {
                        var msg = (response && response.message) ? response.message : 'Something went wrong. Please try again.';
                        $alertBox.addClass('text-danger').text(msg);
                    }
                },
                error: function () {
                    $alertBox.addClass('text-danger').text('Unable to submit right now. Please try again later.');
                },
                complete: function () {
                    $btn.prop('disabled', false).html(originalBtnText);
                }
            });
        });
    }

    handleEnquiryForm('#popupEnquiryForm', '#alert-msg', true);
    handleEnquiryForm('#enquiryForm', '#enquiry-alert-msg', false);

});
</script>
<!-- END FOOTER -->