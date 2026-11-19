<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION FEATURE -->
<div class="container py-5">

    <h2 class="section-title"><?= esc($pagetitle) ?></h2>

    <?php if(!empty($events)): ?>
        <ul class="list-group">

            <?php foreach($events as $row): ?>
                <li class="list-group-item d-flex justify-content-between align-items-start">

                    <div class="ms-2 me-auto">

                        <!-- Clickable Title -->
                        <?php if(!empty($row['pdf_file'])): ?>
                            <a href="<?= base_url('uploads/events/'.$row['pdf_file']) ?>" 
                               target="_blank" 
                               class="fw-semibold text-decoration-none text-dark">
                               <?= esc($row['title']) ?>
                            </a>
                        <?php else: ?>
                            <span class="fw-semibold">
                                <?= esc($row['title']) ?>
                            </span>
                        <?php endif; ?>

                        <!-- Upcoming Badge -->
                        <?php if(strtotime($row['start_date']) >= strtotime(date('Y-m-d'))): ?>
                            <span class="badge bg-success ms-2">Upcoming</span>
                        <?php endif; ?>

                        <br>

                        <small class="text-primary">
                            <?= date('d M Y', strtotime($row['start_date'])) ?>
                            
                            <?php if(!empty($row['end_date'])): ?>
                                - <?= date('d M Y', strtotime($row['end_date'])) ?>
                            <?php endif; ?>
                        </small>

                    </div>

                </li>
            <?php endforeach; ?>

        </ul>
    <?php else: ?>
        <p class="text-center">No Events Available.</p>
    <?php endif; ?>

</div>

<!-- END SECTION FEATURE -->


<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->