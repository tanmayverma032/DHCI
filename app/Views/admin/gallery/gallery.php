<?= $this->extend('admin/app/app') ?>
<?=$this->section('content')?>
<div class="content-body">
    <div class="container-fluid">


        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php if(empty($editdata)){echo "active";}?>" data-bs-toggle="tab" href="#home"><i
                                            class="la la-home me-2"></i> Home</a>
                                </li>
                                <?php if(is_admin()['admin']['role']==1){ ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(!empty($editdata)){echo "active";}?>" data-bs-toggle="tab" href="#profile"><i
                                            class="la la-user me-2"></i>
                                        Add Program</a>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                        <div>
                            <a href="<?=site_url(route_to('AllCourse'))?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-eye me-2"></i>See All Course</a>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="default-tab">

                            <div class="tab-content">
                                <div class="tab-pane fade <?php if(empty($editdata)){echo "show active";}?>" id="home" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="example3"
                                            class="display table header-border table-hover verticle-middle"
                                            style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check custom-checkbox ms-0">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="checkAll" required="">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th>Name</th>
                                                    <th>Thumbnail</th>
                                                    <th>Publish Date</th>
                                                    <?php if(is_admin()['admin']['role']==1){ ?>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <?php }?>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data as $row):?>
                                                <tr id="<?=$row['id']?>">
                                                    <td>
                                                        <div class="form-check custom-checkbox ms-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheckBox2" required="">
                                                            <label class="form-check-label"
                                                                for="customCheckBox2"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);"><?=$row['title']?></a><br>
                                                        <a href="javascript:void(0);"> <strong>#<?=db_connect()->query("SELECT * FROM `courses` where programid= ".$row['id'] )->getNumRows();?></strong></a>
                                                        <strong> Courses</strong>

                                                    </td>

                                                    <td><img src="<?=site_url('public/').$row['thumbnail']?>"
                                                            alt="thumbnail_pic" width="130"></td>


                                                    <td><?=date('d-m-Y',strtotime($row['created_at']))?></td>
                                                    <?php if(is_admin()['admin']['role']==1){ ?>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input status" type="checkbox"
                                                                id="<?php echo "data".$row['id']; ?>" 
                                                                <?php if($row['status'] ==1){ echo "checked";}?>>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?=url_to('editProgram', $row['id'])?>"
                                                                class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-danger shadow btn-xs sharp confirm-delete"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                        <?php }?>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade <?php if(!empty($editdata)){echo "show active";}?>" id="profile">

                                    <?=form_open_multipart(url_to('saveProgram'),["class"=>"form-valide-with-icon needs-validation", "id"=>"courseAdd", "novalidate"=>""])?>
                                    <div class="row">
                                        <div class="col-xl-6  col-md-6 mb-4"> 
                                            <label class="form-label font-w600">Program Name<span
                                                    class="text-danger scale5 ms-2">*</span></label>
                                            <input type="hidden" name="id" value="<?=isset($editdata)?$editdata['id']:""?>">
                                            <input type="text" id="pname" name="pname" class="form-control solid"
                                                placeholder="Name" aria-label="name" value="<?=isset($editdata)?$editdata['title']:""?>" required>
                                        </div>
                                        <div class="col-xl-6  col-md-6 mb-4">
                                            <label class="form-label font-w600">Program Slug <span
                                                    class="text-danger scale5 ms-2">*</span></label>
                                            <input type="text" id="pslug" name="pslug" class="form-control solid"
                                                placeholder="Name" aria-label="name" value="<?=isset($editdata)?$editdata['slug']:""?>" required>
                                        </div>

                                        <div class="col-xl-12 mb-4">
                                            <label class="form-label font-w600">Course Thumbnail:<span
                                                    class="text-danger scale5 ms-2">*</span></label>
                                            <input class="form-control dropify input-file-events" name="thumbnail"
                                                type="file" data-default-file="<?=isset($editdata)?site_url('public/').$editdata['thumbnail']:""?>" <?=isset($editdata)?"":"required"?> >
                                        </div>
                                    </div>
                                    <div>
                                        <span>Status:<label class="radio-inline mx-3"><input type="radio" name="status"
                                                    class="form-check-input" value="1" required <?php if(!empty($editdata)){if($editdata['status']==1){echo "checked";}}?> >
                                                Active</label></span>
                                        <span><label class="radio-inline me-3"><input type="radio" name="status"
                                                    class="form-check-input" value="0" required <?php if(!empty($editdata)){if($editdata['status']==0){echo "checked";}}?>> In
                                                Active</label></span>
                                    </div>
                                    <div class="card-footer text-end">
                                        <div>
                                            <input type="reset" class="btn btn-danger light me-3" value="Reset"></a>
                                            <input type="submit" class="btn btn-primary" value="<?=isset($editdata)?"Update":"Submit"?>">
                                        </div>
                                    </div>`
                                    <?=form_close()?>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <?=$this->section('js')?>
    <script>
    function convertToSlug(input) {
        return input
            .trim()
            .replace(/\s+/g, '-')
            .toLowerCase();
    }

    $('#pname').keyup(function() {
        const userInput = $('#pname').val();
        const slug = convertToSlug(userInput);
        $('#pslug').val(slug);
    });
    </script>
    <script>
    var statusChange = "<?= site_url(route_to('programStatus')); ?>";
    var deleteData = "<?=site_url(route_to('programDelete')); ?>";
    var showdata = "<?=site_url('Dashboard/Notice/Data/')?>";

    <?=$this->include('admin/pages/ajex')?>
    </script>
    <?=$this->endSection()?>
    <?=$this->endSection()?>