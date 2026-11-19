<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Franchise</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Franchise List</a></li>
            </ol>
        </div>

        <!-- Alert Messages -->
        <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i> <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <!-- Franchise List -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile Franchise</h4>
                        <div>
                            <a href="<?= url_to('AddFranchise') ?>" class="btn btn-primary me-3 btn-sm">
                                <i class="fas fa-plus me-2"></i>Add Franchise
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="franchiseTable" class="display table header-border table-hover verticle-middle" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Institute Name</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($data as $row): ?>
                                    <tr id="franchise_<?= $row['id'] ?>">
                                        <td><?= $i ?></td>
                                        <td>
                                            <a href="javascript:void(0);"><?= $row['institute_name'] ?></a><br>
                                            <a href="javascript:void(0);"><strong>@<?= $row['center_code'] ?></strong></a>
                                        </td>
                                        <td><?= $row['h_name'] ?></td>
                                        <td><?= $row['h_number'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($row['reg_date'])) ?></td>
                                        <td>
                                            <?php if($row['status'] == 1): ?>
                                                <span class="badge badge-success badge-lg light">Active</span>
                                            <?php elseif($row['status'] == 0): ?>
                                                <span class="badge badge-danger badge-lg light">InActive</span>
                                            <?php elseif($row['status'] == -1): ?>
                                                <span class="badge badge-warning badge-lg light">Reject</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="action-buttons d-flex justify-content-end">
                                                <!-- Download Button -->
                                                <a target="_blank" href="<?= url_to('downloadFranchise', $row['id']) ?>" class="btn btn-success light mr-2 btn-sm" title="Download">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                
                                                <!-- Edit Button -->
                                                <a href="<?= url_to('editFranchise', $row['id']) ?>" class="btn btn-secondary light mr-2 btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                
                                                <!-- Delete Button (except admin id 3) -->
                                                <?php if($row['id'] != 3): ?>
                                                    <a href="javascript:void(0);" class="btn btn-danger light btn-sm delete-franchise" data-id="<?= $row['id'] ?>" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-exclamation-triangle text-warning" style="font-size: 48px;"></i>
                    <h5 class="mt-3">Are you sure?</h5>
                    <p class="text-muted">You want to delete this franchise record? This action cannot be undone.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash me-2"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#franchiseTable').DataTable({
        responsive: true,
        pageLength: 10,
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "No entries found",
            emptyTable: "No franchise records found"
        },
        order: [[0, 'asc']]
    });

    // Delete button click handler
    let deleteId = null;
    
    $('.delete-franchise').on('click', function(e) {
        e.preventDefault();
        deleteId = $(this).data('id');
        $('#deleteModal').modal('show');
    });

    // Confirm delete
    $('#confirmDeleteBtn').on('click', function() {
        if (deleteId) {
            // Show loading state
            $(this).html('<i class="fas fa-spinner fa-spin me-2"></i>Deleting...');
            $(this).prop('disabled', true);
            
            // AJAX request to delete
            $.ajax({
                url: "<?= site_url(route_to('franchiseDelete')) ?>",
                type: 'POST',
                data: {
                    id: deleteId,
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Remove row from table
                        $('#franchise_' + deleteId).fadeOut(500, function() {
                            $(this).remove();
                            // Check if table is empty
                            if ($('#franchiseTable tbody tr').length === 0) {
                                location.reload();
                            }
                        });
                        
                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message || 'Failed to delete franchise.',
                            confirmButtonColor: '#d33'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while deleting. Please try again.',
                        confirmButtonColor: '#d33'
                    });
                },
                complete: function() {
                    $('#deleteModal').modal('hide');
                    $('#confirmDeleteBtn').html('<i class="fas fa-trash me-2"></i>Delete');
                    $('#confirmDeleteBtn').prop('disabled', false);
                    deleteId = null;
                }
            });
        }
    });

    // Reset modal when hidden
    $('#deleteModal').on('hidden.bs.modal', function() {
        deleteId = null;
        $('#confirmDeleteBtn').html('<i class="fas fa-trash me-2"></i>Delete');
        $('#confirmDeleteBtn').prop('disabled', false);
    });

    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
});
</script>

<style>
/* Custom styles */
.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    padding: 1.25rem;
    background: #fff;
    border-bottom: 1px solid #eee;
}

.card-title {
    margin-bottom: 0;
    font-weight: 600;
}

.table td {
    vertical-align: middle;
    padding: 12px 15px;
}

.badge {
    padding: 6px 12px;
    font-weight: 500;
}

.badge-lg {
    padding: 8px 16px;
    font-size: 12px;
}

.light {
    font-weight: 400;
}

.badge-success {
    color: #1e7e34;
    background-color: #d4edda;
}

.badge-danger {
    color: #721c24;
    background-color: #f8d7da;
}

.badge-warning {
    color: #856404;
    background-color: #fff3cd;
}

.action-buttons .btn {
    margin: 0 2px;
    padding: 6px 10px;
    font-size: 14px;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.action-buttons .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.btn-success.light {
    color: #28a745;
    background: #e8f5e9;
    border: 1px solid #c8e6c9;
}

.btn-success.light:hover {
    background: #28a745;
    color: #fff;
}

.btn-secondary.light {
    color: #6c757d;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
}

.btn-secondary.light:hover {
    background: #6c757d;
    color: #fff;
}

.btn-danger.light {
    color: #dc3545;
    background: #fde8ea;
    border: 1px solid #fccfd4;
}

.btn-danger.light:hover {
    background: #dc3545;
    color: #fff;
}

.dataTables_wrapper .dataTables_filter input {
    margin-left: 10px;
    padding: 6px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    outline: none;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #4e6bff;
    box-shadow: 0 0 0 0.2rem rgba(78, 107, 255, 0.25);
}

.dataTables_wrapper .dataTables_length select {
    padding: 5px 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    outline: none;
}

/* Responsive */
@media (max-width: 767px) {
    .card-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .card-header > div {
        margin-top: 10px;
    }
    
    .table-responsive {
        overflow-x: auto;
    }
    
    .action-buttons {
        flex-wrap: wrap;
        justify-content: center !important;
    }
    
    .action-buttons .btn {
        margin: 2px;
        padding: 4px 8px;
        font-size: 12px;
    }
}

@media (max-width: 576px) {
    .action-buttons .btn {
        padding: 4px 6px;
        font-size: 11px;
    }
    
    .action-buttons .btn i {
        font-size: 12px;
    }
}

/* SweetAlert2 customization */
.swal2-popup {
    font-family: inherit;
}

.swal2-title {
    font-size: 1.5rem;
}
</style>
<?= $this->endSection() ?>