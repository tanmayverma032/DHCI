<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>Student's ID Card</title>
    <link type="text/css" rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style type="text/css">
        #icard {
            width: 582px;
            height: 775px; /* आपकी image की height (front+back दोनों) */
            margin: 20px auto;
            background-image: url('<?= site_url("public/certificate/card.png") ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Student Photo */
        .student-photo {
           position: absolute;
            top: 133px;
            right: 40px;
            width: 117px;
            height: 134px;
            border-radius: 5px;
            object-fit: cover;
            border: 2px solid #fff;
        }

        /* Student Info values only */
        .student-info {
            position: absolute;
            top: 162px;
            text-align: left;
            left: 180px;
            font-size: 13px;
            font-weight: 600;
            line-height: 22px;
            color: #000;
        }
        
        .name-info{
            position: absolute;
            top: 110px;
            text-align: left;
            left: 35px;
            font-size: 30px;
            font-weight: 600;
            line-height: 22px;
            color: #000;  
        }

        .student-info div {
            margin-bottom: 5px;
        }

        /* Reg No */
        .reg-no {
            position: absolute;
            top: 275px;
            right: 50px;
            font-size: 14px;
            font-weight: bold;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <div id="icard">
            <!-- Student Photo -->
            
            <img src="<?= site_url('public/' . $student['photo']) ?>" class="student-photo" />

            <!-- Student Info (Values Only) -->
            
            <div class="name-info">
                <div><?= $student['name'] ?></div>
            </div> 
            <div class="student-info">
                <div><?= strtoupper($course['name'] ?? 'N/A') ?></div>
                <div><?= $student['number'] ?></div>
                <div><?= $student['dob'] ?></div>
                <div><?= wordwrap($student['address'], 40, "<br>") ?></div>
            </div>

            <!-- Reg No -->
            <div class="reg-no">
                <?= $student['rag_no'] ?? "Plz Contact Main Branch BCSA" ?>
            </div>
        </div>

        <button class="btn btn-primary mt-3" onclick="downloadIDCard('png')">Download Now</button>
    </div>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        function downloadIDCard(format) {
            var idCardElement = document.getElementById('icard');
            html2canvas(idCardElement).then(function (canvas) {
                var dataURL = canvas.toDataURL('image/' + format);
                var link = document.createElement('a');
                link.href = dataURL;
                link.download = 'Id_Card.' + format;
                link.click();
            });
        }
    </script>
</body>
</html>
