<!-- =========================
     MODERN CTA + FOOTER
========================= -->

<style>

/* =========================
   CTA SECTION
========================= */

.modern-cta{
    position:relative;
    padding:90px 0;
    overflow:hidden;
    background:linear-gradient(135deg,#0388c6 0%,#071122 100%);
}

.modern-cta::before{
    content:'';
    position:absolute;
    width:420px;
    height:420px;
    background:rgba(255,255,255,0.04);
    border-radius:50%;
    top:-180px;
    left:-180px;
}

.modern-cta::after{
    content:'';
    position:absolute;
    width:320px;
    height:320px;
    background:rgba(255,255,255,0.03);
    border-radius:50%;
    bottom:-150px;
    right:-120px;
}

.cta-wrapper{
    position:relative;
    z-index:2;
}

.cta-badge{
    display:inline-block;
    padding:10px 24px;
    border-radius:50px;
    background:rgba(255,255,255,0.12);
    color:#fff;
    font-size:13px;
    letter-spacing:1px;
    margin-bottom:22px;
    backdrop-filter:blur(10px);
}

.cta-title{
    font-size:54px;
    font-weight:800;
    color:#fff;
    line-height:1.2;
    margin-bottom:20px;
}

.cta-title span{
    color:#ffb86b;
}

.cta-desc{
    color:#dbeafe;
    font-size:17px;
    line-height:1.9;
    max-width:700px;
}

.cta-btn-group{
    margin-top:35px;
    display:flex;
    gap:18px;
    flex-wrap:wrap;
}

.cta-btn-primary{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    padding:16px 34px;
    border-radius:60px;
    background:#fff;
    color:#0388c6;
    font-weight:700;
    text-decoration:none;
    transition:0.3s ease;
    box-shadow:0 15px 35px rgba(0,0,0,0.15);
}

.cta-btn-primary:hover{
    transform:translateY(-4px);
    color:#0388c6;
    text-decoration:none;
}

.cta-btn-secondary{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    padding:16px 34px;
    border-radius:60px;
    border:2px solid rgba(255,255,255,0.18);
    color:#fff;
    font-weight:700;
    text-decoration:none;
    transition:0.3s ease;
    background:rgba(255,255,255,0.05);
}

.cta-btn-secondary:hover{
    background:#fff;
    color:#071122;
    transform:translateY(-4px);
    text-decoration:none;
}

/* =========================
   FLOATING CARD
========================= */

.cta-floating-card{
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.08);
    backdrop-filter:blur(14px);
    border-radius:30px;
    padding:35px;
    color:#fff;
    box-shadow:0 20px 45px rgba(0,0,0,0.18);
}

.cta-floating-card h4{
    font-size:24px;
    font-weight:700;
    margin-bottom:14px;
}

.cta-floating-card p{
    color:#dbeafe;
    line-height:1.8;
    margin-bottom:25px;
}

.cta-stats{
    display:flex;
    justify-content:space-between;
    gap:15px;
}

.cta-stat-box{
    flex:1;
    background:rgba(255,255,255,0.06);
    padding:18px;
    border-radius:18px;
    text-align:center;
}

.cta-stat-box h3{
    font-size:28px;
    font-weight:800;
    margin-bottom:5px;
    color:#fff;
}

.cta-stat-box span{
    font-size:13px;
    color:#dbeafe;
}

/* =========================
   FOOTER
========================= */

.modern-footer{
    background:#020817;
    color:#cbd5e1;
}

.footer-top{
    padding:85px 0 55px;
    border-bottom:1px solid rgba(255,255,255,0.05);
}

.footer-widget{
    margin-bottom:35px;
}

.footer-logo-title{
    font-size:30px;
    font-weight:800;
    color:#fff;
    margin-bottom:20px;
}

.footer-about{
    color:#94a3b8;
    line-height:1.9;
    margin-bottom:28px;
    font-size:15px;
}

.footer-title{
    color:#fff;
    font-size:20px;
    font-weight:700;
    margin-bottom:28px;
    position:relative;
}

.footer-title::after{
    content:'';
    width:55px;
    height:3px;
    border-radius:10px;
    background:linear-gradient(to right,#00b8ff,#ff9800);
    position:absolute;
    left:0;
    bottom:-10px;
}

/* =========================
   CONTACT
========================= */

.footer-contact{
    list-style:none;
    padding:0;
    margin:0;
}

.footer-contact li{
    display:flex;
    align-items:flex-start;
    gap:14px;
    margin-bottom:22px;
}

.footer-contact i{
    width:44px;
    height:44px;
    border-radius:14px;
    background:linear-gradient(135deg,#0388c6,#00b8ff);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    font-size:15px;
}

.footer-contact a{
    color:#cbd5e1;
    text-decoration:none;
    line-height:1.8;
    transition:0.3s ease;
}

.footer-contact a:hover{
    color:#fff;
}

/* =========================
   LINKS
========================= */

.footer-links{
    list-style:none;
    padding:0;
    margin:0;
}

.footer-links li{
    margin-bottom:15px;
}

.footer-links a{
    color:#94a3b8;
    text-decoration:none;
    transition:0.3s ease;
    position:relative;
    padding-left:18px;
    font-size:15px;
}

.footer-links a::before{
    content:'›';
    position:absolute;
    left:0;
    top:-1px;
    color:#00b8ff;
    font-size:18px;
}

.footer-links a:hover{
    color:#fff;
    padding-left:24px;
}

/* =========================
   NEWSLETTER
========================= */

.newsletter-box{
    background:#0b1325;
    padding:28px;
    border-radius:28px;
    border:1px solid rgba(255,255,255,0.05);
}

.newsletter-box p{
    color:#94a3b8;
    line-height:1.8;
    margin-bottom:20px;
}

.newsletter-form input{
    width:100%;
    height:58px;
    border:none;
    border-radius:16px;
    background:#111827;
    padding:0 20px;
    color:#fff;
    margin-bottom:15px;
    outline:none;
}

.newsletter-form input::placeholder{
    color:#94a3b8;
}

.newsletter-btn{
    width:100%;
    height:56px;
    border:none;
    border-radius:16px;
    background:linear-gradient(135deg,#0388c6,#00b8ff);
    color:#fff;
    font-weight:700;
    transition:0.3s ease;
}

.newsletter-btn:hover{
    transform:translateY(-3px);
}

/* =========================
   MAP
========================= */

.footer-map{
    margin-top:25px;
    border-radius:24px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,0.08);
}

/* =========================
   FOOTER BOTTOM
========================= */

.footer-bottom{
    padding:28px 0;
    background:#01040d;
}

.footer-copy{
    color:#94a3b8;
    margin:0;
    font-size:15px;
}

.footer-copy a{
    color:#fff;
    text-decoration:none;
}

.footer-social{
    display:flex;
    justify-content:flex-end;
    gap:14px;
    list-style:none;
    padding:0;
    margin:0;
}

.footer-social li a{
    width:48px;
    height:48px;
    border-radius:16px;
    background:#111827;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    transition:0.3s ease;
    text-decoration:none;
}

.footer-social li a:hover{
    background:linear-gradient(135deg,#0388c6,#00b8ff);
    transform:translateY(-4px);
}

/* =========================
   SCROLL TOP
========================= */

.scrollup{
    position:fixed;
    right:25px;
    bottom:25px;
    width:52px;
    height:52px;
    border-radius:18px;
    background:linear-gradient(135deg,#0388c6,#00b8ff);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    z-index:999;
    box-shadow:0 12px 28px rgba(3,136,198,0.28);
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:991px){

    .cta-title{
        font-size:40px;
    }

    .cta-floating-card{
        margin-top:40px;
    }

    .footer-social{
        justify-content:flex-start;
        margin-top:20px;
    }

}

@media(max-width:767px){

    .modern-cta{
        padding:70px 0;
    }

    .cta-title{
        font-size:30px;
    }

    .cta-desc{
        font-size:15px;
    }

    .cta-btn-group{
        flex-direction:column;
    }

    .cta-btn-primary,
    .cta-btn-secondary{
        width:100%;
    }

    .footer-top{
        padding:70px 0 40px;
    }

}

</style>

<!-- =========================
     MODERN CTA
========================= -->

<section class="modern-cta">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <div class="cta-wrapper">

                    <div class="cta-badge">
                        FUTURE HEALTHCARE CAREERS
                    </div>

                    <h2 class="cta-title">
                        Build Your <span>Successful Career</span> With DHCI
                    </h2>

                    <p class="cta-desc">
                        Join Delhi Healthcare Institute and get practical
                        training, industry-focused education, clinical exposure,
                        and placement support designed for modern healthcare professionals.
                    </p>

                    <div class="cta-btn-group">

                        <a href="<?= site_url('contact') ?>" class="cta-btn-primary">
                            Apply Now
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                        <a href="<?= site_url('courses.php') ?>" class="cta-btn-secondary">
                            Explore Courses
                            <i class="fa-solid fa-book-open"></i>
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-5">

                <div class="cta-floating-card">

                    <h4>Why Students Choose DHCI?</h4>

                    <p>
                        Modern infrastructure, experienced faculty,
                        practical training, and strong career support
                        help students become future-ready healthcare professionals.
                    </p>

                    <div class="cta-stats">

                        <div class="cta-stat-box">
                            <h3>100%</h3>
                            <span>Practical Training</span>
                        </div>

                        <div class="cta-stat-box">
                            <h3>50+</h3>
                            <span>Healthcare Programs</span>
                        </div>

                        <div class="cta-stat-box">
                            <h3>24/7</h3>
                            <span>Student Support</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
     MODERN FOOTER
========================= -->

<footer class="modern-footer">

    <div class="footer-top">

        <div class="container">

            <div class="row">

                <!-- ABOUT -->
                <div class="col-lg-3 col-md-6">

                    <div class="footer-widget">

                        <div class="footer-logo-title">
                            DHCI
                        </div>

                        <ul class="footer-contact">

                            <li>
                                <i class="fa-solid fa-location-dot"></i>

                                <div>
                                    <a href="javascript:void(0);">
                                        <?= site_setting('address') ?>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <i class="fa-solid fa-envelope"></i>

                                <div>
                                    <a href="mailto:<?= site_setting('email') ?>">
                                        <?= site_setting('email') ?>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <i class="fa-solid fa-phone"></i>

                                <div>
                                    <a href="tel:<?= site_setting('number') ?>">
                                        +91 <?= site_setting('number') ?>
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </div>

                </div>

                <!-- INFORMATION -->
                <div class="col-lg-2 col-md-6">

                    <div class="footer-widget">

                        <h4 class="footer-title">
                            Information
                        </h4>

                        <ul class="footer-links">

                            <li><a href="<?= base_url('about_us') ?>">About Us</a></li>

                            <li><a href="<?= base_url('gallery') ?>">Gallery</a></li>

                            <li><a href="<?= base_url('videogallery') ?>">Videos</a></li>

                            <li><a href="<?= base_url('contact') ?>">Contact</a></li>

                            <li><a href="<?= base_url('admin') ?>">Franchise Login</a></li>

                            <li><a href="<?= base_url('franchise') ?>">Apply Franchise</a></li>

                        </ul>

                    </div>

                </div>

                <!-- STUDENT HELP -->
                <div class="col-lg-3 col-md-6">

                    <div class="footer-widget">

                        <h4 class="footer-title">
                            Student Help
                        </h4>

                        <ul class="footer-links">

                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#Login">
                                    Student Login
                                </a>
                            </li>

                            <li>
                                <a href="<?= url_to('download_certificate') ?>">
                                    Download Certificate
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#onlinePayment">
                                    Pay Online
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('privacy_policy') ?>">
                                    Privacy Policy
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('terms_conditions') ?>">
                                    Terms & Conditions
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('refund_policy') ?>">
                                    Refund Policy
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('cookies_policy') ?>">
                                    Cookies Policy
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>

                <!-- NEWSLETTER -->
                <div class="col-lg-4 col-md-6">

                    <div class="footer-widget">

                        <h4 class="footer-title">
                            Subscribe Newsletter
                        </h4>

                        <div class="newsletter-box">

                            <p>
                                Subscribe now and get updates about
                                courses, admissions, training programs,
                                and healthcare career opportunities.
                            </p>

                            <form class="newsletter-form">

                                <input type="email"
                                placeholder="Enter Your Email Address"
                                required>

                                <button type="submit" class="newsletter-btn">
                                    Subscribe Now
                                </button>

                            </form>

                        </div>

                        <div class="footer-map">

                            <?php
                            $html = site_setting('map_link');

                            $dom = new DOMDocument();
                            $dom->loadHTML($html);

                            $iframe = $dom->getElementsByTagName('iframe')->item(0);
                            $src = $iframe->getAttribute('src');

                            echo '<iframe src="' . $src . '" width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
                            ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER BOTTOM -->

    <div class="footer-bottom">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-7">

                    <p class="footer-copy">
                        © <?= date('Y') ?> All Rights Reserved |
                        <a href="<?= site_url() ?>">
                            <?= site_setting('site_name') ?>
                        </a>
                    </p>

                </div>

                <div class="col-md-5">

                    <ul class="footer-social">

                        <li>
                            <a href="https://www.facebook.com/profile.php?id=61575841832951" target="_blank">
                                <i class="ion-social-facebook"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.instagram.com/dhci.delhihealthcareinstitute/" target="_blank">
                                <i class="ion-social-instagram"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.youtube.com/channel/UCJWDFZ4kfJB4UujhLT_wBHA" target="_blank">
                                <i class="ion-social-youtube-outline"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://www.linkedin.com/company/delhi-healthcare-institute" target="_blank">
                                <i class="ion-social-linkedin"></i>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</footer>




<!-- WhatsApp Floating Button -->
<a href="https://wa.me/919218017525" class="whatsapp_float" target="_blank">
    <i class="fa-brands fa-whatsapp"></i>
</a>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
.whatsapp_float{
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 25px;
    right: 25px;
    background: #25D366;
    color: #fff;
    border-radius: 50%;
    text-align: center;
    font-size: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    box-shadow: 0 8px 25px rgba(0,0,0,0.25);
    transition: 0.3s ease;
    text-decoration: none;
}

.whatsapp_float:hover{
    transform: scale(1.1);
    background: #1ebe5d;
    color: #fff;
}
</style>