<?php
/**
 * Seller - Bid Requests
 * Online Auction System
 */
require_once __DIR__ . '/../includes/header.php';
requireLogin('seller');

$seller_id = $_SESSION['seller_id'];
?>

<!-- Bid Requests Section -->
<section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3" style="margin-top:5%">
        <h3 class="title text-center mb-2">Bid Requests</h3>
        <div class="title-wls-text clr-two text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
            <p>Accept or reject bids on your products</p>
        </div>
        
        <?= displayFlashMessage() ?>
        
        <?php
        $qry = "SELECT a.*, p.proname, p.img_1, p.bidamnt as start_price, b.buyername, b.email as buyer_email, b.mobileno as buyer_phone 
                FROM auction a 
                JOIN product p ON a.product_id = p.proid 
                JOIN buyer b ON a.buyer_id = b.buyerid 
                WHERE p.seller_id = " . $seller_id . " 
                ORDER BY a.auc_id DESC";
        $result = mysqli_query($conn, $qry);
        
        if (mysqli_num_rows($result) > 0):
            foreach ($result as $row):
        ?>
            <div class="row" style="padding:2%; border-bottom:1px solid gray; margin-bottom:15px; background:rgba(255,255,255,0.1); border-radius:10px;">
                <div class="col-lg-2 col-md-3 col-sm-3">
                    <img src="<?= SITE_URL ?>/admin/assets/img/products/<?= $row['img_1'] ?>" 
                         alt="<?= htmlspecialchars($row['proname']) ?>" width="150px">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-left:2%">
                    <p><b>Product:</b> <?= htmlspecialchars($row['proname']) ?></p>
                    <p><b>Starting Price:</b> <i class="fa fa-inr"></i> <?= $row['start_price'] ?>/-</p>
                    <p><b>Bid Amount:</b> <i class="fa fa-inr"></i> <?= $row['bid_amount'] ?>/-</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <p><b>Buyer:</b> <?= htmlspecialchars($row['buyername']) ?></p>
                    <p><b>Email:</b> <?= htmlspecialchars($row['buyer_email']) ?></p>
                    <p><b>Phone:</b> <?= htmlspecialchars($row['buyer_phone']) ?></p>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-2 text-center">
                    <?php if ($row['status'] == 'pending'): ?>
                        <form action="<?= SITE_URL ?>/controllers/product-controller.php" method="post" style="display:inline;">
                            <input type="hidden" name="txt_id" value="<?= $row['auc_id'] ?>">
                            <button type="submit" name="btn_req_submit" class="btn btn-success mb-2">
                                <i class="fa fa-check"></i> Accept
                            </button>
                        </form>
                        <form action="<?= SITE_URL ?>/controllers/product-controller.php" method="post" style="display:inline;">
                            <input type="hidden" name="txt_id" value="<?= $row['auc_id'] ?>">
                            <button type="submit" name="btn_req_reject" class="btn btn-danger">
                                <i class="fa fa-times"></i> Reject
                            </button>
                        </form>
                    <?php else: ?>
                        <?php
                        $statusClass = 'warning';
                        if ($row['status'] == 'accepted') $statusClass = 'success';
                        elseif ($row['status'] == 'rejected') $statusClass = 'danger';
                        ?>
                        <span class="badge badge-<?= $statusClass ?>" style="font-size:14px; padding:10px;">
                            <?= ucfirst($row['status']) ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        <?php 
            endforeach;
        else:
        ?>
            <div class="alert alert-info text-center">
                No bid requests yet. Wait for buyers to bid on your products.
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
