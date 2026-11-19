<?= $this->extend('admin/app/app') ?>
<?=$this->section('content')?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Study Material</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Study Material List</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Study Material</h4>
                        <?php if(is_admin()['admin']['role']==1){ ?>
                        <div>
                            <a href="<?=site_url(route_to('AddStudyMaterial'))?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-plus me-2"></i>Add New Study Material</a>

                        </div>
                        <?php }?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display table header-border table-hover verticle-middle"
                                style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check custom-checkbox ms-0">
                                                <input type="checkbox" class="form-check-input" id="checkAll"
                                                    required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Program</th>
                                        <th>Course</th>
                                        <th>Semester</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>File</th>
                                        <?php if(is_admin()['admin']['role']==1){ ?>
                                        <th>Status</th>
                                        <?php }?>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data as $row):?>
                                    <tr id="<?=$row['id']?>">
                                        <td>
                                            <div class="form-check custom-checkbox ms-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2"
                                                    required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                    
                                        <td><?=$row['program_name']?></td>
                                        <td><?=$row['course_name']?></td>
                                        <td><?=$row['semester']?></td>
                                        <td><?=$row['code']?></td>
                                        <td><?=$row['name']?></td>
                                        <td>
                                            <?php if (!empty($row['filepdf'])) : ?>
                                                <a href="<?= base_url('uploads/studymaterials/' . $row['filepdf']) ?>" target="_blank" title="View PDF">
                                                    <i class="fas fa-file-pdf" style="color: red; font-size: 24px;"></i> <!-- Large FontAwesome PDF Icon -->
                                                </a>
                                            <?php else : ?>
                                                <span class="text-muted">No File</span>
                                            <?php endif; ?>
                                        </td>

                                        <?php if(is_admin()['admin']['role']==1){ ?>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input status" type="checkbox"
                                                    id="<?php echo "data".$row['id']; ?>"
                                                    <?php if($row['status'] ==1){ echo "checked";}?>>
                                            </div>
                                        </td>
                                        <?php }?>
                                        <td>
                                            <div class="d-flex">
                                               
                                                <?php if(is_admin()['admin']['role']==1){ ?>
                                                <a href="<?=url_to('editStudyMaterial', $row['id'])?>" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                        
                                                 <!-- <a href="javascript:void()"
                                                    class="btn btn-danger shadow btn-xs sharp confirm-delete">
                                                    <i class="fa fa-trash"></i>
                                                    </a> -->
                                                    <form action="<?= site_url(route_to('StudyMaterialDelete')) ?>" method="post" style="display:inline">

                                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure to delete?')"
                                                            class="btn btn-danger shadow btn-xs sharp">

                                                            <i class="fa fa-trash"></i>

                                                        </button>

                                                    </form>
                                                <?php } ?>
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
<?=form_open()?><?=form_close()?>
<?=$this->section('js')?>
<script>
    var statusChange = "<?= site_url(route_to('StudyMaterialStatus')); ?>";
    var deleteData = "<?=site_url(route_to('StudyMaterialDelete')); ?>";
    var showdata = "<?=site_url('Dashboard/Notice/Data/')?>";

    <?=$this->include('admin/pages/ajex')?>
    </script>
<?=$this->endSection()?>
<?=$this->endSection()?>