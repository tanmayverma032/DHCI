<?= $this->extend('admin/app/app') ?>
<?=$this->section('content')?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Class</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Live Class-List</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Class</h4>
                        <?php if(is_admin()['admin']['role']==1){ ?>
                        <div>
                            <a href="<?=url_to('live_class_create')?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-plus me-2"></i>Add New class</a>

                        </div>
                        <?php }?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display table header-border table-hover verticle-middle"
                                style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Branch</th>
                                        <th>Session</th>
                                        <th>Batch</th>
                                        <th>Metting Date/Time</th>
                                        <th>Metting </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($class as $row):?>
                                    <tr id="<?=$row['id']?>">
                                        <td><?=$row['branch_id']?></td>
                                        <td><?=$row['session_id']?></td>
                                        <td><?=$row['batch_id']?></td>
                                        <td><?=date('d-m-Y h:i A',strtotime($row['metting_date'].$row['metting_time']))?></td>
                                        <td>
                                        <?php
                                            // Assuming $row contains the relevant meeting information
                                            $meeting_date = $row['metting_date'];
                                            $meeting_time = $row['metting_time'];
                                            $meeting_link = $row['metting_link'];
                                            $duration_minutes = $row['duration']; // Assuming the duration is specified in minutes

                                            $current_time = time(); // Current timestamp

                                            // Convert meeting date and time to a Unix timestamp
                                            $meeting_timestamp = strtotime("$meeting_date $meeting_time");

                                            // Calculate the end time of the meeting
                                            $meeting_end_timestamp = $meeting_timestamp + ($duration_minutes * 60);

                                            if ($current_time >= $meeting_timestamp && $current_time <= $meeting_end_timestamp) {
                                                // Meeting is currently ongoing
                                                echo '<a href="' . $meeting_link . '" class="btn btn-sm btn-primary">Join</a>';
                                            } elseif ($current_time < $meeting_timestamp) {
                                                // Meeting has not started yet
                                                echo '<a href="javascript:void(0);" class="btn btn-sm btn-warning">Pending</a>';
                                            } else {
                                                // Meeting has ended
                                                echo '<a href="javascript:void(0);" class="btn btn-sm btn-danger">Closed</a>';
                                            }
                                            ?>

                                        </td>
                                        
                                        <td>
                                            <div class="d-flex">
                                               
                                                <?php if(is_admin()['admin']['role']==1){ ?>
                                                <a href="<?=url_to('editBatch').'?batch-id='.$row['id']?>" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp confirm-delete"><i
                                                        class="fa fa-trash"></i></a>
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
    var statusChange = "<?= site_url(route_to('batchStatus')); ?>";
    var deleteData = "<?=site_url(route_to('batchDelete')); ?>";
   
    <?=$this->include('admin/pages/ajex')?>
    </script>
<?=$this->endSection()?>
<?=$this->endSection()?>