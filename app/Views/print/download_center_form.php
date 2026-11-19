


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

<!-- Meta Tags -->
<!-- Page Title -->
<title>Online Application form for Franchise</title>
<link rel="shortcut icon" type="image/png" href="<?=site_url()?>public/assets/img/logo.jpg">
<!-- Favicon and Touch Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" ></link>
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
	@page {
       size: A4;
       margin: 0;
     }
     @media print {
       html, body {
     	width: 210mm;
     	height: 270mm;        
       }
	   .btn12{
		display: none;
	   }
	   .bg-light{
			background-color: #f6f6f6 !important;
	   }
	}
</style>
</head>
<body  >
<div id="wrapper" class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered" width="960" cellpadding="5" cellspacing="0" align="center" >
					<tr>
						<td valign="top" colspan="4" align="center" style="background-color: #f6f6f6;">
						<!-- <img style="width:100%;" src="https://onlinebcsa.com/assest/Img/print.PNG"/> -->
							<h1>DHCI India</h1>
							<h3>Franchise Application</h3>
						</td>
					</tr>
					<tr>
						<td class="req_box_left">Ragistration Number</td>
						<td class="req_box_left2"><?=$franchise['center_code']?></td>
						<td class="req_box_left">Print Date</td>
						<td class="req_box_left2"><?=date('d-M-Y')?></td>
					</tr>
					<tr>
						<td class="big_text" colspan="3" align="left">
							<table width="500" style="height: 100px;" cellspacing="0" class="office_box">
								<tr>
									<td colspan="2" valign="top"><i>For Office use only</i></td>
								</tr>
								<tr>
									<td width="30%" align="left" valign="top">Receiving date</td>
									<td align="left" valign="top"><?=date('Y-m-d h:i A',strtotime($franchise['reg_date']))?></td>
								</tr>
								<tr>
									<td width="30%" align="left" valign="top">Apply Id </td>
									<td align="left" valign="top"> 000<?=$franchise['id']?> </td>
								</tr>
								
							</table>
						</td>
						<td class="text-center" colspan="2" ><img style='width:96px'  src="<?=site_url('public/'.$franchise['photo'])?>"/>                
						</td>
					</tr>
					<tr>
                        <td class="req_box_left">Applied For</td>
                        <td class="req_box_left2" colspan="3">Franchise</td>
                    </tr>
					<tr>
						<td class="req_box_left">Name of the Institute</td>
						<td class="req_box_left2" colspan="3"><?=$franchise['institute_name']?></td>
					</tr>
					<tr>
						<td class="req_box_left">Address of the Institute</td>
						<td class="req_box_left2" colspan="3"><?=$franchise['ins_address']?></td>
					</tr>
					<tr>
						<td class="req_box_left">State</td>
						<td class="req_box_left2" colspan="1"><?=$states?></td>
						<td class="req_box_left">District</td>
						<td class="req_box_left2" colspan="2"><?=$districName?></td>
					</tr>
					<tr>
						<td class="req_box_left">Pin</td>
						<td class="req_box_left2" colspan="1"><?=$franchise['pin_code']?></td>
						<td class="req_box_left">Business Phone No.</td>
						<td class="req_box_left2" colspan="2"><?=$franchise['ins_num']?></td>
					</tr>
					<tr>
						<td class="req_box_left">Mobile</td>
						<td class="req_box_left2" colspan="1"><?=$franchise['h_number']?></td>
						<td class="req_box_left">Email</td>
						<td class="req_box_left2" colspan="2"><?=$franchise['email']?></td>
					</tr>
					<tr>
						<td class="req_box_left">Status of the Institute</td>
						<td class="req_box_left2" colspan="1"><?=$franchise['ins_status']?></td>
						<td class="req_box_left">Year of the Estd.</td>
						<td class="req_box_left2" colspan="2"><?=$franchise['establishment']?></td>
					</tr>
					<tr>
						<td class="big_text" colspan="4"><strong style="font-size:20px;"> HEAD OF THE INSTITUTE DETAILS </strong><br /></td>
					</tr>
					<tr>
						<td class="req_box_left">Head of the Institute</td>
						<td class="req_box_left2" colspan="1"><?=$franchise['h_name']?></td>
						<td class="req_box_left">Gender</td>
						<td class="req_box_left2" colspan="2"><?=$franchise['gender']?></td>
					</tr>
					<tr>
						<td class="req_box_left">Education Qualifiation</td>
						<td class="req_box_left2" colspan="1"><?=$franchise['h_qual']?></td>
						<td class="req_box_left">Professional Experience</td>
						<td class="req_box_left2" colspan="2"><?=$franchise['h_exp']?> Years</td>
					</tr>
					
					<tr>
						<td class="req_box_left">PanCard No</td>
						<td class="req_box_left2" colspan="1"><?=$franchise['pan_no']?></td>
						<td class="req_box_left">Aadhar No</td>
						<td class="req_box_left2" colspan="2"><?=$franchise['aadhar_no']?> Years</td>
					</tr>
					<tr>
						<td class="req_box_left">Date of Birth</td>
						<td class="req_box_left2" colspan="3"><?=date('d-m-Y',strtotime($franchise['dob']))?></td>
					</tr>

				</table>
				<table class="table table-bordered" width="960" cellpadding="5" cellspacing="0" align="center">
					<tr>
						<td class="req_box_left2" valign="top" colspan="4" style="text-align: justify;font-size: 14px;">
							<strong><u>Checklist</u></strong> <br/>
							<ol>
								<li>Printout of Completely filled online Application Form.</li>
								<li>Demand draft  in favour of <strong>"DHCI India "</strong>  <strong>OR</strong> Online payment receipt.</li>
								<li>Photocopy of Institute registration letter (if any). OR ID and address proof of Institution Head.</li>
							</ol>
						</td>
					</tr>
				</table>
				<div class="text-center btn12">
					<button class="btn btn-success" onclick="print_form()">Print</button>
				</div>
			</div>
		</div>
	
	</div>

</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" ></script>
</body>

</html>

<script>window.print();</script>