<?= $this->extend('admin/app/app') ?>
<?=$this->section('content')?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Courses</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Course-List</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Courses</h4>
                        <?php if(is_admin()['admin']['role']==1){ ?>
                        <div>
                            <a href="<?=site_url(route_to('AddCourse'))?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-plus me-2"></i>Add New Course</a>

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
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Duration</th>
                                        <th>Semester</th>
                                        <th>Fee</th>
                                        <th>Date</th>
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
                                        <td>
                                            <a href="javascript:void(0);"><?=$row['name']?></a>
                                        </td>
                                        <td><?=$row['program']['title']?></td>
                                        <td>
                                            <?php 
                                                $months = $row['duration'];
                                                $years = floor($months / 12);
                                                
                                                echo $months . " Month"; 
                                                if ($years > 0) {
                                                    echo " (" . $years . " Year" . ($years > 1 ? "s" : "") . ")";
                                                }
                                            ?>
                                        </td>
                                        <td><?=$row['semester']?></td>
                                        <td><?=$row['course_fees']?></td>
                                        <td><?=date('d-m-Y',strtotime($row['date']))?></td>
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
                                                <a href="<?=site_url('course_details/'.$row['slug'])?>" target="_blank" class="btn btn-success shadow btn-xs sharp me-1"><i
                                                        class="fa fa-eye"></i></a>
                                                <?php if(is_admin()['admin']['role']==1){ ?>
                                                <a href="<?=url_to('editCourse', $row['id'])?>" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="javascript:void(0);" data-id="<?= $row['id'] ?>" class="btn btn-danger shadow btn-xs sharp confirm-delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
var statusChange = "<?= site_url(route_to('CourseStatus')); ?>";
var deleteData = "<?= site_url(route_to('CourseDelete')); ?>";
var showdata = "<?= site_url('Dashboard/Notice/Data/') ?>";

$(document).ready(function(){

    $(document).on('click', '.confirm-delete', function(e) {
        e.preventDefault();

        var id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: deleteData,
                    type: "POST",
                    data: {
                        id: id,
                        '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                    },
                    dataType: "json",

                    success: function(res) {

                        if (res.status == 1) {

                            Swal.fire(
                                'Deleted!',
                                'Course has been deleted.',
                                'success'
                            );

                            // REMOVE ROW WITHOUT RELOAD 🔥
                            $("#"+id).fadeOut(500, function(){
                                $(this).remove();
                            });

                        } else {

                            Swal.fire(
                                'Failed!',
                                'Something went wrong.',
                                'error'
                            );

                        }
                    },

                    error: function() {
                        Swal.fire(
                            'Error!',
                            'Server error occurred.',
                            'error'
                        );
                    }

                });

            }
        });
    });

});
</script>

<?=$this->endSection()?>
<?=$this->endSection()?>