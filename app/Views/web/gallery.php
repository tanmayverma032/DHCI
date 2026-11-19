<!-- START HEADER -->
<?php include "inc/header.php"; ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<?php include "inc/headtitle.php"; ?>
<!-- END SECTION BREADCRUMB -->

<!-- =========================
     CUSTOM GALLERY CSS
========================= -->
<style>
/* Section Spacing */
.gallery_section {
    padding: 60px 0;
    background: #f8f9fb;
}

/* Grid Layout */
.gallery_grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 25px;
    padding: 0;
    margin: 0;
    list-style: none;
}

/* Gallery Card */
.gallery_card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    position: relative;
    transition: all 0.35s ease;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.gallery_card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}

/* Image Wrapper */
.gallery_image {
    position: relative;
    overflow: hidden;
}

/* Image Style */
.gallery_image img {
    width: 100%;
    height: 240px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gallery_card:hover .gallery_image img {
    transform: scale(1.08);
}

/* Overlay */
.gallery_overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.55);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: 0.4s ease;
}

.gallery_card:hover .gallery_overlay {
    opacity: 1;
}

/* Popup Button */
.popup_btn {
    width: 55px;
    height: 55px;
    background: #ffffff;
    color: #000;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 22px;
    transition: 0.3s ease;
}

.popup_btn:hover {
    background: #ff6b00;
    color: #fff;
    transform: rotate(10deg);
}

/* Content */
.gallery_content {
    padding: 18px 15px;
    text-align: center;
}

/* Title */
.gallery_title {
    font-size: 18px;
    font-weight: 600;
    color: #222;
    margin: 0;
    line-height: 1.5;
    min-height: 54px;
}

/* Empty Message */
.no_gallery {
    text-align: center;
    font-size: 18px;
    color: #777;
    padding: 40px 0;
}

/* Responsive */
@media (max-width: 768px) {
    .gallery_image img {
        height: 200px;
    }

    .gallery_title {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .gallery_section {
        padding: 40px 0;
    }

    .gallery_image img {
        height: 180px;
    }
}

/* Grid Layout */
.gallery_grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr); /* 6 images in one row */
    gap: 15px;
    padding: 0;
    margin: 0;
    list-style: none;
}

/* Gallery Card */
.gallery_card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    transition: all 0.3s ease;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
}

/* Image */
.gallery_image img {
    width: 100%;
    height: 140px; /* Smaller image size */
    object-fit: cover;
    transition: transform 0.4s ease;
}

.gallery_card:hover .gallery_image img {
    transform: scale(1.05);
}

/* Content */
.gallery_content {
    padding: 10px;
    text-align: center;
}

/* Title */
.gallery_title {
    font-size: 14px;
    font-weight: 600;
    color: #222;
    margin: 0;
    line-height: 1.4;
    min-height: 40px;
}

/* Responsive */
@media (max-width: 1200px) {
    .gallery_grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (max-width: 768px) {
    .gallery_grid {
        grid-template-columns: repeat(3, 1fr);
    }

    .gallery_image img {
        height: 120px;
    }
}

@media (max-width: 480px) {
    .gallery_grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .gallery_image img {
        height: 100px;
    }
}
</style>

<!-- START SECTION GALLERY -->
<section class="gallery_section">
    <div class="container">

        <?php if (!empty($gallery)): ?>

            <ul class="gallery_grid">

                <?php foreach ($gallery as $row): ?>

                    <li>
                        <div class="gallery_card">

                            <!-- Image -->
                            <div class="gallery_image">

                                <img src="<?php echo base_url('uploads/gallery/' . $row['image']); ?>"
                                     alt="<?php echo esc($row['alt']); ?>">

                                <!-- Overlay -->
                                <div class="gallery_overlay">
                                    <a href="<?php echo base_url('uploads/gallery/' . $row['image']); ?>"
                                       class="popup_btn image_popup">

                                        <i class="ion-image"></i>

                                    </a>
                                </div>

                            </div>

                            <!-- Content -->
                            <div class="gallery_content">
                                <h5 class="gallery_title">
                                    <?php echo esc($row['title']); ?>
                                </h5>
                            </div>

                        </div>
                    </li>

                <?php endforeach; ?>

            </ul>

        <?php else: ?>

            <div class="no_gallery">
                No gallery images available.
            </div>

        <?php endif; ?>

    </div>
</section>
<!-- END SECTION GALLERY -->

<!-- START FOOTER -->
<?php include "inc/footer.php"; ?>
<!-- END FOOTER -->