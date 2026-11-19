<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION FEATURE -->
<div class="container py-5">

    <h2 class="section-title"><?= esc($pagetitle) ?></h2>

    <?php if(!empty($news)): ?>
        <ul class="list-group">

            <?php foreach($news as $row): ?>
                <li class="list-group-item d-flex justify-content-between align-items-start">

                    <div class="ms-2 me-auto">

                        <!-- Clickable Title -->
                        <?php if($row['pdf_file']): ?>
                            <a href="<?= base_url('uploads/news/'.$row['pdf_file']) ?>" 
                               target="_blank" 
                               class="fw-semibold text-decoration-none text-dark">
                               <?= esc($row['title']) ?>
                            </a>
                        <?php else: ?>
                            <?= esc($row['title']) ?>
                        <?php endif; ?>

                        <!-- New Badge -->
                        <?php if($row['is_new'] == 1): ?>
                            <span class="badge bg-danger text-white ms-2">New</span>
                        <?php endif; ?>

                        <br>

                        <small class="text-primary">
                            <?= esc($row['department']) ?> | 
                            <?= date('d/m/Y', strtotime($row['publish_date'])) ?>
                        </small>

                    </div>

                </li>
            <?php endforeach; ?>

        </ul>
    <?php else: ?>
        <p class="text-center">No news available.</p>
    <?php endif; ?>

</div>

<!-- END SECTION FEATURE -->


<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->