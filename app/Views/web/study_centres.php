<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->


<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION COURSES -->
<section class="small_pt bgimg">
    <div class="container bgragistration">
            <h4 class="text_blue3">Welcome to DHCIINDIA VOCATIONAL INSTITUTE Academic Association</h4>
            <h6 class="text-danger">Find Study Centre</h6>
            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="g" class="form-label">State</label>
                    <select id="g" class="form-control rounded-1">
                        <option selected>Select</option>
                        <option>Bihar</option>
                        <option>Delhi</option>
                        <option>Assam</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="Category" class="form-label">DISTRICT</label>
                    <select id="Category" class="form-control rounded-1">
                        <option selected>Select</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="Category" class="form-label">Submit here</label>
                    <input type="button" 
       class="btn form-control rounded text-light" 
       style="background-color: #00588b; border-color: #00588b;" 
       id="inputZip" 
       value="Search Branch">

                </div>
            </div>
       
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th scope="col">Center Code</th>
                    <th scope="col">Organization Name </th>
                    <th scope="col">Director </th>
                    <th scope="col">Center Address</th>
                    
                </tr>
            </thead>
            <tbody class="">
                <?php $i=1; foreach($franchise as $row):?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$row['center_code']?></td>
                    <td><?=$row['institute_name']?></td>
                    <td><?=$row['h_name']?></td>
                    <td><?=$row['h_addres']?></td>
                </tr>
                <?php $i++; endforeach; ?>
                
            </tbody>
        </table>
    </div>
</section>
<!-- END SECTION COURSES -->


<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->