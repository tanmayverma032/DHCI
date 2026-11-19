<!DOCTYPE html>
<html lang="en">
<head>
    
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
    
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank You</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#0a3d91,#00a6ff);
    padding:20px;
}

.thankyou-wrapper{
    width:100%;
    max-width:650px;
}

.thankyou-card{
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,0.15);
}

.top-section{
    background:linear-gradient(135deg,#0a3d91,#008cff);
    padding:40px 20px;
    text-align:center;
    color:#fff;
}

.success-icon{
    width:100px;
    height:100px;
    margin:auto;
    background:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:50px;
    color:#28a745;
    box-shadow:0 0 20px rgba(255,255,255,0.3);
}

.top-section h1{
    margin-top:20px;
    font-size:40px;
    font-weight:700;
}

.content{
    padding:40px;
    text-align:center;
}

.content h3{
    color:#0a3d91;
    margin-bottom:20px;
    font-size:28px;
}

.content p{
    color:#555;
    line-height:1.8;
    font-size:17px;
}

.student-name{
    color:#007bff;
    font-weight:700;
}

.info-box{
    margin-top:25px;
    background:#f8fbff;
    border-left:5px solid #007bff;
    padding:15px;
    border-radius:8px;
    color:#444;
}

.button-group{
    margin-top:30px;
    display:flex;
    gap:15px;
    justify-content:center;
    flex-wrap:wrap;
}

.btn{
    padding:14px 28px;
    border-radius:50px;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
}

.btn-home{
    background:#007bff;
    color:#fff;
}

.btn-home:hover{
    background:#0056b3;
}

.btn-call{
    background:#28a745;
    color:#fff;
}

.btn-call:hover{
    background:#1f8a37;
}

.footer{
    text-align:center;
    padding:20px;
    background:#f8f8f8;
    color:#666;
    font-size:14px;
}

@media(max-width:768px){

    .content{
        padding:25px;
    }

    .top-section h1{
        font-size:30px;
    }

    .content h3{
        font-size:24px;
    }

    .button-group{
        flex-direction:column;
    }

    .btn{
        width:100%;
    }
}

</style>
</head>
<body>

<?php
$name = session()->getFlashdata('success_name') ?? 'Student';
?>

<div class="thankyou-wrapper">

    <div class="thankyou-card">

        <div class="top-section">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>

            <h1>Thank You!</h1>
        </div>

        <div class="content">

            <h3>Enquiry Submitted Successfully</h3>

            <p>
                Dear
                <span class="student-name"><?= esc($name) ?></span>,
                <br><br>

                Thank you for showing interest in our healthcare training programs.
                Your enquiry has been received successfully and our admission team
                will contact you shortly with complete details.
            </p>

            <div class="info-box">
                <strong>What's Next?</strong><br>
                Our counsellor will contact you regarding course details,
                fees, batches and admission process.
            </div>

            <div class="button-group">

                <a href="<?= base_url('/') ?>" class="btn btn-home">
                    <i class="fas fa-home"></i> Back To Home
                </a>

                <a href="tel:+919873501404" class="btn btn-call">
                    <i class="fas fa-phone"></i> Call Us
                </a>

            </div>

        </div>

        <div class="footer">
            Delhi Healthcare Institute © <?= date('Y') ?>
        </div>

    </div>

</div>

</body>
</html>