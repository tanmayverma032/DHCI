<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<!-- =========================
     CUSTOM VIDEO GALLERY CSS
========================= -->
<style>
.video_section {
    padding: 60px 0;
    background: #f8f9fb;
}

.gallery-nav-tabs {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 40px;
}

.gallery-nav-btn {
    padding: 10px 28px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid #0389c6;
    color: #0389c6;
    background: #fff;
}

.gallery-nav-btn.active,
.gallery-nav-btn:hover {
    background: #0389c6;
    color: #fff;
    box-shadow: 0 4px 15px rgba(3, 137, 198, 0.3);
}

.video_grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 25px;
    list-style: none;
    padding: 0;
    margin: 0;
}

.video_card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.video_card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
}

.video_thumb_wrap {
    position: relative;
    width: 100%;
    height: 200px;
    background: #000;
    overflow: hidden;
    cursor: pointer;
}

.video_thumb_wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.video_card:hover .video_thumb_wrap img {
    transform: scale(1.05);
}

.video_play_btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    background: rgba(220, 53, 69, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 24px;
    box-shadow: 0 0 20px rgba(220, 53, 69, 0.6);
    transition: transform 0.3s ease, background 0.3s ease;
}

.video_card:hover .video_play_btn {
    transform: translate(-50%, -50%) scale(1.15);
    background: #dc3545;
}

.video_content {
    padding: 16px 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.video_title {
    font-size: 16px;
    font-weight: 600;
    color: #1a202c;
    margin: 0 0 10px 0;
    line-height: 1.4;
}

.video_badge {
    display: inline-block;
    font-size: 12px;
    font-weight: 600;
    color: #0389c6;
}

.no_videos {
    background: #fff;
    border-radius: 12px;
    padding: 50px 30px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

.no_videos i {
    font-size: 50px;
    color: #0389c6;
    margin-bottom: 20px;
}

/* Modal styling */
#videoModal .modal-dialog {
    max-width: 800px;
}

#videoModal .modal-content {
    background: #000;
    border: none;
    border-radius: 12px;
    overflow: hidden;
}

#videoModal .modal-header {
    border-bottom: 1px solid #333;
    padding: 12px 20px;
}

#videoModal .modal-title {
    color: #fff;
    font-size: 16px;
    font-weight: 600;
}

.video-container {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 ratio */
    height: 0;
    overflow: hidden;
}

.video-container iframe,
.video-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
</style>

<!-- START SECTION GALLERY -->
<section class="video_section">
    <div class="container">

        <!-- Navigation Tabs -->
        <div class="gallery-nav-tabs">
            <a href="<?= base_url('gallery') ?>" class="gallery-nav-btn">
                <i class="fas fa-camera me-1"></i> Photo Gallery
            </a>
            <a href="<?= base_url('videogallery') ?>" class="gallery-nav-btn active">
                <i class="fas fa-video me-1"></i> Video Gallery
            </a>
        </div>

        <?php if (!empty($videos)): ?>
            <ul class="video_grid">
                <?php foreach ($videos as $row): ?>
                    <?php
                        $title = !empty($row['title']) ? esc($row['title']) : 'DHCI Video';
                        $videoUrl = $row['video_url'] ?? '';
                        $imageFile = $row['image'] ?? '';

                        $ytId = '';
                        $ytThumb = '';
                        $isUploadedVideo = false;
                        $uploadedVideoUrl = '';

                        // Check YouTube
                        if (!empty($videoUrl) && preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $videoUrl, $matches)) {
                            $ytId = $matches[1];
                            $ytThumb = 'https://img.youtube.com/vi/' . $ytId . '/hqdefault.jpg';
                        } elseif (!empty($imageFile) && preg_match('/\.(mp4|webm|mov)$/i', $imageFile)) {
                            $isUploadedVideo = true;
                            $uploadedVideoUrl = base_url('uploads/gallery/' . $imageFile);
                        }
                    ?>
                    <li>
                        <div class="video_card">
                            <div class="video_thumb_wrap" 
                                 onclick="openVideoModal('<?= esc($title) ?>', '<?= $ytId ? 'https://www.youtube.com/embed/' . $ytId . '?autoplay=1' : '' ?>', '<?= $uploadedVideoUrl ?>')">
                                <?php if (!empty($ytThumb)): ?>
                                    <img src="<?= $ytThumb ?>" alt="<?= esc($title) ?>">
                                <?php elseif (!empty($imageFile) && !preg_match('/\.(mp4|webm|mov)$/i', $imageFile)): ?>
                                    <img src="<?= base_url('uploads/gallery/' . $imageFile) ?>" alt="<?= esc($title) ?>">
                                <?php else: ?>
                                    <div class="d-flex align-items-center justify-content-center h-100 bg-dark text-white">
                                        <i class="fas fa-play-circle fa-3x text-danger"></i>
                                    </div>
                                <?php endif; ?>
                                <span class="video_play_btn"><i class="fas fa-play"></i></span>
                            </div>

                            <div class="video_content">
                                <h5 class="video_title"><?= $title ?></h5>
                                <div>
                                    <span class="video_badge">
                                        <i class="fas fa-play-circle me-1"></i> Watch Video
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div class="no_videos">
                <i class="fas fa-film"></i>
                <h4 class="font-weight-bold mb-2">Our Video Gallery is Coming Soon!</h4>
                <p class="text-muted mb-4">We are actively preparing new educational and campus videos. In the meantime, explore our YouTube channel.</p>
                <a href="https://www.youtube.com/channel/UCJWDFZ4kfJB4UujhLT_wBHA" target="_blank" class="btn btn-danger">
                    <i class="fab fa-youtube me-2"></i> Visit Our Official YouTube Channel
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>
<!-- END SECTION GALLERY -->

<!-- Video Modal Player -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalTitle">Video Player</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="closeVideoModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="video-container" id="videoPlayerBox">
                    <!-- Dynamic iframe or video element injected here -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openVideoModal(title, embedUrl, directUrl) {
    var titleEl = document.getElementById('videoModalTitle');
    var box = document.getElementById('videoPlayerBox');
    if (titleEl) titleEl.innerText = title;

    if (embedUrl) {
        box.innerHTML = '<iframe src="' + embedUrl + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    } else if (directUrl) {
        box.innerHTML = '<video controls autoplay playsinline style="width:100%; height:100%;"><source src="' + directUrl + '" type="video/mp4">Your browser does not support HTML5 video.</video>';
    }

    if (window.jQuery) {
        $('#videoModal').modal('show');
    }
}

function closeVideoModal() {
    var box = document.getElementById('videoPlayerBox');
    if (box) box.innerHTML = '';
    if (window.jQuery) {
        $('#videoModal').modal('hide');
    }
}

// Clear video when modal is closed via backdrop
document.addEventListener('DOMContentLoaded', function () {
    if (window.jQuery) {
        $('#videoModal').on('hidden.bs.modal', function () {
            closeVideoModal();
        });
    }
});
</script>

<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->
