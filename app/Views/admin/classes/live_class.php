<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>
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
                        <?php if (is_admin()['admin']['role'] == 1) { ?>
                            <div>
                                <a href="<?= url_to('live_class_create') ?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New class</a>

                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="mettingTable">


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
    
    function reloadMeetingData() {
        $.ajax({
            url: '<?= url_to('get_class') ?>', 
            method: 'GET',
            dataType: 'html',
            success: function(data) {
                //console.log(data);
                $('#mettingTable').html(data);
            },
            error: function(error) {
                console.error('Error fetching meeting data:', error);
            }
        });
    }

   
    $(document).ready(function() {
        reloadMeetingData();
       
        // Call the reloadMeetingData function every 30 seconds
        setInterval(reloadMeetingData, 30000); // 30,000 milliseconds = 30 seconds


       
        $(".confirm-delete").on("click", function(e) {
            e.preventDefault();
            var deleteUrl = $(this).data("delete-url");
            var confirmDelete = confirm("Are you sure you want to delete this meeting?");
            if (confirmDelete) {
                window.location.href = deleteUrl;
            }
        });



    });
</script>



<?= $this->endSection() ?>
<?= $this->endSection() ?>