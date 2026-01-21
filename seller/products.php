<?php
/**
 * Seller - My Products
 * Online Auction System
 */
require_once __DIR__ . '/../includes/header.php';
requireLogin('seller');

$seller_id = $_SESSION['seller_id'];
?>

<!-- My Products Section -->
<section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3" style="margin-top:5%">
        <h3 class="title text-center mb-2">My Products</h3>
        <div class="title-wls-text clr-two text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
            <p>Manage your listed products</p>
        </div>
        
        <?= displayFlashMessage() ?>
        
        <?php
        $qry = "SELECT * FROM product WHERE seller_id = " . $seller_id . " ORDER BY proid DESC";
        $result = mysqli_query($conn, $qry);
        
        if (mysqli_num_rows($result) > 0):
            foreach ($result as $row):
        ?>
            <div class="row" style="padding:1%; border-bottom:1px solid gray; margin-bottom:15px;">
                <div class="col-lg-3 col-md-3 col-sm-3 about-grid-wthree">
                    <img src="<?= SITE_URL ?>/admin/assets/img/products/<?= $row['img_1'] ?>" 
                         alt="<?= htmlspecialchars($row['proname']) ?>" width="200px">
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 about-grid-wthree">
                    <img src="<?= SITE_URL ?>/admin/assets/img/products/<?= $row['img_2'] ?>" 
                         alt="<?= htmlspecialchars($row['proname']) ?>" width="100px">
                    <br><br>
                    <img src="<?= SITE_URL ?>/admin/assets/img/products/<?= $row['img_3'] ?>" 
                         alt="<?= htmlspecialchars($row['proname']) ?>" width="100px">
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 about-grid-wthree" style="padding-left:5%">
                    <p><b>Item Name:</b> <?= htmlspecialchars($row['proname']) ?></p>
                    <p><b>Description:</b> <?= htmlspecialchars($row['descr']) ?></p>
                    <p><b>Start Bid Rate:</b> <i class="fa fa-inr"></i> <?= $row['bidamnt'] ?>/-</p>
                    <p><b>Date:</b> <?= $row['add_date'] ?></p>
                    <p><b>Start Time:</b> <?= $row['starttime'] ?></p>
                    <p><b>End Time:</b> <?= $row['endtime'] ?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 about-grid-wthree text-center">
                    <a href="<?= SITE_URL ?>/controllers/product-controller.php?action=delete&id=<?= $row['proid'] ?>" 
                       class="btn btn-danger" 
                       onclick="return confirm('Are you sure you want to delete this product?')">
                        <i class="fa fa-trash"></i> Delete
                    </a>
                </div>
            </div>
        <?php 
            endforeach;
        else:
        ?>
            <div class="alert alert-info text-center">
                You haven't listed any products yet. 
                <a href="<?= SITE_URL ?>/seller/add-product.php">Add a Product</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
