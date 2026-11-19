<?php include("inc/header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GDA & EMT Programs</title>

<style>

/* ========================================
   GOOGLE FONT
======================================== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

/* ========================================
   ROOT VARIABLES
======================================== */
:root{
    --primary:#0A66FF;
    --secondary:#1DB9FF;
    --dark:#0f172a;
    --text:#64748b;
    --light:#f8fafc;
    --white:#ffffff;
}

/* ==========================
   GDA EMT SECTION
========================== */

.gda-emt-section{
    background:#f8fafc;
    padding:80px 0;
}

.gda-container{
    max-width:1200px;
    margin:auto;
    padding:80px 20px;

    display:grid;
    grid-template-columns:58% 42%;
    gap:50px;
    align-items:start;
}

@media(max-width:991px){
    .gda-container{
        grid-template-columns:1fr;
    }

    .right-section{
        order:-1;
    }
}
.left-section{
    width:100%;
}

.right-section{
    position:sticky;
    top:120px;
}

.badge{
    display:inline-block;
    background:linear-gradient(135deg,#ff9f43,#ff7b00);
    color:#fff;
    padding:10px 22px;
    border-radius:50px;
    font-size:14px;
    font-weight:600;
    margin-bottom:20px;
}

.heading{
    font-size:52px;
    font-weight:800;
    color:#0f172a;
    line-height:1.2;
    margin-bottom:15px;
}

.heading span{
    color:#0A66FF;
}

.subheading{
    font-size:18px;
    line-height:1.9;
    color:#64748b;
    margin-bottom:35px;
}

.program-box{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:24px;
    padding:35px;
    margin-bottom:25px;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
    transition:.3s;
}

.program-box:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 50px rgba(13,110,253,.12);
}

.program-top{
    display:flex;
    align-items:flex-start;
    gap:20px;
}

.icon{
    width:80px;
    min-width:80px;
    height:80px;
    border-radius:18px;
    background:linear-gradient(135deg,#0A66FF,#1DB9FF);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:34px;
    color:#fff;
}

.program-title{
    font-size:40px;
    font-weight:800;
    color:#0A66FF;
    line-height:1;
}

.program-subtitle{
    font-size:16px;
    font-weight:600;
    color:#334155;
    margin-top:8px;
}

.program-desc{
    margin-top:12px;
    color:#64748b;
    line-height:1.8;
}

.info-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:30px;
    margin-top:25px;
    padding-top:25px;
    border-top:1px solid #e5e7eb;
}

.info-grid h3{
    color:#0A66FF;
    font-size:18px;
    margin-bottom:15px;
}

.info-grid ul{
    list-style:none;
    padding:0;
}

.info-grid li{
    position:relative;
    padding-left:25px;
    margin-bottom:12px;
    color:#475569;
}

.info-grid li::before{
    content:"✓";
    position:absolute;
    left:0;
    color:#22c55e;
    font-weight:700;
}

.apply-btn{
    position:relative;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:18px;

    width:100%;
    max-width:520px;

    margin:35px auto;

    padding:22px 30px;

    background:linear-gradient(
        135deg,
        #005cff,
        #0A66FF
    );

    color:#fff;
    text-decoration:none;

    border-radius:18px;

    font-size:34px;
    font-weight:800;

    box-shadow:
        0 12px 30px rgba(0,92,255,.35);

    transition:.35s;
}

.apply-btn:hover{
    transform:translateY(-5px);
    box-shadow:
        0 20px 45px rgba(0,92,255,.45);
}

.btn-icon,
.btn-arrow{
    font-size:34px;
}

.apply-btn::before{
    content:'';
    position:absolute;
    inset:-3px;
    border-radius:20px;
    border:3px solid #ffd400;
    pointer-events:none;
}

@media(max-width:768px){

    .apply-btn{
        font-size:22px;
        padding:18px;
    }

    .btn-icon,
    .btn-arrow{
        font-size:24px;
    }
}

.footer-note{
    background:#fff;
    border:1px solid #e5e7eb;
    border-left:5px solid #0A66FF;
    padding:22px;
    border-radius:16px;
    margin-top:20px;
    color:#334155;
}

.image-wrapper{
    position:relative;
    overflow:hidden;
    border-radius:30px;
    box-shadow:0 20px 60px rgba(0,0,0,.15);
    background:#fff;
}

.image-wrapper img{
    width:100%;
    height:550px;
    object-fit:cover;
    display:block;
    border-radius:30px;
}
/* ==========================
   RESPONSIVE
========================== */

@media(max-width:1199px){

    .gda-container{
        gap:40px;
    }

    .heading{
        font-size:44px;
    }

    .image-wrapper img{
        height:700px;
    }
}

@media(max-width:991px){

    .gda-container{
        grid-template-columns:1fr;
    }

    .right-section{
        position:relative;
        top:auto;
        order:-1;
    }

    .image-wrapper img{
        height:auto;
    }

    .heading{
        font-size:38px;
    }

    .info-grid{
        grid-template-columns:1fr;
    }
}

@media(max-width:576px){

    .program-top{
        flex-direction:column;
    }

    .heading{
        font-size:32px;
    }

    .program-box{
        padding:25px;
    }

    .program-title{
        font-size:32px;
    }


}

</style>
</head>
<body>

<section class="gda-emt-section">

    <div class="gda-container">

        <!-- LEFT SIDE -->

        <div class="left-section">

            <div class="badge">
                Healthcare Education Leader
            </div>

            <h1 class="heading">
                About <span>GDA & EMT</span> Programs
            </h1>

            <div class="subheading">
                Building Skilled Healthcare Professionals for Tomorrow's Medical Industry.
            </div>

            <!-- GDA CARD -->

            <div class="program-box">

                <div class="program-top">

                    <div class="icon">🏥</div>

                    <div>
                        <div class="program-title">GDA</div>

                        <div class="program-subtitle">
                            (General Duty Assistant)
                        </div>

                        <div class="program-desc">
                            General Duty Assistant (GDA) healthcare sector ka ek important role hai jo doctors aur nurses ko patient care mein support karta hai.
                        </div>
                    </div>

                </div>

                <div class="info-grid">

                    <div>
                        <h3>What You'll Learn:</h3>

                        <ul>
                            <li>Basic Nursing Care</li>
                            <li>Patient Handling & Monitoring</li>
                            <li>First Aid & Emergency Support</li>
                            <li>Infection Control Practices</li>
                            <li>Communication & Soft Skills</li>
                        </ul>
                    </div>

                    <div>
                        <h3>Career Opportunities:</h3>

                        <ul>
                            <li>Hospitals</li>
                            <li>Nursing Homes</li>
                            <li>Healthcare Centers</li>
                            <li>Home Healthcare Services</li>
                        </ul>
                    </div>

                </div>

            </div>
            
           <a href="student_ragistration" class="apply-btn">
                APPLY NOW FOR GDA →
            </a>
                
            <!-- EMT CARD -->

            <div class="program-box">

                <div class="program-top">

                    <div class="icon">🚑</div>

                    <div>
                        <div class="program-title">EMT</div>

                        <div class="program-subtitle">
                            (Emergency Medical Technician)
                        </div>

                        <div class="program-desc">
                            Emergency Medical Technician (EMT) emergency situations mein patients ko immediate medical assistance provide karta hai aur life-saving support deta hai.
                        </div>
                    </div>

                </div>

                <div class="info-grid">

                    <div>
                        <h3>What You'll Learn:</h3>

                        <ul>
                            <li>Emergency Patient Assessment</li>
                            <li>Trauma & Accident Management</li>
                            <li>CPR & Basic Life Support</li>
                            <li>Ambulance Operations</li>
                            <li>Emergency Response Techniques</li>
                        </ul>
                    </div>

                    <div>
                        <h3>Career Opportunities:</h3>

                        <ul>
                            <li>Ambulance Services</li>
                            <li>Emergency Departments</li>
                            <li>Trauma Centers</li>
                            <li>Disaster Response Teams</li>
                        </ul>
                    </div>

                </div>

            </div>

            <a href="student_ragistration" class="apply-btn">
                APPLY NOW FOR EMT →
            </a>

            <div class="footer-note">
                From Patient Care to Emergency Response – Master Healthcare Skills with <b>DHCI</b>.
            </div>

        </div>

        <!-- RIGHT SIDE -->

        <div class="right-section">

            <div class="image-wrapper">
                <img src="public/assets/images/gda-emt.jpeg" alt="GDA EMT">
            </div>

        </div>

    </div>

</section>

</body>

<?php include("inc/footer.php"); ?>

