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
   PARTNER SECTION
========================= */

.partner-section{
    padding:90px 0;
    background:#f7f9fc;
    position:relative;
    overflow:hidden;
}

/* LIGHT BACKGROUND EFFECT */

.partner-section::before{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    background:rgba(3,136,198,0.05);
    border-radius:50%;
    top:-120px;
    left:-120px;
}

.partner-section::after{
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

.partner-badge{
    display:inline-block;
    background:linear-gradient(90deg,#ff7a00,#ff9d42);
    color:#fff;
    padding:8px 20px;
    border-radius:50px;
    font-size:14px;
    margin-bottom:15px;
}

.partner-title{
    font-size:48px;
    font-weight:800;
    color:#0f172a;
    line-height:1.2;
    margin-bottom:18px;
}

.partner-title span{
    color:#0388c6;
}

.partner-line{
    width:80px;
    height:4px;
    background:linear-gradient(to right,#0388c6,#ff7a00);
    border-radius:20px;
    margin:0 auto 22px;
}

.partner-description{
    color:#64748b;
    max-width:820px;
    margin:auto;
    line-height:1.8;
    font-size:16px;
}

/* =========================
   GRID
========================= */

.partner-grid{
    margin-top:65px;
    position:relative;
    z-index:2;
}

/* =========================
   CARD
========================= */

.partner-card{
    background:#fff;
    border-radius:24px;
    padding:35px 28px;
    text-align:center;
    transition:0.3s ease;
    height:100%;
    border:1px solid #edf2f7;
    box-shadow:0 8px 24px rgba(15,23,42,0.06);
}

.partner-card:hover{
    transform:translateY(-6px);
    box-shadow:0 16px 40px rgba(15,23,42,0.12);
}

/* =========================
   ICON
========================= */

.partner-icon{
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

.partner-icon i{
    font-size:30px;
    color:#fff;
}

/* =========================
   CARD TEXT
========================= */

.partner-card h4{
    font-size:21px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:14px;
}

.partner-card p{
    font-size:15px;
    color:#64748b;
    line-height:1.8;
    margin:0;
}

/* =========================
   BOTTOM CTA
========================= */

.partner-bottom{
    margin-top:80px;
    border-radius:32px;
    padding:75px 35px;
    text-align:center;
    background:linear-gradient(135deg,#0388c6,#0f172a);
    box-shadow:0 18px 50px rgba(15,23,42,0.18);
    position:relative;
    overflow:hidden;
}

.partner-bottom::before{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    background:rgba(255,255,255,0.06);
    border-radius:50%;
    top:-80px;
    right:-80px;
}

.partner-bottom::after{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    background:rgba(255,255,255,0.05);
    border-radius:50%;
    bottom:-70px;
    left:-70px;
}

.partner-bottom h3{
    color:#fff;
    font-size:42px;
    font-weight:800;
    margin-bottom:18px;
    position:relative;
    z-index:2;
}

.partner-bottom p{
    color:#dbeafe;
    max-width:760px;
    margin:auto;
    line-height:1.9;
    font-size:16px;
    position:relative;
    z-index:2;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:991px){

    .partner-title{
        font-size:38px;
    }

    .partner-bottom h3{
        font-size:34px;
    }

}

@media(max-width:767px){

    .partner-section{
        padding:70px 0;
    }

    .partner-title{
        font-size:30px;
    }

    .partner-description{
        font-size:15px;
    }

    .partner-card{
        padding:30px 24px;
    }

    .partner-bottom{
        padding:55px 25px;
    }

    .partner-bottom h3{
        font-size:28px;
    }

}

</style>

<!-- =========================
     PARTNER SECTION
========================= -->

<section class="partner-section">

    <div class="container">

        <!-- HEADING -->
        <div class="text-center">

            <div class="partner-badge">
                TRUSTED PARTNERS
            </div>

            <h2 class="partner-title">
                Our Strong Network Of <br>
                <span>Academic & Healthcare Partners</span>
            </h2>

            <div class="partner-line"></div>

            <p class="partner-description">
                DNPI India collaborates with reputed universities, hospitals,
                healthcare institutions, and industry experts to provide
                practical exposure, quality education, and career-focused
                opportunities for students.
            </p>

        </div>

        <!-- GRID -->
        <div class="row partner-grid">

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="partner-card">

                    <div class="partner-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>

                    <h4>Top Universities</h4>

                    <p>
                        Collaborated with reputed universities to deliver
                        recognized and industry-oriented education programs.
                    </p>

                </div>
            </div>

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="partner-card">

                    <div class="partner-icon">
                        <i class="fa-solid fa-hospital"></i>
                    </div>

                    <h4>Healthcare Institutions</h4>

                    <p>
                        Strong partnerships with hospitals and healthcare
                        organizations for practical clinical exposure.
                    </p>

                </div>
            </div>

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="partner-card">

                    <div class="partner-icon">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>

                    <h4>Placement Partners</h4>

                    <p>
                        Dedicated industry collaborations helping students
                        secure excellent career opportunities and placements.
                    </p>

                </div>
            </div>

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="partner-card">

                    <div class="partner-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>

                    <h4>Industry Experts</h4>

                    <p>
                        Learn from experienced healthcare professionals
                        with practical industry knowledge and expertise.
                    </p>

                </div>
            </div>

        </div>

        <!-- BOTTOM CTA -->
        <div class="partner-bottom">

            <h3>
                Building Future Healthcare Leaders
            </h3>

            <p>
                Through trusted collaborations and academic excellence,
                DNPI India ensures advanced learning, practical training,
                and career growth opportunities for every student.
            </p>

        </div>

    </div>

</section>

<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->