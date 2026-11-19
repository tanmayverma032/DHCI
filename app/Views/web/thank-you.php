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
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            margin:0;
        }

        .thank-you-box{
            background:#fff;
            padding:40px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,0.1);
            text-align:center;
            width:400px;
        }

        .thank-you-box h1{
            color:#28a745;
            margin-bottom:15px;
        }

        .thank-you-box p{
            color:#555;
            font-size:16px;
            line-height:1.6;
        }

        .btn{
            display:inline-block;
            margin-top:20px;
            padding:10px 20px;
            background:#007bff;
            color:#fff;
            text-decoration:none;
            border-radius:5px;
        }

        .btn:hover{
            background:#0056b3;
        }
    </style>
</head>
<body>

<?php $name = session()->getFlashdata('success_name') ?? 'Customer'; ?>

<div class="thank-you-box">

    <h1>Thank You!</h1>

    <p>
        Dear <strong><?= esc($name) ?></strong>,<br>
        Thank you for submitting your enquiry.<br>
        We will contact you shortly.
    </p>

    <a href="<?= base_url('/') ?>" class="btn">
        Back to Home
    </a>

</div>

</body>
</html>