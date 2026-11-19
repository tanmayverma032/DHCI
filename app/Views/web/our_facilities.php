<?php include("inc/header.php"); ?>

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* =========================
   SECTION
========================= */
/* =========================
   SECTION
========================= */
.facility-section{
    padding:90px 0;
    background:#f7f9fc;
    position:relative;
    overflow:hidden;
}

/* LIGHT BACKGROUND EFFECT */
.facility-section::before{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    background:rgba(3,136,198,0.05);
    border-radius:50%;
    top:-120px;
    left:-120px;
}

.facility-section::after{
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

.facility-badge {
    display: inline-block;
    background: linear-gradient(90deg,#ff7a00,#ff9d42);
    color: #fff;
    padding: 8px 20px;
    border-radius: 50px;
    font-size: 14px;
    margin-bottom: 15px;
}


.facility-title{
    font-size:48px;
    font-weight:800;
    color:#0f172a;
    line-height:1.2;
    margin-bottom:18px;
}

.facility-title span{
    color:#0388c6;
}

.facility-line{
    width:80px;
    height:4px;
    background:linear-gradient(to right,#0388c6,#ff7a00);
    border-radius:20px;
    margin:0 auto 22px;
}

.facility-desc{
    color:#64748b;
    max-width:820px;
    margin:auto;
    line-height:1.8;
    font-size:16px;
}

/* =========================
   GRID
========================= */
.facility-grid{
    margin-top:65px;
    position:relative;
    z-index:2;
}

/* =========================
   CARD
========================= */
.facility-card{
    background:#fff;
    border-radius:24px;
    padding:35px 28px;
    text-align:center;
    transition:0.3s ease;
    height:100%;
    border:1px solid #edf2f7;
    box-shadow:0 8px 24px rgba(15,23,42,0.06);
}

.facility-card:hover{
    transform:translateY(-6px);
    box-shadow:0 16px 40px rgba(15,23,42,0.12);
}

/* =========================
   ICON
========================= */
.facility-icon{
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

.facility-icon i{
    font-size:30px;
    color:#fff;
}

/* =========================
   CARD TEXT
========================= */
.facility-card h4{
    font-size:21px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:14px;
}

.facility-card p{
    font-size:15px;
    color:#64748b;
    line-height:1.8;
    margin:0;
}

/* =========================
   CTA SECTION
========================= */
.facility-cta{
    margin-top:80px;
    border-radius:32px;
    padding:75px 35px;
    text-align:center;
    background:linear-gradient(135deg,#0388c6,#0f172a);
    box-shadow:0 18px 50px rgba(15,23,42,0.18);
    position:relative;
    overflow:hidden;
}

.facility-cta::before{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    background:rgba(255,255,255,0.06);
    border-radius:50%;
    top:-80px;
    right:-80px;
}

.facility-cta::after{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    background:rgba(255,255,255,0.05);
    border-radius:50%;
    bottom:-70px;
    left:-70px;
}

.facility-cta h2{
    color:#fff;
    font-size:42px;
    font-weight:800;
    margin-bottom:18px;
    position:relative;
    z-index:2;
}

.facility-cta p{
    color:#dbeafe;
    max-width:760px;
    margin:auto;
    line-height:1.9;
    font-size:16px;
    position:relative;
    z-index:2;
}

/* =========================
   BUTTONS
========================= */
.facility-btns{
    margin-top:38px;
    position:relative;
    z-index:2;
}

.facility-btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:15px 32px;
    border-radius:60px;
    text-decoration:none;
    font-weight:700;
    margin:10px;
    transition:0.3s ease;
    font-size:15px;
}

.btn-primary-custom{
    background:#fff;
    color:#0388c6;
}

.btn-primary-custom:hover{
    background:#f8fafc;
    color:#0388c6;
    transform:translateY(-3px);
}

.btn-light-custom{
    border:2px solid rgba(255,255,255,0.2);
    background:transparent;
    color:#fff;
}

.btn-light-custom:hover{
    background:#fff;
    color:#0f172a;
    transform:translateY(-3px);
}

/* =========================
   RESPONSIVE
========================= */
@media(max-width:991px){

    .facility-title{
        font-size:38px;
    }

    .facility-cta h2{
        font-size:34px;
    }

}

@media(max-width:767px){

    .facility-section{
        padding:70px 0;
    }

    .facility-title{
        font-size:30px;
    }

    .facility-desc{
        font-size:15px;
    }

    .facility-card{
        padding:30px 24px;
    }

    .facility-cta{
        padding:55px 25px;
    }

    .facility-cta h2{
        font-size:28px;
    }

}

</style>

<!-- =========================
     FACILITY SECTION
========================= -->
<section class="facility-section">

    <div class="container">

        <!-- HEADING -->
        <div class="text-center">

            <div class="facility-badge">
                OUR FACILITIES
            </div>

            <h2 class="facility-title">
                Modern Infrastructure For <br>
                <span>Future Healthcare Professionals</span>
            </h2>

            <div class="facility-line"></div>

            <p class="facility-desc">
                DHCI offers a professionally designed learning ecosystem focused on
                practical training, advanced technology, and career-oriented education
                to prepare students for real healthcare environments.
            </p>

        </div>

        <!-- GRID -->
        <div class="row facility-grid">

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">

                    <div class="facility-icon">
                        <i class="fa-solid fa-flask"></i>
                    </div>

                    <h4>Advanced Labs</h4>

                    <p>
                        Modern practical laboratories equipped with industry-standard
                        healthcare tools and technology.
                    </p>

                </div>
            </div>

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">

                    <div class="facility-icon">
                        <i class="fa-solid fa-hospital"></i>
                    </div>

                    <h4>Clinical Training</h4>

                    <p>
                        Real-time clinical exposure and internships for practical
                        healthcare experience.
                    </p>

                </div>
            </div>

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">

                    <div class="facility-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>

                    <h4>Smart Classrooms</h4>

                    <p>
                        Interactive digital classrooms designed for engaging
                        and modern learning.
                    </p>

                </div>
            </div>

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">

                    <div class="facility-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>

                    <h4>Expert Faculty</h4>

                    <p>
                        Highly experienced educators and healthcare professionals
                        guiding every student.
                    </p>

                </div>
            </div>

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">

                    <div class="facility-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>

                    <h4>Digital Library</h4>

                    <p>
                        Access to updated study materials, journals, and
                        digital academic resources.
                    </p>

                </div>
            </div>

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">

                    <div class="facility-icon">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>

                    <h4>Placement Support</h4>

                    <p>
                        Dedicated placement assistance connecting students
                        with leading healthcare sectors.
                    </p>

                </div>
            </div>

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">

                    <div class="facility-icon">
                        <i class="fa-solid fa-comments"></i>
                    </div>

                    <h4>Skill Development</h4>

                    <p>
                        Personality development, communication skills,
                        and career enhancement sessions.
                    </p>

                </div>
            </div>

            <!-- CARD -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="facility-card">

                    <div class="facility-icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>

                    <h4>Industry Curriculum</h4>

                    <p>
                        Updated curriculum aligned with current healthcare
                        industry standards and practices.
                    </p>

                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="facility-cta">

            <h2>
                Build Your Future With DHCI
            </h2>

            <p>
                Experience practical learning, modern infrastructure, expert guidance,
                and career-focused education designed to help you succeed in the
                healthcare industry.
            </p>
            <div class="facility-btns">
            
                <a href="#" class="facility-btn btn-primary-custom">
                    Apply Now
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            
                <a href="index.php#courses" class="facility-btn btn-light-custom">
                    Explore Courses
                    <i class="fa-solid fa-book-open"></i>
                </a>
            
            </div>

        </div>

    </div>

</section>

<?php include("inc/footer.php"); ?>