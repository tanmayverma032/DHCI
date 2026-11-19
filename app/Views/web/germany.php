<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- START SECTION CONTACT -->
<section class="small_pb bgimg german-banner" style="background-image: url('<?= base_url('public/assets/images/7.jpeg'); ?>');">
    <div class="overlay"></div>

    <div class="container">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-xl-9 col-lg-10">

                <div class="banner-content">
                    <h1>
                        Certified German Language Course In India
                        <br>
                        <span>– A1–B2 Level</span>
                    </h1>

                    <p class="subtitle" style="color:#fff;">
                        Flexible Batches | A1–B2 Goethe Certified | German Language Training
                    </p>

                    <div class="stats-box">
                        <div class="stat-item">
                            <h3>18000+</h3>
                            <p>Learners</p>
                        </div>

                        <div class="stat-item">
                            <h3>95%</h3>
                            <p>Course Completion</p>
                        </div>
                    </div>

                    <div class="rating">
                        ⭐⭐⭐⭐⭐ 4.8/5 Rated by 1000+ Students
                    </div>

                    <div class="banner-btns">
                        <a href="#" class="demo-btn bg-#0388c6" style="background:#0388c6;">📚 Book Free Demo Class</a>
                        <a href="#" class="whatsapp-btn" style="background:#589C97;">💬 Get Fees on WhatsApp</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Floating Icons -->
    <!--<div class="floating-icons">-->
    <!--    <a href="#"><i class="fa fa-phone"></i></a>-->
    <!--    <a href="#"><i class="fa fa-whatsapp"></i></a>-->
    <!--</div>-->
</section>

<style>
/* =========================
   GLOBAL
========================= */
:root{
    --primary:#0388c6;
    --secondary:#589C97;
    --dark:#111827;
    --light:#f8fafc;
    --white:#ffffff;
    --text:#4b5563;
    --radius:16px;
    --shadow:0 15px 40px rgba(0,0,0,.08);
    --transition:.3s ease;
}

body{
    font-family:'Poppins',sans-serif;
    color:var(--text);
    background:#fff;
    line-height:1.7;
}

/* =========================
   HERO BANNER
========================= */
.german-banner{
    position:relative;
    padding:140px 0;
    background-size:cover;
    background-position:center;
    overflow:hidden;
}

.german-banner .overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(
    135deg,
    rgba(0,0,0,.75),
    rgba(3,136,198,.45)
    );
}

.banner-content{
    position:relative;
    z-index:2;
}

.banner-content h1{
    font-size:60px;
    font-weight:800;
    color:#fff;
    line-height:1.2;
    margin-bottom:20px;
}

.banner-content h1 span{
    color:#8ee3ff;
}

.subtitle{
    font-size:22px;
    color:#fff;
    opacity:.95;
    margin-bottom:35px;
}

/* =========================
   STATS
========================= */
.stats-box{
    display:flex;
    justify-content:center;
    gap:30px;
    flex-wrap:wrap;
    margin:40px 0;
}

.stat-item{
    background:rgba(255,255,255,.12);
    backdrop-filter:blur(10px);
    padding:25px 35px;
    border-radius:18px;
    min-width:180px;
}

.stat-item h3{
    font-size:42px;
    color:#8ee3ff;
    font-weight:800;
    margin-bottom:5px;
}

.stat-item p{
    color:#fff;
    margin:0;
}

/* =========================
   RATING
========================= */
.rating{
    display:inline-block;
    background:rgba(255,255,255,.15);
    padding:12px 25px;
    border-radius:50px;
    color:#fff;
    margin-bottom:35px;
    backdrop-filter:blur(10px);
}

/* =========================
   BUTTONS
========================= */
.banner-btns{
    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
}

.demo-btn,
.whatsapp-btn{
    padding:16px 35px;
    border-radius:50px;
    font-weight:600;
    font-size:17px;
    text-decoration:none;
    transition:var(--transition);
}

.demo-btn{
    background:var(--primary);
    color:#fff;
}

.whatsapp-btn{
    background:#25D366;
    color:#fff;
}

.demo-btn:hover,
.whatsapp-btn:hover{
    transform:translateY(-4px);
    box-shadow:0 10px 25px rgba(0,0,0,.15);
}

/* =========================
   SECTION TITLE
========================= */
.section-title{
    font-size:42px;
    font-weight:800;
    color:var(--dark);
    margin-bottom:20px;
}

/* =========================
   CITY BUTTONS
========================= */
.city-btn{
    background:#fff;
    border:2px solid var(--secondary);
    color:var(--dark);
    padding:12px 24px;
    border-radius:50px;
    font-weight:600;
    transition:var(--transition);
    cursor:pointer;
}

.city-btn:hover{
    background:var(--secondary);
    color:#fff;
    transform:translateY(-3px);
}

/* =========================
   TABLE
========================= */
table{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:var(--shadow);
}

thead tr{
    background:linear-gradient(
    135deg,
    var(--primary),
    var(--secondary)
    );
    color:#fff;
}

th,
td{
    padding:18px;
    border:none;
}

tbody tr:nth-child(even){
    background:#f8fafc;
}

tbody tr:hover{
    background:#eef9ff;
}

table a{
    background:var(--primary);
    color:#fff;
    padding:10px 20px;
    border-radius:30px;
    text-decoration:none;
}

/* =========================
   LEVEL CARDS
========================= */
.level-card{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:var(--shadow);
    transition:var(--transition);
}

.level-card:hover{
    transform:translateY(-10px);
}

.level-card-header{
    background:linear-gradient(
    135deg,
    var(--primary),
    var(--secondary)
    );
    color:#fff;
    padding:25px;
}

.level-card-body{
    padding:25px;
}

.level-card h3{
    font-size:28px;
    font-weight:700;
}

.level-card a{
    display:inline-block;
    margin-top:15px;
    background:var(--primary);
    color:#fff;
    padding:12px 24px;
    border-radius:30px;
    text-decoration:none;
}

/* =========================
   MINI CARDS
========================= */
.mini-card,
.offer-card{
    background:#fff;
    border-radius:18px;
    padding:25px;
    width:240px;
    box-shadow:var(--shadow);
    transition:var(--transition);
}

.mini-card:hover,
.offer-card:hover{
    transform:translateY(-8px);
}

.offer-card{
    background:linear-gradient(
    135deg,
    var(--primary),
    var(--secondary)
    );
    color:#fff;
}

/* =========================
   TESTIMONIALS
========================= */
.testimonial{
    background:#fff;
    padding:30px;
    border-radius:20px;
    box-shadow:var(--shadow);
    max-width:350px;
}

.testimonial h4{
    color:var(--primary);
    margin-bottom:5px;
}

/* =========================
   FAQ
========================= */
.faq{
    margin-bottom:15px;
}

.faq button{
    width:100%;
    background:#fff;
    border:none;
    padding:18px 20px;
    border-radius:12px;
    text-align:left;
    font-weight:600;
    box-shadow:var(--shadow);
}

.faq-content{
    display:none;
    background:#fff;
    padding:20px;
    margin-top:10px;
    border-radius:12px;
}

.faq button.active + .faq-content{
    display:block;
}

/* =========================
   RESPONSIVE
========================= */
@media(max-width:768px){

    .banner-content h1{
        font-size:36px;
    }

    .subtitle{
        font-size:16px;
    }

    .stats-box{
        flex-direction:column;
        align-items:center;
    }

    .stat-item{
        width:100%;
        max-width:280px;
    }

    .section-title{
        font-size:30px;
    }

    .demo-btn,
    .whatsapp-btn{
        width:100%;
    }
}
</style>
<!-- START SECTION CONTACT -->
<section style="position:relative; padding:60px 0;">

    <!-- Overlay -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6);"></div>

    <div class="container" style="position:relative; z-index:2;">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-xl-9 col-lg-10">


            </div>
        </div>
    </div>

</section>
<section style="position:relative; padding:60px 0; background:#f9f9f9;">

    <div class="container" style="position:relative; z-index:2; text-align:center;">

        <!-- Heading -->
        <h2 style="font-weight:700; margin-bottom:25px;">
            🌍 Select Your City & Book Your Free German Demo Class
        </h2>

        <!-- City Buttons -->
        <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:12px; margin-bottom:20px;">

            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Delhi</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Gurgaon</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Noida</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Chandigarh</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Bangalore</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Chennai</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Pune</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Mumbai</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Hyderabad</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Navi Mumbai</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Jaipur</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Thane</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Pimpri-Chinchwad</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Kolkata</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Lucknow</span>
            <span style="background:#589C97; padding:10px 18px; border-radius:8px; font-weight:600; cursor:pointer;color: #000000;">Ghaziabad</span>

        </div>

        <!-- CTA Button -->
        <div style="margin:30px 0;">
            <a href="#" style="background:#0388c6; color:#fff; padding:12px 25px; border-radius:6px; text-decoration:none; font-weight:600; display:inline-block;">
                Book Free Demo Class
            </a>
        </div>

        <!-- Sub Heading -->
        <h3 style="font-weight:700; margin-bottom:15px;">
            Best Online German Language Course in India | A1-B2 | Goethe Certified
        </h3>

        <!-- Description -->
        <p style="max-width:900px; margin:auto; line-height:1.7; color:#444;">
            Learn German language online in India with certified trainers, flexible batches, and exam preparation.
            Whether you want to study abroad or work in Germany, our courses help you achieve fluency and success.
        </p>

        <!-- Yellow Strip -->
        <div style="background:#589C97; margin-top:30px; padding:20px; text-align:center; border-radius:5px;">
            <h4 style="margin-bottom:10px; font-weight:700;">
                🎯 Want A Free Demo Class?
            </h4>
            <a href="#" style="background:#0388c6; color:#fff; padding:10px 20px; border-radius:6px; text-decoration:none; font-weight:600;">
                Chat Now To Book
            </a>
        </div>

    </div>

</section>

<section style="padding:60px 0; background:#f5f5f5; font-family:Arial, sans-serif;">

    <div style="max-width:1200px; margin:auto;">

        <!-- Heading -->
        <h2 style="text-align:center; font-weight:700; margin-bottom:30px;">
            Enroll Now For Upcoming Batches
        </h2>

        <!-- Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; text-align:center;">

                <!-- Table Head -->
                <thead>
                    <tr style="background:#589C97; color:#000;">
                        <th style="padding:15px; border:1px solid #000;">Level</th>
                        <th style="padding:15px; border:1px solid #000;">Days</th>
                        <th style="padding:15px; border:1px solid #000;">Date</th>
                        <th style="padding:15px; border:1px solid #000;">Time</th>
                        <th style="padding:15px; border:1px solid #000;">Action</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody>

                    <tr style="background:#589C97;">
                        <td style="padding:14px; border:1px solid #000;">IELTS</td>
                        <td style="padding:14px; border:1px solid #000;">Mon–Fri</td>
                        <td style="padding:14px; border:1px solid #000;">6 April</td>
                        <td style="padding:14px; border:1px solid #000;">09:00 PM</td>
                        <td style="border:1px solid #000;">
                            <a href="#" style="background:#0388c6; color:#fff; padding:8px 16px; border-radius:5px; text-decoration:none;">Apply Now</a>
                        </td>
                    </tr>

                    <tr style="background:#ffffff;">
                        <td style="padding:14px; border:1px solid #000;">A1</td>
                        <td style="padding:14px; border:1px solid #000;">Mon–Fri</td>
                        <td style="padding:14px; border:1px solid #000;">3 April</td>
                        <td style="padding:14px; border:1px solid #000;">07:00 PM</td>
                        <td style="border:1px solid #000;">
                            <a href="#" style="background:#0388c6; color:#fff; padding:8px 16px; border-radius:5px; text-decoration:none;">Apply Now</a>
                        </td>
                    </tr>

                    <tr style="background:#589C97;">
                        <td style="padding:14px; border:1px solid #000;">A1</td>
                        <td style="padding:14px; border:1px solid #000;">Mon–Fri</td>
                        <td style="padding:14px; border:1px solid #000;">9 April</td>
                        <td style="padding:14px; border:1px solid #000;">09:00 PM</td>
                        <td style="border:1px solid #000;">
                            <a href="#" style="background:#0388c6; color:#fff; padding:8px 16px; border-radius:5px; text-decoration:none;">Apply Now</a>
                        </td>
                    </tr>

                    <tr style="background:#ffffff;">
                        <td style="padding:14px; border:1px solid #000;">A1</td>
                        <td style="padding:14px; border:1px solid #000;">Mon–Fri</td>
                        <td style="padding:14px; border:1px solid #000;">16 April</td>
                        <td style="padding:14px; border:1px solid #000;">09:00 PM</td>
                        <td style="border:1px solid #000;">
                            <a href="#" style="background:#0388c6; color:#fff; padding:8px 16px; border-radius:5px; text-decoration:none;">Apply Now</a>
                        </td>
                    </tr>

                    <tr style="background:#589C97;">
                        <td style="padding:14px; border:1px solid #000;">A1</td>
                        <td style="padding:14px; border:1px solid #000;">Mon–Fri</td>
                        <td style="padding:14px; border:1px solid #000;">23 April</td>
                        <td style="padding:14px; border:1px solid #000;">08:00 PM</td>
                        <td style="border:1px solid #000;">
                            <a href="#" style="background:#0388c6; color:#fff; padding:8px 16px; border-radius:5px; text-decoration:none;">Apply Now</a>
                        </td>
                    </tr>

                    <tr style="background:#ffffff;">
                        <td style="padding:14px; border:1px solid #000;">A1</td>
                        <td style="padding:14px; border:1px solid #000;">Mon–Fri</td>
                        <td style="padding:14px; border:1px solid #000;">29 April</td>
                        <td style="padding:14px; border:1px solid #000;">09:30 PM</td>
                        <td style="border:1px solid #000;">
                            <a href="#" style="background:#0388c6; color:#fff; padding:8px 16px; border-radius:5px; text-decoration:none;">Apply Now</a>
                        </td>
                    </tr>

                    <tr style="background:#589C97;">
                        <td style="padding:14px; border:1px solid #000;">A2</td>
                        <td style="padding:14px; border:1px solid #000;">Mon–Fri</td>
                        <td style="padding:14px; border:1px solid #000;">10 April</td>
                        <td style="padding:14px; border:1px solid #000;">07:30 PM</td>
                        <td style="border:1px solid #000;">
                            <a href="#" style="background:#0388c6; color:#fff; padding:8px 16px; border-radius:5px; text-decoration:none;">Apply Now</a>
                        </td>
                    </tr>

                    <tr style="background:#ffffff;">
                        <td style="padding:14px; border:1px solid #000;">B1</td>
                        <td style="padding:14px; border:1px solid #000;">Mon–Fri</td>
                        <td style="padding:14px; border:1px solid #000;">6 April</td>
                        <td style="padding:14px; border:1px solid #000;">08:00 PM</td>
                        <td style="border:1px solid #000;">
                            <a href="#" style="background:#0388c6; color:#fff; padding:8px 16px; border-radius:5px; text-decoration:none;">Apply Now</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

</section>
<section style="padding:70px 0; background:#f3f3f3; font-family:Arial, sans-serif;">

    <div style="max-width:1200px; margin:auto; text-align:center;">

        <!-- Heading -->
        <h2 style="font-weight:700; margin-bottom:10px;">
            German Language Learning Path (A1 to B2)
        </h2>

        <p style="color:#555; max-width:800px; margin:0 auto 40px;">
            These are the levels of German language that we are providing. If you are interested,
            you can join our online German language classes in India which offers flexible timings and affordable fees.
        </p>

        <!-- Cards -->
        <div style="display:flex; flex-wrap:wrap; gap:25px; justify-content:center;">

            <!-- Card 1 -->
            <div style="width:260px; background:#fff; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1); overflow:hidden;">

                <div style="background:#589C97; padding:20px;">
                    <span style="font-size:30px;">📖</span>
                </div>

                <div style="padding:20px;">
                    <h3 style="color:#589C97; margin-bottom:10px;">A1</h3>
                    <p style="font-size:14px; color:#555;">
                        Candidates who have no previous knowledge of German language.
                        Candidates who are interested in writing the Goethe Zertifikat A1.
                    </p>

                    <a href="#" style="display:inline-block; margin-top:15px; background:#589C97; padding:10px 18px; border-radius:20px; text-decoration:none; color:#000; font-weight:600;">
                        Join A1 Batch
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div style="width:260px; background:#fff; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1); overflow:hidden;">

                <div style="background:#589C97; padding:20px;">
                    <span style="font-size:30px;">📖</span>
                </div>

                <div style="padding:20px;">
                    <h3 style="color:#589C97;">A2</h3>
                    <p style="font-size:14px; color:#555;">
                        Candidates who have cleared A1 within the last 6 months.
                        And who are interested in writing the A2 Goethe Zertifikat exam.
                    </p>

                    <a href="#" style="display:inline-block; margin-top:15px; background:#589C97; padding:10px 18px; border-radius:20px; text-decoration:none; color:#000; font-weight:600;">
                        Join A2 Batch
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div style="width:260px; background:#fff; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1); overflow:hidden;">

                <div style="background:#589C97; padding:20px;">
                    <span style="font-size:30px;">📖</span>
                </div>

                <div style="padding:20px;">
                    <h3 style="color:#589C97;">B1</h3>
                    <p style="font-size:14px; color:#555;">
                        Candidates who have cleared A2 within the last 6 months.
                        And who are interested in writing the B1 Goethe Zertifikat exam.
                    </p>

                    <a href="#" style="display:inline-block; margin-top:15px; background:#589C97; padding:10px 18px; border-radius:20px; text-decoration:none; color:#000; font-weight:600;">
                        Join B1 Batch
                    </a>
                </div>
            </div>

            <!-- Card 4 -->
            <div style="width:260px; background:#fff; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.1); overflow:hidden;">

                <div style="background:#589C97; padding:20px;">
                    <span style="font-size:30px;">📖</span>
                </div>

                <div style="padding:20px;">
                    <h3 style="color:#589C97;">B2</h3>
                    <p style="font-size:14px; color:#555;">
                        Candidates who have passed B1 within the last 6 months.
                        And who are interested in writing the B2 Goethe Zertifikat exam.
                    </p>

                    <a href="#" style="display:inline-block; margin-top:15px; background:#589C97; padding:10px 18px; border-radius:20px; text-decoration:none; color:#000; font-weight:600;">
                        Join B2 Batch
                    </a>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div style="margin-top:40px;">
            <a href="#" style="background:#589C97; padding:14px 30px; border-radius:8px; text-decoration:none; font-weight:600; color:#000;">
                Get Personalized Counselling
            </a>
        </div>

    </div>

</section>

<section style="font-family:Arial, sans-serif;">

<!-- ================= WHO IS THIS FOR ================= -->
<div style="background:#589C97; padding:50px 20px; text-align:center;">

    <h3 style="margin-bottom:25px;">
        📌 Who is this German course for? For YOU
    </h3>

    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:15px;">

        <div class="mini-card">🎓 <b>Students</b><br><small>Study in Germany pathway</small></div>
        <div class="mini-card">💼 <b>Professionals</b><br><small>Boost your career</small></div>
        <div class="mini-card">🏥 <b>Healthcare Workers</b><br><small>Migration support</small></div>
        <div class="mini-card">👨‍👩‍👧 <b>Parents</b><br><small>Better future for kids</small></div>

    </div>
</div>


<!-- ================= WE OFFER ================= -->
<div style="background:#efefef; padding:50px 20px; text-align:center;">

    <h3 style="margin-bottom:25px;">🎯 We Offer</h3>

    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:15px;color:#000;">

        <div class="offer-card">💻 Online Classes<br><small>Live interactive</small></div>
        <div class="offer-card">🏫 Offline Classes<br><small>Chandigarh & Bangalore</small></div>
        <div class="offer-card">📚 Exam Prep<br><small>High success rate</small></div>
        <div class="offer-card">🎁 Free Demo<br><small>Try before joining</small></div>

    </div>
</div>


<!-- ================= CTA STRIP ================= -->
<div style="background:#589C97; text-align:center; padding:30px 15px;">

    <h4 style="margin-bottom:10px;">
        Stop thinking. Start speaking. Your first class is free
    </h4>

    <a href="#" style="background:#0388c6; color:#fff; padding:10px 20px; border-radius:5px; text-decoration:none;">
        Book FREE demo class — experience our teaching today!
    </a>

</div>


<!-- ================= TESTIMONIAL ================= -->
<div style="padding:60px 20px; background:#fff; text-align:center;">

    <h3 style="margin-bottom:30px;">Student Testimonial</h3>

    <div style="display:flex; flex-wrap:wrap; gap:30px; justify-content:center;">

        <div class="testimonial">
            <h4>Anurag Singh</h4>
            <small>B2 Level</small>
            <p>Great instructors helped me master German step-by-step. Highly recommended.</p>
        </div>

        <div class="testimonial">
            <h4>Parth</h4>
            <small>B1 Level</small>
            <p>The structured approach made learning easy and practical. Loved the experience.</p>
        </div>

        <div class="testimonial">
            <h4>Aditi Patil</h4>
            <small>B2 Level</small>
            <p>From beginner to confident speaker — amazing journey with YES Germany.</p>
        </div>

    </div>
</div>


<!-- ================= FAQ ================= -->
<div style="background:#f9f9f9; padding:50px 20px;">

    <h3 style="text-align:center; margin-bottom:20px;">FAQ's</h3>

    <div style="max-width:900px; margin:auto;">

        <div class="faq">
            <button>How long does it take to learn German?</button>
            <div class="faq-content">A1 to B2 takes approx 8–10 months.</div>
        </div>

        <div class="faq">
            <button>Are classes online or offline?</button>
            <div class="faq-content">We offer both online and offline classes.</div>
        </div>

        <div class="faq">
            <button>Do you prepare for Goethe exam?</button>
            <div class="faq-content">Yes, we provide full exam preparation.</div>
        </div>

        <div class="faq">
            <button>Is German difficult?</button>
            <div class="faq-content">With proper guidance, it's easy to learn.</div>
        </div>

    </div>

</div>


</section>





<!-- ================= JS ================= -->
<script>
document.querySelectorAll(".faq button").forEach(btn=>{
    btn.addEventListener("click", ()=>{
        btn.classList.toggle("active");
    });
});
</script>
<!-- END SECTION CONTACT -->
<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->