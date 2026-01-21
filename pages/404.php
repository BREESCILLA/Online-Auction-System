<?php
/**
 * 404 Error Page
 * Online Auction System
 */
require_once __DIR__ . '/../includes/header.php';
?>

<section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3" style="margin-top:10%; text-align:center;">
        <h1 style="font-size: 100px; color: #fff;">404</h1>
        <h3 class="title text-center mb-4">Page Not Found</h3>
        <p style="color: #ccc; margin-bottom: 30px;">
            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
        </p>
        <a href="<?= SITE_URL ?>/index.php" class="btn btn-primary btn-lg">
            <i class="fa fa-home"></i> Go to Home
        </a>
    </div>
</section>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
