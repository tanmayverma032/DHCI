<?php
session_start();

$message = "";

if(isset($_POST['send_otp']))
{
    $otp = rand(100000,999999);
    $_SESSION['otp'] = $otp;

    $message = "Demo OTP: ".$otp;
}

if(isset($_POST['submit_form']))
{
    $userOtp = $_POST['otp'];

    if(!isset($_SESSION['otp']) || $userOtp != $_SESSION['otp'])
    {
        $message = "Invalid OTP!";
    }
    else
    {
        $uploadDir = "uploads/";

        if(!file_exists($uploadDir))
        {
            mkdir($uploadDir,0777,true);
        }

        move_uploaded_file(
            $_FILES['marksheet10']['tmp_name'],
            $uploadDir.time().'_10_'.$_FILES['marksheet10']['name']
        );

        move_uploaded_file(
            $_FILES['marksheet12']['tmp_name'],
            $uploadDir.time().'_12_'.$_FILES['marksheet12']['name']
        );

        move_uploaded_file(
            $_FILES['aadhaar']['tmp_name'],
            $uploadDir.time().'_aadhaar_'.$_FILES['aadhaar']['name']
        );

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            $uploadDir.time().'_photo_'.$_FILES['photo']['name']
        );

        $message = "Admission Form Submitted Successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Student Admission Form</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f5f7fb;
}

.card{
    border:none;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

.heading{
    background:#0d6efd;
    color:white;
    padding:12px;
    border-radius:8px;
    margin-bottom:20px;
}
</style>

</head>
<body>

<div class="container mt-5 mb-5">

<div class="card p-4">

<h2 class="text-center mb-4">
Student Admission Form
</h2>

<?php if($message!=""){ ?>
<div class="alert alert-info">
    <?php echo $message; ?>
</div>
<?php } ?>

<form method="post" enctype="multipart/form-data">

<div class="heading">Student Details</div>

<div class="row">

<div class="col-md-6 mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Father Name</label>
<input type="text" name="father_name" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Mother Name</label>
<input type="text" name="mother_name" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Phone Number</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>WhatsApp Number</label>
<input type="text" name="whatsapp" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Email ID</label>
<input type="email" name="email" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Course</label>
<select name="course" class="form-select" required>
<option value="">Select Course</option>
<option value="GDA">GDA</option>
<option value="EMT">EMT</option>
</select>
</div>

<div class="col-md-12 mb-3">
<label>Address</label>
<textarea name="address" class="form-control"></textarea>
</div>

<div class="col-md-6 mb-3">
<label>Pincode</label>
<input type="text" name="pincode" class="form-control">
</div>

</div>

<div class="heading mt-4">OTP Verification</div>

<div class="row">

<div class="col-md-6 mb-3">
<label>Enter OTP</label>
<input type="text" name="otp" class="form-control">
</div>

<div class="col-md-6 mb-3 d-flex align-items-end">
<button type="submit" name="send_otp" class="btn btn-warning">
Send OTP
</button>
</div>

</div>

<div class="heading mt-4">Upload Documents</div>

<div class="row">

<div class="col-md-6 mb-3">
<label>10th Marksheet</label>
<input type="file" name="marksheet10" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>12th Marksheet</label>
<input type="file" name="marksheet12" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Aadhaar Card</label>
<input type="file" name="aadhaar" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Photo</label>
<input type="file" name="photo" class="form-control" required>
</div>

</div>

<div class="text-center mt-4">
<button type="submit" name="submit_form" class="btn btn-success btn-lg">
Submit Admission Form
</button>
</div>

</form>

</div>

</div>

</body>
</html>