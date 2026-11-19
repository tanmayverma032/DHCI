<?= $this->extend('admin/app/app') ?>
<?=$this->section('content')?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User-List</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title"><?=$title?></h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display table header-border table-hover verticle-middle"
                                style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Institute Name</th>
                                        <th>Email/Number</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($user as $row):?>
                                    <tr id="<?=$row['id']?>">
                                        <td>
                                            <a href="javascript:void(0);"><?=$row['user_name']?></a><br>
                                            <a href="javascript:void(0);"><strong>@<?=franchise($row['branch_id'])['center_code']??"Not Genrate"?></strong></a>

                                        </td>
                                        <td><?=franchise($row['branch_id'])['institute_name']?></td>
                                        <td><?=$row['email']?></td>
                                        <td><?php if($row['role']==1){echo "<span class='badge badge-success badge-lg'>Admin</span>";}else{echo "<span class='badge badge-info badge-lg'>Franchise</span>";}?></td>
                                        <td>
                                            <?php if($row['status'] ==1){?>
                                            <span class="badge badge-success badge-lg light">Active</span>
                                            <?php }else if($row['status'] ==0){?>
                                                <span class="badge badge-danger badge-lg light">InActive</span>
                                            <?php }else if($row['status'] ==-1){?>
                                                <span class="badge badge-warning badge-lg light">Reject</span>
                                            <?php }?>
                                        </td>
                                        
                                        <td>
                                            <div class="action-buttons d-flex justify-content-end">
                                                <a href="<?=url_to('editFranchise',$row['branch_id'])?>" class="btn btn-secondary light mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1"
                                                        class="svg-main-icon">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path
                                                                d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                            </path>
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                                                height="2" rx="1"></rect>
                                                        </g>
                                                    </svg>
                                                </a>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:;" onclick="ChangePassword(<?=$row['id']?>)"><span class="badge badge-warning badge-lg ">Change</span></a>
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


<div class="modal fade" id="changepassModel" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="passwordModalLabel">Change Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="user-password-load"></div>
    </div>
  </div>
</div>


<?=form_open()?><?=form_close()?>
<?=$this->section('js')?>

<script>
var deleteData = "<?=site_url(route_to('studentDelete')); ?>";

        function ChangePassword(id) {
            var url = "<?=url_to('user_passwordChange')?>";
            $.ajax({
                type: 'GET',
                url: url,
                container: '#user-password-load',
                data: { id: id },
                success: function(res) {
                    $('#user-password-load').html(res);
                    $('#changepassModel').modal('show');
                }
            });
        }

<?=$this->include('admin/pages/ajex')?>
</script>
<?=$this->endSection()?>
<?=$this->endSection()?>