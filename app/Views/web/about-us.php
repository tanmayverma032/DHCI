<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->


<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<section class="dhci-about-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT CONTENT -->
            <div class="col-md-6 dhci-content">
                <span class="dhci-badge">Healthcare Education Leader</span>

                <h2 class="dhci-title">
                    About <span>DHCI INDIA</span>
                </h2>

                <p class="dhci-desc">
                    <strong>DHCI (Delhi Healthcare Institute)</strong> is a premier vocational and professional 
                    training institution committed to shaping the future of healthcare education in India.
                </p>

                <p class="dhci-desc">
                    Founded in <strong>2014</strong>, DHCI has grown into a trusted name in paramedical, 
                    healthcare, and skill-based education.
                </p>

                <ul class="dhci-points">
                    <li>✔ Practical & hands-on training</li>
                    <li>✔ Real-time clinical exposure</li>
                    <li>✔ Industry-ready skill development</li>
                    <li>✔ Focus on global healthcare standards</li>
                </ul>
            </div>

            <!-- RIGHT SLIDER -->
            <div class="col-md-6">
                <div id="imageSlider" class="carousel slide carousel-fade dhci-slider"
                     data-bs-ride="carousel"
                     data-bs-interval="3000">

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img src="public/assets/images/about/1.png" class="d-block w-100 slider-img">
                        </div>

                        <div class="carousel-item">
                            <img src="public/assets/images/about/2.png" class="d-block w-100 slider-img">
                        </div>

                        <div class="carousel-item">
                            <img src="public/assets/images/about/3.png" class="d-block w-100 slider-img">
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- STYLE -->
<style>
body {
    font-family: 'Poppins', sans-serif;
}

/* SECTION */
.dhci-about-section {
    padding: 80px 0;
    background: linear-gradient(135deg,#ffffff,#f5f9ff);
}

/* BADGE */
.dhci-badge {
    display: inline-block;
    background: linear-gradient(90deg,#ff7a00,#ff9d42);
    color: #fff;
    padding: 8px 20px;
    border-radius: 50px;
    font-size: 14px;
    margin-bottom: 15px;
}

/* TITLE */
.dhci-title {
    font-size: 40px;
    font-weight: 800;
    margin-bottom: 20px;
}

.dhci-title span {
    background: linear-gradient(90deg,#3b82f6,#06b6d4);
    -webkit-background-clip: text;
    color: transparent;
}

/* TEXT */
.dhci-desc {
    color: #555;
    font-size: 16px;
    margin-bottom: 15px;
    line-height: 1.6;
}

/* POINTS */
.dhci-points {
    list-style: none;
    padding: 0;
    margin-top: 15px;
}

.dhci-points li {
    margin-bottom: 8px;
    font-weight: 500;
}

/* SLIDER */
.slider-img {
    height: 400px;
    object-fit: cover;
    border-radius: 20px;
}

/* CARD STYLE EFFECT */
.dhci-slider {
    box-shadow: 0 20px 50px rgba(0,0,0,0.1);
    border-radius: 20px;
    overflow: hidden;
}

/* HOVER EFFECT */
.dhci-slider:hover {
    transform: scale(1.03);
    transition: 0.4s;
}

/* RESPONSIVE */
@media(max-width:768px){
    .dhci-title{
        font-size:28px;
    }
}
</style>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<<!-- START SECTION MISSION & VISION -->

<section class="core_section py-5">
    <div class="container">

        <!-- OUR MISSION -->
        <div class="mb-5">
            <h2 class="core-title">Our Mission</h2>
            <div class="line"></div>
            <p class="core-desc">
                Our mission is to deliver excellence in skill-based education and empower students with real-world expertise.
            </p>
        </div>

        <div class="row">

            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="core-box">
                    <div class="number">01</div>
                    <h5>Industry Training</h5>
                    <p>Providing industry-aligned healthcare and vocational training programs.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3">
                <div class="core-box">
                    <div class="number">02</div>
                    <h5>Practical Learning</h5>
                    <p>Enhancing employability through real-world exposure and practical knowledge.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3">
                <div class="core-box">
                    <div class="number">03</div>
                    <h5>Skill Development</h5>
                    <p>Developing competent, ethical, and skilled professionals.</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-3">
                <div class="core-box">
                    <div class="number">04</div>
                    <h5>Career Growth</h5>
                    <p>Creating sustainable career opportunities across healthcare sectors.</p>
                </div>
            </div>

        </div>


        <!-- OUR VISION -->
        <div class="mt-5 mb-5">
            <h2 class="core-title">Our Vision</h2>
            <div class="line"></div>
            <p class="core-desc">
                To become a leading and trusted institution transforming lives through skill development and innovation.
            </p>
        </div>

        <div class="row">

            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="core-box">
                    <div class="number">01</div>
                    <h5>Quality Education</h5>
                    <p>Setting benchmarks in education and training standards.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3">
                <div class="core-box">
                    <div class="number">02</div>
                    <h5>Healthcare Workforce</h5>
                    <p>Building a highly skilled workforce for the healthcare industry.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3">
                <div class="core-box">
                    <div class="number">03</div>
                    <h5>Nationwide Reach</h5>
                    <p>Expanding access to career-oriented education across India.</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-3">
                <div class="core-box">
                    <div class="number">04</div>
                    <h5>Innovation Hub</h5>
                    <p>Becoming a hub for innovation and lifelong learning.</p>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- END SECTION -->

<style>
 
.core_section {
    background: #f5f6f8;
}

.core-title {
    font-size: 34px;
    font-weight: 700;
    color: #1d2b3a;
}

.line {
    width: 60px;
    height: 4px;
    background: linear-gradient(to right, #3b82f6, #f97316);
    margin: 10px 0 15px;
    border-radius: 5px;
}

.core-desc {
    color: #6c757d;
    max-width: 600px;
}

.core-box {
    background: #e9edf3;
    padding: 40px 25px;
    border-radius: 20px;
    text-align: center;
    margin-bottom: 25px;
    transition: 0.3s;
}

.core-box:hover {
    transform: translateY(-5px);
}

.number {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #4facfe, #00c6ff);
    color: #fff;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    margin: 0 auto 20px;
}

.core-box h5 {
    font-weight: 700;
    margin-bottom: 10px;
}

.core-box p {
    font-size: 14px;
    color: #555;
}

</style>


<?php include("inc/footer.php"); ?>