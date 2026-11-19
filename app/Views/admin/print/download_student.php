
<script>window.print();</script>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

<!-- Meta Tags -->
<link rel="shortcut icon" type="image/png" href="<?=site_url('public/assets/img/logo')?>">

<!-- Page Title -->
<title>Enrollment <?=$student['name']?> - <?=$student['rag_no']?></title>

<!-- Favicon and Touch Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" ></link>
<style>
	@page {
       size: A4;
       margin: 0;
     }
     @media print {
       html, body {
     	width: 210mm;
     	height: 297mm;        
       }
	   .btn12{
		display: none;
	   }
	   .bg-light{
			background-color: #f6f6f6 !important;
	   }
	}
</style>
<script type="text/javascript">
	function print_form()
	{
		window.print();
	}
</script>
<style type="text/css">
	.req_box_left{
		font-weight:bold;
	}

</style>
</head>
<body  >
<div id="wrapper" class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered" width="960" cellpadding="5" cellspacing="0" align="center" >
					<tr class="bg-light">
						<td valign="top" colspan="4" align="center" style="background-color: #f6f6f6;">
							<!-- <img style="width:100%;" src=""/> -->
							<h1>DNPI VOCATIONAL INSTITUTE</h1>
							<h3>Enrollment Recipt</h3>
						</td>
					</tr>
					<tr>
						<td class="req_box_left" style="width:20%">Apply Date</td>
						<td class="req_box_left2"><?=date('d-m-Y',strtotime($student['reg_date']))?></td>
						<td class="req_box_left" style="width:20%;"></td>
						<td class="req_box_left2"></td>
					</tr>
					<tr>
                        <td class="req_box_left">Applied Course</td>
                        <td class="req_box_left2" colspan="2"><?=$course?></td>
						<td class="text-center" rowspan="4" >
							<p><img style='width:96px;border: 1px solid black; height:125px;'  src="<?=site_url('public/'.$student['photo'])?>"/></p>
						</td>
                    </tr>
					<tr>
						<td class="req_box_left">Student Name</td>
						<td class="req_box_left2" colspan="2"><?=$student['name']?></td>
					</tr>
					<tr>
						<td class="req_box_left">Father Name</td>
						<td class="req_box_left2" colspan="2"><?=$student['father_name']?></td>
					</tr>
					<tr>
						<td class="req_box_left">Mother Name</td>
						<td class="req_box_left2" colspan="2"><?=$student['mother_name']??"NA"?></td>
					</tr>
					<tr>
						<td class="req_box_left">Enrollment </td>
						<td class="req_box_left2" colspan="2">
							<span class='text-danger'><?=$student['rag_no']??"Plz Contact the Main Branch BCSA"?></span>						</td>
					</tr>
					<tr>
						<td class="req_box_left">Center Name</td>
						<td class="req_box_left2" colspan="1"><?=$center?></td>
						<td class="req_box_left">District</td>
						<td class="req_box_left2" colspan="2"><?=$city?></td>
					</tr>
					<tr>
						<td class="req_box_left">State</td>
						<td class="req_box_left2" colspan="1"><?=$state?></td>
						<td class="req_box_left">Pin</td>
						<td class="req_box_left2" colspan="2"><?=$student['pincode']?></td>
					</tr>
					<tr>
						<td class="req_box_left">Mobile</td>
						<td class="req_box_left2" colspan="1"><?=$student['number']?></td>
						<td class="req_box_left">Email</td>
						<td class="req_box_left2" colspan="2"><?=$student['email']?></td>
					</tr>
					<tr>
						<td class="req_box_left">Gender</td>
						<td class="req_box_left2" colspan="1"><?=$student['gender']?></td>
						<td class="req_box_left">Date Of Birth</td>
						<td class="req_box_left2" colspan="2"><?=date('d-m-Y',strtotime($student['dob']))?></td>
					</tr>
					<tr>
						<td class="req_box_left">Address : </td>
						<td class="req_box_left2" colspan="">  <?=$student['address']?></td>
						<td class="req_box_left">Country</td>
						<td class="req_box_left2" colspan="1">INDIA</td>
					</tr>
				</table>

				
				
				<table class="table table-bordered" width="960" cellpadding="5" cellspacing="0" align="center">
					<tr>
						<td class="req_box_left2" valign="top" colspan="4" style="text-align: justify;font-size: 14px;">
							<strong><u>Checklist</u></strong> <br/>
							<ol>
								<li>Printout of Completely filled online Application Form.</li>
								<li>Demand draft  in favour of <strong>"DNPI VOCATIONAL INSTITUTE."</strong>  <strong>OR</strong> Online payment receipt.</li>
								<li>Photocopy of Institute registration letter (if any). OR ID and address proof of Institution Head.</li>
							</ol>
						</td>
					</tr>
				</table>
				<div class="text-center btn12">
					<button class="btn btn-success" onClick="print_form()">Print</button>
				</div>
				<br>
			</div>
		</div>
	
	</div>

</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" ></script>
</body>

</html>

