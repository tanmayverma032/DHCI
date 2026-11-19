<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>


<style>
.dropify-message p{
font-size: 24px;
    color: #433333;
}
</style>
<div class="content-body">
    <div class="container-fluid">

    <div class="row page-titles align-items-center justify-content-between">
    <div class="col-md-6">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Students</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Student-List</a></li>
        </ol>
    </div>
</div>

        <!-- row -->

        <!-- CSV Upload Section -->




        <div class="row">
            
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <div class="d-flex flex-wrap align-items-end justify-content-between">
                        <h4 class="card-title mb-0">Student</h4>
                    
                        <div class="d-flex flex-wrap align-items-end gap-2">
                    
                         <a href="<?= base_url('admin/download-excel') ?>" class="btn btn-outline-secondary btn-sm mx-3">
                            <i class="fa fa-download mr-1"></i> Export Students
                        </a>
                    
                          <form action="<?= base_url('admin/upload-csv') ?>" method="post" enctype="multipart/form-data" class="d-flex align-items-end flex-wrap gap-2">
                            <?= csrf_field() ?>
                            <div>
                              <input type="file" name="csv_file" class="form-control form-control-sm" accept=".csv" required style="max-width: 200px;">
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">
                              <i class="fa fa-upload mr-1"></i> Upload CSV
                            </button>
                          </form>
                           <a href="<?= base_url('public/students.csv') ?>" class="btn btn-outline-secondary btn-sm mx-3">
                          <i class="fa fa-download mr-1"></i> Download Sample File
                        </a>
                    
                          <form id="filterForm" method="GET" action="<?= base_url('admin/students') ?>" class="d-flex align-items-end flex-wrap gap-2">
                            <div class="form-group mb-0">
                              <label class="font-w600 mb-1">Session <span class="text-danger">*</span></label>
                              <select name="session_id" id="session_id" class="form-control form-control-sm">
                                <option value="" selected disabled>Choose..</option>
                                <?php foreach($session as $row){?>
                                  <option value="<?=$row['id']?>" 
                                    <?php if(!empty($_GET['session_id']) && $_GET['session_id'] == $row['id']){echo "selected";}?>>
                                    <?=$row['session']?>
                                  </option>
                                <?php }?>
                              </select>
                            </div>
                    
                            <div>
                              <button type="submit" class="btn btn-primary btn-sm mt-4">
                                <i class="fa fa-filter mr-1"></i> Filter
                              </button>
                            </div>
                          </form>

                          <!-- Date Filter (Reg. Date) -->
                          <div class="d-flex align-items-end flex-wrap gap-2">
                            <div class="form-group mb-0">
                              <label class="font-w600 mb-1">From Date</label>
                              <input type="date" id="from_date" class="form-control form-control-sm">
                            </div>
                            <div class="form-group mb-0">
                              <label class="font-w600 mb-1">To Date</label>
                              <input type="date" id="to_date" class="form-control form-control-sm">
                            </div>
                            <div>
                              <button type="button" id="resetDate" class="btn btn-outline-secondary btn-sm mt-4">
                                <i class="fa fa-undo mr-1"></i> Reset
                              </button>
                            </div>
                          </div>
                    
                          <a href="<?= url_to('addStudent') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-1"></i> Add Student
                          </a>
                    
                        </div>
                      </div>
                    </div>


                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display table header-border table-hover verticle-middle" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Institute Name</th>
                                        <th>Email/Number</th>
                                        <th>Reg. Date</th>
                                        <th>Status</th>
                                        <th>Certificate Status</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row) : ?>
                                        <tr id="<?= $row['id'] ?>">
                                            <td>
                                                <a href="javascript:void(0);"><?= $row['name'] ?></a><br>
                                                <a href="javascript:void(0);"><strong>@<?= $row['rag_no'] ?? "Not Genrate" ?></strong></a>

                                            </td>
                                            <td><?= @franchise(@$row['center_id'])['institute_name'] ?></td>
                                            <td><?= $row['email'] ?><br><?= $row['number'] ?></td>
                                            <td data-order="<?= date('Y-m-d H:i:s', strtotime($row['reg_date'])) ?>"><?= date('d-m-Y', strtotime($row['reg_date'])) ?></td>
                                            <td>
                                                <?php if ($row['status'] == 1) { ?>
                                                    <span class="badge badge-success badge-lg light">Active</span>
                                                <?php } else if ($row['status'] == 0) { ?>
                                                    <span class="badge badge-danger badge-lg light">InActive</span>
                                                <?php } else if ($row['status'] == -1) { ?>
                                                    <span class="badge badge-warning badge-lg light">Reject</span>
                                                <?php } ?>
                                            </td>
                                            <?php if (is_admin()['admin']['role'] == 1) { ?>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input certificate_status" onclick="certificateStatus(<?=$row['id']?>)" type="checkbox" id="<?php echo "data" . $row['id']; ?>" <?php if ($row['certificate_status'] == 1) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input payment_status" onclick="paymentStatus(<?=$row['id']?>)" type="checkbox" id="<?php echo "data" . $row['id']; ?>" <?php if ($row['payment_status'] == 1) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>>
                                                    </div>
                                                </td>
                                            <?php } else { ?>
                                                <td>
                                                    <?php if ($row['certificate_status'] == 1) { ?>
                                                        <span class="badge badge-success badge-lg light">Issue</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-warning badge-lg light">Not Issue</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['payment_status'] == 1) { ?>
                                                        <span class="badge badge-success badge-lg light">Paid</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-warning badge-lg light">Unpaid</span>
                                                    <?php } ?>
                                                </td>
                                            <?php } ?>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="<?= url_to('downloadStudent', $row['id']) ?>" target="_blank" class="dropdown-item">
                                                                <i class="fa fa-download"></i> Download
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?= url_to('editStudent', $row['id']) ?>" class="dropdown-item">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </a>
                                                        </li>

                                                        <?php if (is_admin()['admin']['role'] == 1) { ?>
                                                            <li>
                                                                <a href=" javascript:void(0);" class="dropdown-item" onclick="confirmDelete(<?= $row['id']?>)">
                                                                    <i class="fa fa-trash"></i> Delete
                                                                </a>                                                              
                                                            </li>
                                                        <?php } ?>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li>
                                                            <a href="<?= url_to('idCard', $row['id']) ?>" target="_blank" class="dropdown-item">
                                                                <i class="fa fa-address-card"></i> Id Card
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </td>


                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?= form_open() ?><?= form_close() ?>
<?= $this->section('js') ?>


<script>
    var deleteData = "<?= site_url(route_to('studentDelete')); ?>";

    // Default sort: Reg. Date (column 3) latest first
    $(window).on('load', function () {
        $('#example3').DataTable().order([3, 'desc']).draw();
    });

    // Date filter on "Reg. Date" column (index 3, format d-m-Y)
    $.fn.dataTable.ext.search.push(function (settings, data) {
        if (settings.nTable.id !== 'example3') return true;

        var from = $('#from_date').val(); // yyyy-mm-dd
        var to   = $('#to_date').val();
        if (!from && !to) return true;

        var parts = (data[3] || '').trim().split('-'); // dd-mm-yyyy
        if (parts.length !== 3) return true;
        var rowDate = parts[2] + '-' + parts[1] + '-' + parts[0]; // yyyy-mm-dd

        if (from && rowDate < from) return false;
        if (to && rowDate > to) return false;
        return true;
    });

    $(document).on('change', '#from_date, #to_date', function () {
        $('#example3').DataTable().draw();
    });

    $(document).on('click', '#resetDate', function () {
        $('#from_date, #to_date').val('');
        $('#example3').DataTable().draw();
    });

    function certificateStatus(id) {
        var csrfName = $('input[name=csrf_test_name]').attr('name');
        var csrfHash = $('input[name=csrf_test_name]').val();
        changeStatus("<?= url_to('certificate_status') ?>", id, csrfName, csrfHash);
    }
    
    function paymentStatus(id) {
        var csrfName = $('input[name=csrf_test_name]').attr('name');
        var csrfHash = $('input[name=csrf_test_name]').val();
        changeStatus("<?= url_to('payment_status') ?>", id, csrfName, csrfHash);
    }



    function changeStatus(url, id, csrfName, csrfHash) {
        if (id != "") {
            jQuery.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {
                    id: id,
                    [csrfName]: csrfHash
                },
                success: function(res) {
                    $('input[name=csrf_test_name]').val(res['token']);
                    toastr.success("Status Successfully Changed!", "Success!", {
                        closeButton: true,
                        tapToDismiss: false,
                        progressBar: true
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    toastr.error("Status Not Changed!", "Error!", {
                        closeButton: true,
                        tapToDismiss: false,
                        progressBar: true
                    });
                }
            });
        }
    }
    
    function confirmDelete(id){
        console.log('data loaded');
        var csrfName = $('input[name=csrf_test_name]').attr('name');
        var csrfHash = $('input[name=csrf_test_name]').val(); 
         Swal.fire({
            title: 'Are you sure to delete ?',
            text: "You will not be able to recover this imaginary file !!",
            type: "warning",
            showCancelButton: !0, 
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Yes, delete it!'
        }).then(function(t) {
            if (t.value && Swal.fire) {
                
                fetch(deleteData, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        id: id,
                        [csrfName]: csrfHash
                    })
                })
                .then(response => response.text()) // Use text() instead of json()
                .then(text => {
                   
                    try {
                        const data = JSON.parse(text); // Try parsing if it's meant to be JSON
                        document.querySelector('input[name="csrf_test_name"]').value = data['token'];
                        document.getElementById(id).remove();
                        toastr.success("Deleted Successfully!", "Success!", {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true
                        });
                    } catch (e) {
                        toastr.error("Unexpected response format", "Error!", {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true
                        });
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    toastr.error("Something is wrong", "Error!", {
                        closeButton: true,
                        tapToDismiss: false,
                        progressBar: true
                    });
                });

    
            }
    
        });
    }


   

</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>