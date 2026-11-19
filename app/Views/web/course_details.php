<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18194245812">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-18194245812');
</script>

<!-- Event snippet for Submit lead form conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-18194245812/GZuLCMzW97UcELTR2OND'});
</script>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Lora:wght@500;600;700&display=swap" rel="stylesheet">

<style>
/* =========================================================
   COURSE DETAIL PAGE — DESIGN TOKENS
========================================================= */

.cd-page{
    --navy:#0b2b4f;
    --blue:#0389c6;
    --cyan:#06b6d4;
    --amber:#f59e0b;
    --ink:#1e293b;
    --muted:#64748b;
    --bg:#f5f8fb;
    --surface:#ffffff;
    --border:#e6edf5;
    --radius-lg:26px;
    --radius-md:18px;
    --shadow:0 12px 34px rgba(11,43,79,.08);

    background:var(--bg);
    font-family:'Poppins',sans-serif;
    color:var(--ink);
    padding-bottom:90px;
}

.cd-page *{
    box-sizing:border-box;
}

.cd-page img{
    max-width:100%;
    display:block;
}

.cd-page a{
    text-decoration:none;
    transition:.25s ease;
}

.cd-page .container{
    max-width:1240px;
}

.cd-serif{
    font-family:'Lora',serif;
}

/* =========================================================
   BREADCRUMB
========================================================= */

.cd-crumb{
    padding:22px 0 0;
    font-size:13px;
    font-weight:500;
    color:var(--muted);
}

.cd-crumb a{
    color:var(--muted);
}

.cd-crumb a:hover{
    color:var(--blue);
}

.cd-crumb span{
    color:var(--navy);
    font-weight:600;
}

/* =========================================================
   HERO
========================================================= */

.cd-hero{
    position:relative;
    margin-top:16px;
    border-radius:var(--radius-lg);
    overflow:hidden;
    box-shadow:var(--shadow);
}

.cd-hero img{
    width:100%;
    height:460px;
    object-fit:cover;
}

.cd-hero::after{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(180deg,
        rgba(11,43,79,0) 30%,
        rgba(11,43,79,.55) 75%,
        rgba(6,20,38,.88) 100%);
}

/* Top row — eyebrow pill + Apply button, kept well clear of the overlap card */

.cd-hero-top{
    position:absolute;
    top:0;
    left:0;
    right:0;
    z-index:2;
    padding:28px 34px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
}

.cd-eyebrow{
    display:inline-flex;
    align-items:center;
    gap:9px;
    background:rgba(6,20,38,.45);
    -webkit-backdrop-filter:blur(6px);
    backdrop-filter:blur(6px);
    border:1px solid rgba(255,255,255,.2);
    color:#e6f4fb;
    font-size:12px;
    font-weight:600;
    letter-spacing:1.1px;
    text-transform:uppercase;
    padding:9px 18px 9px 14px;
    border-radius:50px;
}

.cd-eyebrow::before{
    content:'';
    width:16px;
    height:2px;
    background:var(--cyan);
    display:inline-block;
}

.cd-hero-apply{
    flex-shrink:0;
    display:inline-flex;
    align-items:center;
    gap:9px;
    padding:14px 28px;
    background:var(--amber);
    color:#fff;
    font-size:14.5px;
    font-weight:700;
    border-radius:60px;
    white-space:nowrap;
    box-shadow:0 12px 26px rgba(245,158,11,.4);
}

.cd-hero-apply:hover{
    transform:translateY(-3px);
    background:#e08c00;
    color:#fff;
}

/* Bottom row — headline only, with reserved clearance above the overlap card */

.cd-hero-bottom{
    position:absolute;
    left:0;
    right:0;
    bottom:0;
    z-index:2;
    padding:0 45px 100px;
}

.cd-hero h1{
    font-size:40px;
    font-weight:700;
    color:#fff;
    line-height:1.22;
    max-width:680px;
    margin:0;
    text-shadow:0 4px 20px rgba(0,0,0,.22);
}

/* =========================================================
   FACT STRIP — overlaps hero bottom edge
========================================================= */

.cd-facts{
    position:relative;
    z-index:3;
    margin:-58px 26px 0;
    background:var(--surface);
    border-radius:20px;
    box-shadow:0 18px 40px rgba(11,43,79,.12);
    display:grid;
    grid-template-columns:repeat(4,1fr);
}

.cd-fact{
    display:flex;
    align-items:flex-start;
    gap:14px;
    padding:26px 22px;
    border-right:1px solid var(--border);
}

.cd-fact:last-child{
    border-right:0;
}

.cd-fact-icon{
    flex-shrink:0;
    width:44px;
    height:44px;
    border-radius:13px;
    background:linear-gradient(135deg,var(--blue),var(--cyan));
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:17px;
    margin-top:2px;
}

.cd-fact label{
    display:block;
    font-size:11.5px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:.6px;
    color:var(--muted);
    margin-bottom:3px;
}

.cd-fact span{
    display:block;
    font-size:15px;
    font-weight:600;
    line-height:1.5;
    color:var(--navy);
}

/* =========================================================
   LAYOUT
========================================================= */

.cd-layout{
    margin-top:52px;
}

/* =========================================================
   DESCRIPTION CARD
========================================================= */

.cd-card{
    background:var(--surface);
    border:1px solid var(--border);
    border-radius:var(--radius-lg);
    box-shadow:var(--shadow);
    margin-bottom:36px;
}

.cd-description{
    padding:44px 46px;
}

.cd-section-label{
    display:inline-flex;
    align-items:center;
    gap:8px;
    font-size:12.5px;
    font-weight:700;
    letter-spacing:1.2px;
    text-transform:uppercase;
    color:var(--blue);
    margin-bottom:10px;
}

.cd-section-label::before{
    content:'';
    width:8px;
    height:8px;
    border-radius:50%;
    background:var(--cyan);
}

.cd-description h2{
    font-size:28px;
    font-weight:700;
    color:var(--navy);
    margin-bottom:26px;
}

/* Rich content injected from the database (headings, paragraphs, lists) */

.cd-rich p{
    font-size:15.5px;
    line-height:1.9;
    color:var(--muted);
    text-align:left;
    margin-bottom:16px;
}

.cd-rich p:last-child{
    margin-bottom:0;
}

.cd-rich h2,
.cd-rich h3,
.cd-rich h4{
    font-family:'Poppins',sans-serif;
    font-size:19px;
    font-weight:700;
    color:var(--navy);
    margin:32px 0 16px;
    padding-left:16px;
    border-left:4px solid var(--cyan);
}

.cd-rich > *:first-child{
    margin-top:0;
}

.cd-rich strong,
.cd-rich b{
    color:var(--navy);
    font-weight:600;
}

.cd-rich ul,
.cd-rich ol{
    list-style:none;
    padding:0;
    margin:0 0 18px;
}

.cd-rich ul li{
    position:relative;
    padding-left:32px;
    margin-bottom:13px;
    font-size:15px;
    line-height:1.7;
    color:var(--muted);
}

.cd-rich ul li:last-child{
    margin-bottom:0;
}

.cd-rich ul li::before{
    content:'\f00c';
    font-family:'Font Awesome 6 Free';
    font-weight:900;
    position:absolute;
    left:0;
    top:1px;
    width:20px;
    height:20px;
    font-size:10px;
    color:var(--blue);
    background:#e6f4fb;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
}

.cd-rich ol{
    counter-reset:cd-ol;
}

.cd-rich ol li{
    position:relative;
    padding-left:32px;
    margin-bottom:13px;
    font-size:15px;
    line-height:1.7;
    color:var(--muted);
    counter-increment:cd-ol;
}

.cd-rich ol li::before{
    content:counter(cd-ol);
    position:absolute;
    left:0;
    top:0;
    width:21px;
    height:21px;
    font-size:11px;
    font-weight:700;
    color:#fff;
    background:var(--blue);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
}

/* =========================================================
   RELATED COURSES
========================================================= */

.cd-related-head{
    display:flex;
    align-items:baseline;
    justify-content:space-between;
    margin-bottom:22px;
}

.cd-related-head h3{
    font-size:24px;
    font-weight:700;
    color:var(--navy);
    margin:0;
}

.cd-related-head p{
    margin:0;
    font-size:13.5px;
    color:var(--muted);
}

.cd-related-card{
    background:var(--surface);
    border:1px solid var(--border);
    border-radius:22px;
    overflow:hidden;
    height:100%;
    transition:.35s ease;
    box-shadow:0 8px 22px rgba(11,43,79,.05);
}

.cd-related-card:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 40px rgba(11,43,79,.12);
}

.cd-related-card img{
    width:100%;
    height:210px;
    object-fit:cover;
}

.cd-related-body{
    padding:24px;
}

.cd-related-body h4{
    font-size:18px;
    line-height:1.5;
    font-weight:700;
    margin-bottom:16px;
}

.cd-related-body h4 a{
    color:var(--navy);
}

.cd-related-body h4 a:hover{
    color:var(--blue);
}

.cd-related-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:11px 22px;
    background:var(--bg);
    border:1px solid var(--border);
    color:var(--navy);
    border-radius:50px;
    font-size:13.5px;
    font-weight:600;
}

.cd-related-btn:hover{
    background:var(--blue);
    border-color:var(--blue);
    color:#fff;
}

/* =========================================================
   SIDEBAR
========================================================= */

.cd-sidebar{
    position:sticky;
    top:24px;
}

.cd-widget{
    background:var(--surface);
    border:1px solid var(--border);
    border-radius:22px;
    padding:26px;
    margin-bottom:26px;
    box-shadow:var(--shadow);
}

.cd-widget-title{
    font-size:17px;
    font-weight:700;
    color:var(--navy);
    margin-bottom:20px;
}

/* SEARCH */

.cd-search{
    position:relative;
}

.cd-search input{
    width:100%;
    height:54px;
    border-radius:60px;
    border:1px solid var(--border);
    background:var(--bg);
    padding:0 56px 0 20px;
    outline:none;
    font-family:'Poppins',sans-serif;
    font-size:14px;
    color:var(--ink);
}

.cd-search input:focus{
    border-color:var(--blue);
    background:#fff;
}

.cd-search button{
    position:absolute;
    right:5px;
    top:5px;
    width:44px;
    height:44px;
    border:none;
    border-radius:50%;
    background:var(--blue);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
}

/* LATEST COURSES */

.cd-latest{
    display:flex;
    align-items:center;
    gap:14px;
    padding:12px 0;
    border-bottom:1px solid var(--border);
}

.cd-latest:last-child{
    border-bottom:0;
    padding-bottom:0;
}

.cd-latest:first-child{
    padding-top:0;
}

.cd-latest img{
    width:64px;
    height:64px;
    object-fit:cover;
    border-radius:14px;
    flex-shrink:0;
}

.cd-latest h6{
    margin:0;
    font-size:14px;
    line-height:1.55;
}

.cd-latest h6 a{
    color:var(--navy);
    font-weight:600;
}

.cd-latest h6 a:hover{
    color:var(--blue);
}

/* CATEGORY LIST */

.cd-cat-list{
    list-style:none;
    padding:0;
    margin:0;
}

.cd-cat-list li{
    border-bottom:1px dashed var(--border);
}

.cd-cat-list li:last-child{
    border-bottom:none;
}

.cd-cat-list a{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:13px 2px;
    color:var(--ink);
    font-size:14.5px;
    font-weight:600;
}

.cd-cat-list a:hover{
    color:var(--blue);
}

.cd-cat-list a span:last-child{
    background:var(--bg);
    color:var(--muted);
    font-size:12px;
    font-weight:700;
    padding:3px 10px;
    border-radius:20px;
}

/* NEED HELP CARD */

.cd-help-widget{
    background:linear-gradient(150deg,var(--navy),#123a63);
    color:#fff;
    border:none;
}

.cd-help-widget h4{
    font-size:19px;
    font-weight:700;
    color:#fff;
    margin-bottom:10px;
}

.cd-help-widget p{
    font-size:13.5px;
    color:#c6dbee;
    line-height:1.8;
    margin-bottom:22px;
}

.cd-help-btn{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    width:100%;
    padding:15px;
    background:var(--cyan);
    color:#06222e;
    font-weight:700;
    font-size:14.5px;
    border-radius:50px;
}

.cd-help-btn:hover{
    background:#fff;
    color:var(--navy);
}

/* =========================================================
   MOBILE STICKY APPLY BAR
========================================================= */

.cd-mobile-apply{
    display:none;
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:991px){

    .cd-hero img{
        height:380px;
    }

    .cd-hero-top{
        padding:22px 26px;
    }

    .cd-hero-bottom{
        padding:0 28px 76px;
    }

    .cd-hero h1{
        font-size:29px;
    }

    .cd-facts{
        grid-template-columns:repeat(2,1fr);
        margin:-38px 18px 0;
    }

    .cd-fact:nth-child(odd){
        border-right:1px solid var(--border);
    }

    .cd-fact:nth-child(even){
        border-right:0;
    }

    .cd-fact:nth-child(-n+2){
        border-bottom:1px solid var(--border);
    }

    .cd-sidebar{
        position:static;
        margin-top:10px;
    }
}

@media(max-width:576px){

    .cd-page{
        padding-bottom:110px;
    }

    .cd-hero{
        border-radius:20px;
        margin-top:10px;
    }

    .cd-hero img{
        height:300px;
    }

    .cd-hero-top{
        padding:18px 16px;
    }

    .cd-hero-bottom{
        padding:0 18px 60px;
    }

    .cd-hero h1{
        font-size:22px;
    }

    .cd-eyebrow{
        font-size:10.5px;
        padding:7px 14px 7px 11px;
    }

    .cd-hero-apply{
        display:none;
    }

    .cd-facts{
        grid-template-columns:1fr;
        margin:-26px 14px 0;
    }

    .cd-fact{
        border-right:0 !important;
        border-bottom:1px solid var(--border) !important;
        padding:20px 22px;
    }

    .cd-fact:last-child{
        border-bottom:0 !important;
    }

    .cd-description,
    .cd-widget{
        padding:24px;
    }

    /* Sticky mobile Apply bar */
    .cd-mobile-apply{
        display:flex;
        position:fixed;
        left:0;
        right:0;
        bottom:0;
        z-index:998;
        background:#fff;
        padding:14px 18px;
        box-shadow:0 -10px 30px rgba(11,43,79,.14);
        align-items:center;
        justify-content:center;
    }

    .cd-mobile-apply a{
        width:100%;
        text-align:center;
        padding:15px;
        background:var(--amber);
        color:#fff;
        font-weight:700;
        border-radius:50px;
        box-shadow:0 10px 22px rgba(245,158,11,.35);
    }
}
</style>

<!-- START COURSE DETAIL -->
<div class="cd-page">
<div class="container">

    <!-- BREADCRUMB -->
    <div class="cd-crumb">
        <a href="<?= base_url() ?>">Home</a> &nbsp;/&nbsp;
        <a href="<?= base_url() ?>">Our Courses</a> &nbsp;/&nbsp;
        <span><?= $courses['name'] ?></span>
    </div>

    <!-- HERO -->
    <div class="cd-hero">

        <img src="<?= site_url('public/') . $courses['thumbnail'] ?>" alt="<?= $courses['name'] ?>">

        <div class="cd-hero-top">

            <div class="cd-eyebrow">DHCI Certified Program</div>

            <a href="<?= base_url('student_ragistration') ?>" class="cd-hero-apply">
                Apply Now
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

        <div class="cd-hero-bottom">
            <h1 class="cd-serif"><?= $courses['name'] ?></h1>
        </div>

    </div>

    <!-- FACT STRIP -->
    <div class="cd-facts">

        <div class="cd-fact">
            <div class="cd-fact-icon"><i class="fa-solid fa-clock"></i></div>
            <div>
                <label>Duration</label>
                <span><?= $courses["duration"] ?> Months</span>
            </div>
        </div>

        <div class="cd-fact">
            <div class="cd-fact-icon"><i class="fa-solid fa-graduation-cap"></i></div>
            <div>
                <label>Eligibility</label>
                <span><?= $courses["course_eligibility"] ?></span>
            </div>
        </div>

        <div class="cd-fact">
            <div class="cd-fact-icon"><i class="fa-solid fa-building-columns"></i></div>
            <div>
                <label>Mode</label>
                <span>Classroom &amp; Clinical</span>
            </div>
        </div>

        <div class="cd-fact">
            <div class="cd-fact-icon"><i class="fa-solid fa-award"></i></div>
            <div>
                <label>Certification</label>
                <span>DHCI Certified</span>
            </div>
        </div>

    </div>

    <!-- MAIN LAYOUT -->
    <div class="row cd-layout">

        <!-- LEFT -->
        <div class="col-lg-8">

            <!-- DESCRIPTION -->
            <div class="cd-card">
                <div class="cd-description">

                    <div class="cd-section-label">About This Program</div>
                    <h2 class="cd-serif">Course Description</h2>

                    <div class="cd-rich">
                        <?= $courses['description'] ?>
                    </div>

                </div>
            </div>

            <!-- RELATED COURSES -->
            <div class="cd-related-head">
                <div>
                    <h3 class="cd-serif">Related Courses</h3>
                    <p>Other programs students also explore</p>
                </div>
            </div>

            <div class="row">

                <?php
                $id = $courses['programid'];
                $ids = $courses['id'];

                $related = db_connect()->query("
                    SELECT * FROM `courses`
                    WHERE programid=$id AND id!=$ids
                    LIMIT 2
                ")->getResultArray();

                foreach ($related as $row) {
                ?>

                <div class="col-md-6 mb-4">

                    <div class="cd-related-card">

                        <img src="<?= site_url('public/') . $row['thumbnail'] ?>" alt="<?= $row['name'] ?>">

                        <div class="cd-related-body">

                            <h4>
                                <a href="<?= site_url('course_details/') . $row['slug'] ?>">
                                    <?= $row['name'] ?>
                                </a>
                            </h4>

                            <a href="<?= site_url('course_details/') . $row['slug'] ?>"
                               class="cd-related-btn">
                                View Details
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

                <?php } ?>

            </div>

        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="col-lg-4">

            <div class="cd-sidebar">

                <!-- SEARCH -->
                <div class="cd-widget">

                    <h4 class="cd-widget-title">Search Course</h4>

                    <form class="cd-search">
                        <input type="text" placeholder="Search...">
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>

                </div>

                <!-- NEED HELP -->
                <div class="cd-widget cd-help-widget">

                    <h4>Need Help Choosing?</h4>
                    <p>Speak with our admission counselors for personalised course guidance.</p>

                    <a href="tel:<?= "9218017525" ?>" class="cd-help-btn">
                        <i class="fa-solid fa-phone"></i>
                        Call +91 <?= "9218017525" ?>
                    </a>

                </div>

                <!-- LATEST -->
                <div class="cd-widget">

                    <h4 class="cd-widget-title">Latest Courses</h4>

                    <?php
                    $courselimit = db_connect()->query("
                        SELECT * FROM `courses`
                        ORDER BY id DESC
                        LIMIT 5
                    ")->getResultArray();

                    foreach ($courselimit as $row) {
                    ?>

                    <div class="cd-latest">

                        <img src="<?= site_url('public/') . $row['thumbnail'] ?>" alt="<?= $row['name'] ?>">

                        <h6>
                            <a href="<?= site_url('course_details/') . $row['slug'] ?>">
                                <?= $row['name'] ?>
                            </a>
                        </h6>

                    </div>

                    <?php } ?>

                </div>

                <!-- CATEGORY -->
                <div class="cd-widget">

                    <h4 class="cd-widget-title">Course Categories</h4>

                    <ul class="cd-cat-list">

                        <?php
                        foreach ($programsname as $row) {

                            $courseall = db_connect()->query("
                                SELECT * FROM `courses`
                                WHERE programid=" . $row['id']
                            )->getNumRows();
                        ?>

                        <li>
                            <a href="<?= site_url('courses/' . $row['slug']) ?>">
                                <span><?= $row['title'] ?></span>
                                <span><?= $courseall ?></span>
                            </a>
                        </li>

                        <?php } ?>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>
</div>
<!-- END COURSE DETAIL -->

<!-- MOBILE STICKY APPLY BAR -->
<div class="cd-mobile-apply">
    <a href="<?= base_url('student_ragistration') ?>">
        Apply Now — <?= $courses['name'] ?>
    </a>
</div>

<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->