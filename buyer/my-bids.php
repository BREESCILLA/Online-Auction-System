<?php
/**
 * Buyer - My Bids
 * Online Auction System
 */
require_once __DIR__ . '/../includes/header.php';
requireLogin('buyer');

$buyer_id = $_SESSION['buyer_id'];
?>

<!-- My Bids Section -->
<section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3" style="margin-top:5%">
        <h3 class="title text-center mb-2">My Bidding History</h3>
        <div class="title-wls-text clr-two text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
            <p>View all your bids and their status</p>
        </div>
        
        <?php
        $qry = "SELECT a.*, p.proname, p.img_1, p.descr 
                FROM auction a 
                JOIN product p ON a.product_id = p.proid 
                WHERE a.buyer_id = " . $buyer_id . " 
                ORDER BY a.auc_id DESC";
        $result = mysqli_query($conn, $qry);
        
        if (mysqli_num_rows($result) > 0):
            foreach ($result as $row):
        ?>
            <div class="row" style="padding:1%; border-bottom:1px solid gray; margin-bottom:15px;">
                <div class="col-lg-2 col-md-3 col-sm-3">
                    <img src="<?= SITE_URL ?>/admin/assets/img/products/<?= $row['img_1'] ?>" 
                         alt="<?= htmlspecialchars($row['proname']) ?>" width="150px">
                </div>
                <div class="col-lg-6 col-md-5 col-sm-5" style="padding-left:3%">
                    <p><b>Product:</b> <?= htmlspecialchars($row['proname']) ?></p>
                    <p><b>Description:</b> <?= htmlspecialchars($row['descr']) ?></p>
                    <p><b>Bid Amount:</b> <i class="fa fa-inr"></i> <?= $row['bid_amount'] ?>/-</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                    <?php
                    $statusClass = 'warning';
                    if ($row['status'] == 'accepted') $statusClass = 'success';
                    elseif ($row['status'] == 'rejected') $statusClass = 'danger';
                    ?>
                    <span class="badge badge-<?= $statusClass ?>" style="font-size:14px; padding:10px;">
                        <?= ucfirst($row['status']) ?>
                    </span>
                </div>
            </div>
        <?php 
            endforeach;
        else:
        ?>
            <div class="alert alert-info text-center">
                You haven't placed any bids yet. 
                <a href="<?= SITE_URL ?>/buyer/products.php">Browse Products</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
