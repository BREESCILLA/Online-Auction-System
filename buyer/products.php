<?php
/**
 * Buyer - Browse Products
 * Online Auction System
 */
require_once __DIR__ . '/../includes/header.php';
requireLogin('buyer');
?>

<!-- Products Section -->
<section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3" style="margin-top:5%">
        <h3 class="title text-center mb-2">Bid Products</h3>
        <div class="title-wls-text clr-two text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
            <p>First bid on products, after end of bidding time winner can purchase</p>
        </div>
        <div class="row">
            <?php
            $qry = "SELECT * FROM auction";
            $result_auction = mysqli_query($conn, $qry);
            
            $qry = "SELECT * FROM product";
            $result = mysqli_query($conn, $qry);
            
            if (mysqli_num_rows($result) > 0):
                foreach ($result as $row):
                    $img = trim($row['img_1'], "%20");
                    $img = SITE_URL . "/admin/assets/img/products/" . $img;
            ?>
                <div class="col-lg-3 col-md-6 col-sm-6 about-grid-wthree">
                    <div class="about-fashion-grid text-center">
                        <div class="about-icon mb-md-4 mb-3">
                            <img src="<?= $img ?>" alt="<?= $row['img_1'] ?>" width="200px">
                        </div>
                        <h4 class="pb-3"><?= htmlspecialchars($row['proname']) ?></h4>
                        
                        <?php
                        $isSold = false;
                        mysqli_data_seek($result_auction, 0);
                        foreach ($result_auction as $auction) {
                            if ($auction['status'] == 'accepted' && $auction['product_id'] == $row['proid']) {
                                $isSold = true;
                                break;
                            }
                        }
                        
                        if ($isSold): ?>
                            <p class="alert alert-danger">Sold Out</p>
                        <?php else: ?>
                            <p>
                                <a href="<?= SITE_URL ?>/buyer/view-product.php?id=<?= $row['proid'] ?>">
                                    <button class="form-control">View</button>
                                </a>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php 
                endforeach;
            endif; 
            ?>
        </div>			   
    </div>
</section>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
