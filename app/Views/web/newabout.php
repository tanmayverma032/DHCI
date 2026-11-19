<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<style>
    
    body{
        font-family: 'Poppins', sans-serif;
        background: #f5f7fb;
        color: #1e293b;
    }

    section{
        position: relative;
    }

    /* =========================
       COMMON HEADING
    ========================== */

    .section_heading{
        text-align: center;
        margin-bottom: 50px;
    }

    .section_heading h2{
        font-size: 38px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section_heading h2:after{
        content: "";
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg,#0ea5e9,#2563eb);
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 50px;
    }

    .section_heading p{
        color: #64748b;
        font-size: 16px;
        max-width: 850px;
        margin: auto;
        line-height: 28px;
    }

    /* =========================
       ABOUT SECTION
    ========================== */

    .about_section{
        padding: 80px 0;
        background: linear-gradient(135deg,#eff6ff,#ffffff);
    }

    .about_box{
        background: #fff;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 10px 35px rgba(0,0,0,0.08);
        transition: 0.4s;
        border: 1px solid #e2e8f0;
    }

    .about_box:hover{
        transform: translateY(-5px);
    }

    .about_box p{
        font-size: 16px;
        line-height: 32px;
        color: #475569;
        margin-bottom: 22px;
    }

    .about_box b{
        color: #0f172a;
    }

    /* =========================
       COURSE SECTION
    ========================== */

    .course_section{
        padding: 90px 0;
        background: #ffffff;
    }

    .custom_tabs{
        justify-content: center;
        border-bottom: none;
        margin-bottom: 40px;
        gap: 20px;
    }

    .custom_tabs .nav-link{
        border: none;
        padding: 15px 28px;
        border-radius: 12px;
        background: #e2e8f0;
        color: #0f172a;
        font-weight: 600;
        transition: 0.3s;
        font-size: 15px;
    }

    .custom_tabs .nav-link.active{
        background: linear-gradient(90deg,#0ea5e9,#2563eb);
        color: #fff;
        box-shadow: 0 8px 25px rgba(37,99,235,0.25);
    }

    .course_card{
        background: #fff;
        border-radius: 16px;
        margin-bottom: 22px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: 0.4s;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .course_card:hover{
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }

    .course_card a{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 22px 25px;
        text-decoration: none;
        color: #0f172a;
        font-size: 18px;
        font-weight: 600;
        transition: 0.3s;
    }

    .course_card a:hover{
        color: #2563eb;
    }

    .view_btn{
        background: linear-gradient(90deg,#0ea5e9,#2563eb);
        color: #fff;
        padding: 10px 18px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 500;
        transition: 0.3s;
        white-space: nowrap;
    }

    .course_card a:hover .view_btn{
        transform: scale(1.05);
    }

    /* =========================
       RESPONSIVE
    ========================== */

    @media(max-width:768px){

        .section_heading h2{
            font-size: 28px;
        }

        .about_box{
            padding: 30px;
        }

        .course_card a{
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
            font-size: 16px;
        }

        .custom_tabs .nav-link{
            font-size: 13px;
            padding: 12px 16px;
        }
    }

</style>

<!-- START ABOUT SECTION -->
<section class="about_section">
    <div class="container">

        <div class="section_heading">
            <h2>About DHCI INDIA</h2>
            <p>
                Empowering future healthcare professionals with industry-focused education,
                practical training, and career-oriented learning experiences.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">

                <div class="about_box">

                    <p>
                        <b>DHCI (Delhi Healthcare Institute)</b> is a premier vocational and professional training institution committed to shaping the future of healthcare education in India. Established with a vision to bridge the gap between academic learning and industry requirements, DHCI has consistently empowered aspiring professionals with practical skills, domain expertise, and career-oriented training.
                    </p>

                    <p>
                        Founded in <b>2014</b>, DHCI has grown into a trusted name in the field of paramedical, healthcare, and skill-based education. The institute offers a diverse portfolio of certificate, diploma, and vocational degree programs designed to meet the dynamic needs of the healthcare sector.
                    </p>

                    <p>
                        At DHCI, education goes beyond classrooms. We focus on delivering industry-relevant knowledge through a structured blend of theoretical learning, hands-on practical exposure, and real-time clinical training.
                    </p>

                    <p>
                        With a strong network of academic collaborations and placement partners, DHCI emphasizes employability and career progression. Our students are trained not only in technical skills but also in communication, professionalism, and workplace readiness.
                    </p>

                    <p>
                        Over the years, DHCI has built a reputation for quality education, ethical practices, and student-centric growth. Our commitment lies in nurturing talent, creating opportunities, and contributing to the development of a skilled healthcare workforce.
                    </p>

                </div>

            </div>
        </div>

    </div>
</section>
<!-- END ABOUT SECTION -->


<!-- START COURSE SECTION -->
<section class="course_section">

    <div class="container">

        <div class="section_heading">
            <h2>Paramedical Science Programmes</h2>
            <p>
                Explore our industry-oriented diploma and B.Voc programs designed
                to build successful careers in the healthcare and paramedical sector.
            </p>
        </div>

        <ul class="nav nav-tabs custom_tabs" role="tablist">

            <li class="nav-item">
                <a class="nav-link active"
                   id="overview-tab1"
                   data-toggle="tab"
                   href="#overview"
                   role="tab">
                    Diploma Programs
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link"
                   id="curriculum-tab1"
                   data-toggle="tab"
                   href="#curriculum"
                   role="tab">
                    B.Voc Programs
                </a>
            </li>

        </ul>

        <div class="tab-content">

            <!-- DIPLOMA -->
            <div class="tab-pane fade show active"
                 id="overview"
                 role="tabpanel">

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/Diploma-in-Medical-Laboratory-Technician---Dmlt">
                        Diploma in Medical Laboratory Technology (DMLT)
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/Operation-Theatre-Technician">
                        Diploma in Operation Theater Technology (DOTT)
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/X-Ray-Technician">
                        Diploma in X-ray Technology (DXT)
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/General-Duty-Assistant">
                        Diploma in General Duty Assistant (DGDA)
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/Emergency-Medical-Technician-Paramedic">
                        Diploma in Medical Emergency Technology (DEMT)
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/Radiology-Technician">
                        Diploma in Radiology Imaging Technology (DRIT)
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

            </div>

            <!-- BVOC -->
            <div class="tab-pane fade"
                 id="curriculum"
                 role="tabpanel">

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/B-VOC-In-Medical-Lab-Technology">
                        B.Voc in Medical Lab Technology
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/B.VOC-in-Optometry-Technology">
                        B.VOC in Optometry Technology
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/B.-VOC-in-RIT">
                        B.VOC in RIT
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/B.VOC-in-Patient-care-Management">
                        B.Voc in Patient Care Management
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/B.VOC-in-Operation-Theatre-Technology">
                        B.Voc in Operation Theatre Technology
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

                <div class="course_card">
                    <a href="https://dhciindia.com/course_details/B-VOC-In-Dialysis-Technology">
                        B.Voc in Dialysis Technology
                        <span class="view_btn">View Course</span>
                    </a>
                </div>

            </div>

        </div>

    </div>

</section>
<!-- END COURSE SECTION -->

<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->