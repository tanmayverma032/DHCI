<?php echo $this->extend('admin/app/app') ?>

<?php echo $this->section('title') ?>
Enquiry List
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Enquiries</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Enquiry List</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="card-title">Enquiry List</h4>

    <div class="d-flex align-items-center gap-2">

        <!-- Start Date -->
        <input type="date"
               id="startDate"
               class="form-control form-control-sm"
               style="width: 150px;">

        <!-- End Date -->
        <input type="date"
               id="endDate"
               class="form-control form-control-sm"
               style="width: 150px;">

        <!-- Download Filtered -->
        <button id="downloadFiltered" class="btn btn-success btn-sm">
            <i class="fa fa-download"></i> Download
        </button>

        <!-- Bulk Delete -->
        <button id="bulkDeleteBtn" class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i> Bulk Delete
        </button>

    </div>
</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display table header-border table-hover verticle-middle" style="min-width: 845px">
                                <thead>
                                    <tr>
                                         <th>
                                            <input type="checkbox" id="selectAll">
                                        </th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Course</th>
                                        <th>Message</th>
                                        <th>Submitted At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                        <?php $i = 1;foreach ($enquiries as $row): ?>
                                        <tr id="row-<?php echo esc($row['id']) ?>">
                                            <td>
                                                <input type="checkbox" class="selectItem" value="<?php echo esc($row['id']) ?>">
                                            </td>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo esc($row['name']) ?></td>
                                            <td><?php echo esc($row['email']) ?></td>
                                            <td><?php echo esc($row['phone']) ?></td>
                                            <td><?php echo esc($row['course']) ?></td>
                                            <td><?php echo esc($row['message']) ?></td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($row['created_at'])) ?></td>

                                            <td>
                                                <button class="btn btn-danger btn-sm deleteBtn"
                                                    data-id="<?php echo esc($row['id']) ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++;endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection() ?>

<?php echo $this->section('js') ?>



<script>
    var csrfName = "<?php echo csrf_token() ?>";
    var csrfHash = "<?php echo csrf_hash() ?>";
</script>

<script>
$(document).ready(function() {

    // Select All checkbox
    $("#selectAll").click(function() {
        $(".selectItem").prop("checked", this.checked);
    });

    // Single Delete
    $(document).on("click", ".deleteBtn", function () {

        let id = $(this).data("id");

        if (!confirm("Are you sure you want to delete this enquiry?")) return;

        $.ajax({
            url: "<?php echo base_url('admin/enquiry/delete/') ?>" + id,
            type: "POST",
            data: {
                [csrfName]: csrfHash
            },
            success: function(response) {

                $("#row-" + id).remove();

                alert("Deleted successfully!");

                // Update CSRF HASH for next requests
                csrfHash = response.csrf_hash;
            }
        });
    });

    // Bulk Delete
    $("#bulkDeleteBtn").click(function() {

        let selected = [];

        $(".selectItem:checked").each(function() {
            selected.push($(this).val());
        });

        if (selected.length === 0) {
            alert("Please select at least one enquiry.");
            return;
        }

        if (!confirm("Delete selected enquiries?")) return;

        $.ajax({
            url: "<?php echo base_url('admin/enquiry/bulk-delete') ?>",
            type: "POST",
            data: {
                ids: selected,
                [csrfName]: csrfHash
            },
            success: function(response) {

                selected.forEach(id => {
                    $("#row-" + id).remove();
                });

                alert("Selected enquiries deleted!");

                // Update CSRF HASH for next requests
                csrfHash = response.csrf_hash;
            }
        });

    });



 // Button Download Filtered
    $("#downloadFiltered").click(function () {

    let start = $("#startDate").val();
    let end   = $("#endDate").val();

    if (start === "" || end === "") {
        alert("Please select both Start Date and End Date.");
        return;
    }

    window.location.href =
        "<?php echo base_url('admin/enquiries/download') ?>?start=" + start + "&end=" + end;
});

});
</script>



<?php echo $this->endSection() ?>