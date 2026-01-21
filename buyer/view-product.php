<?php
/**
 * Buyer - View Product Details
 * Online Auction System
 */
require_once __DIR__ . '/../includes/header.php';
requireLogin('buyer');

$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$product_id) {
    redirect(SITE_URL . '/buyer/products.php', 'Invalid product', 'danger');
}
?>

<!-- Product Details Section -->
<section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3" style="margin-top:10%">
        <?php
        $qry = "SELECT * FROM product WHERE proid = " . $product_id;
        $result = mysqli_query($conn, $qry);
        
        if (mysqli_num_rows($result) > 0):
            foreach ($result as $row):
        ?>
            <div class="row" style="padding:1%; border-bottom:1px solid gray;">
                <div class="col-lg-3 col-md-3 col-sm-3 about-grid-wthree">
                    <img src="<?= SITE_URL ?>/admin/assets/img/products/<?= $row['img_1'] ?>" 
                         alt="<?= htmlspecialchars($row['proname']) ?>" width="200px">
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 about-grid-wthree">
                    <img src="<?= SITE_URL ?>/admin/assets/img/products/<?= $row['img_2'] ?>" 
                         alt="<?= htmlspecialchars($row['proname']) ?>" width="100px">
                    <p></p>
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
                <div class="col-lg-3 col-md-3 col-sm-3 about-grid-wthree">
                    <form action="<?= SITE_URL ?>/controllers/product-controller.php" method="post">
                        <input type="hidden" name="txt_proid" value="<?= $row['proid'] ?>">
                        <input type="hidden" name="txt_old_rate" value="<?= $row['bidamnt'] ?>">
                        
                        <label>Enter Increment Amount:</label>
                        <input type="number" name="txt_bid_amt" class="form-control" placeholder="Enter amount" required>
                        <br>
                        <input type="submit" name="btn_buyers_bid" class="btn btn-success" value="Place Bid">
                    </form>
                </div>
            </div>
        <?php 
            endforeach;
        else:
        ?>
            <div class="alert alert-warning">Product not found.</div>
        <?php endif; ?>
    </div>
</section>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
