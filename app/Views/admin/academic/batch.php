<?= $this->extend('admin/app/app') ?>
<?=$this->section('content')?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Batches</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Batch-List</a></li>
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
                            <a href="<?=url_to('add_batch')?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-plus me-2"></i>Add New Batch</a>

                        </div>
                        <?php }?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display table header-border table-hover verticle-middle"
                                style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Batch Name</th>
                                        <th>Session</th>
                                        <th>Batch Code</th>
                                        <th>Date</th>
                                        <?php if(is_admin()['admin']['role']==1){ ?>
                                        <th>Status</th>
                                        <?php }?>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($batch as $row):?>
                                    <tr id="<?=$row['id']?>">
                                        <td><?=$row['batch_name']?></td>
                                        <td><?=$row['session']?></td>
                                        <td><?=$row['batch_code']?></td>
                                        <td><?=date('d-m-Y',($row['created_at']))?></td>
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