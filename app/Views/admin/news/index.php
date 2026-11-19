

<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- ===== Card Header: Tabs ===== -->
                    <div class="card-header">
                        <div class="default-tab">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link <?= empty($editdata) ? 'active' : '' ?>" data-bs-toggle="tab" href="#list">
                                        News List
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= !empty($editdata) ? 'active' : '' ?>" data-bs-toggle="tab" href="#add">
                                        <?= !empty($editdata) ? 'Edit News' : 'Add News' ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- ===== Card Body: Tabs Content ===== -->
                    <div class="card-body">
                        <div class="tab-content">

                            <!-- ===== LIST TAB ===== -->
            <div class="tab-pane fade <?= empty($editdata) ? 'show active' : '' ?>" id="list">

    <div class="card-body">
        <div class="table-responsive">

            <table id="example3"
                   class="display table header-border table-hover verticle-middle"
                   style="min-width: 845px">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>PDF</th>
                        <th>New</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php if(!empty($news)): ?>
                    <?php foreach($news as $row): ?>
                        <tr id="row_<?= $row['id'] ?>">

                            <td><?= $row['id'] ?></td>

                            <td>
                                <strong><?= esc($row['title']) ?></strong>
                            </td>

                            <td><?= esc($row['department']) ?></td>

                            <td><?= date('d-m-Y', strtotime($row['publish_date'])) ?></td>

                            <td>
                                <?php if($row['pdf_file']): ?>
                                    <a href="<?= base_url('uploads/news/'.$row['pdf_file']) ?>" target="_blank">
                                        <span class="badge badge-success light">View</span>
                                    </a>
                                <?php else: ?>
                                    <span class="badge badge-warning light">N/A</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if($row['is_new']==1): ?>
                                    <span class="badge badge-danger light">New</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary light">Old</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="btn-group">

                                    <button type="button"
                                            class="btn btn-danger dropdown-toggle"
                                            data-bs-toggle="dropdown">
                                        Action
                                    </button>

                                    <ul class="dropdown-menu">

                                        <!-- EDIT -->
                                        <li>
                                            <a href="<?= base_url('admin/news/edit/'.$row['id']) ?>"
                                               class="dropdown-item">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        </li>

                                        <!-- DELETE -->
                                        <li>
                                            <a href="<?= base_url('admin/news/delete/'.$row['id']) ?>"
                                               onclick="return confirm('Are you sure you want to delete this news?')"
                                               class="dropdown-item">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </li>

                                    </ul>

                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No News Found</td>
                    </tr>
                <?php endif; ?>

                </tbody>

            </table>

        </div>
    </div>

</div>




                            <!-- ===== ADD / EDIT TAB ===== -->
                            <div class="tab-pane fade <?= !empty($editdata) ? 'show active' : '' ?>" id="add">

                                <form method="post"
                                      action="<?= !empty($editdata)
                                            ? base_url('admin/news/update/'.$editdata['id'])
                                            : base_url('admin/news/store') ?>"
                                      enctype="multipart/form-data">
                                
                                <?= csrf_field(); ?>
                                
                                <div class="row">
                                
                                    <div class="col-md-6 mb-3">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control"
                                        value="<?= !empty($editdata) ? esc($editdata['title']) : '' ?>" required>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label>Description</label>
                                        <input type="text" name="department" class="form-control"
                                        value="<?= !empty($editdata) ? esc($editdata['department']) : '' ?>" required>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label>Publish Date</label>
                                        <input type="date" name="publish_date" class="form-control"
                                        value="<?= !empty($editdata) ? date('Y-m-d',strtotime($editdata['publish_date'])) : '' ?>" required>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label>Upload PDF</label>
                                        <input type="file" name="pdf_file" class="form-control">
                                
                                        <?php if(!empty($editdata) && $editdata['pdf_file']): ?>
                                            <a href="<?= base_url('uploads/news/'.$editdata['pdf_file']) ?>" target="_blank">
                                                View Existing PDF
                                            </a>
                                            <input type="hidden" name="old_pdf" value="<?= $editdata['pdf_file'] ?>">
                                        <?php endif; ?>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label>New Badge</label>
                                        <select name="is_new" class="form-control">
                                            <option value="1" <?= (!empty($editdata) && $editdata['is_new']==1)?'selected':'' ?>>Yes</option>
                                            <option value="0" <?= (!empty($editdata) && $editdata['is_new']==0)?'selected':'' ?>>No</option>
                                        </select>
                                    </div>
                                
                                </div>
                                
                                <button class="btn btn-primary">
                                <?= !empty($editdata) ? 'Update News' : 'Add News' ?>
                                </button>
                                
                                </form>

                                </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
