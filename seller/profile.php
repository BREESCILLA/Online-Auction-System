<?php
/**
 * Seller - Profile
 * Online Auction System
 */
require_once __DIR__ . '/../includes/header.php';
requireLogin('seller');

$seller_id = $_SESSION['seller_id'];

// Get seller details
$qry = "SELECT * FROM seller WHERE userid = " . $seller_id;
$result = mysqli_query($conn, $qry);
$seller = mysqli_fetch_assoc($result);
?>

<!-- Profile Section -->
<section class="contact py-lg-4 py-md-4 py-sm-3 py-3" id="contact">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3" style="margin-top:5%">
        <h3 class="text-center title mb-3 clr">
            My Profile
            <p style="color:yellow">Update Your Information</p>
        </h3>
        
        <?= displayFlashMessage() ?>
        
        <form action="<?= SITE_URL ?>/controllers/user-controller.php" method="post">
            <div class="row" style="color:#fff; padding-top:2%">
                <div class="col-lg-6 col-md-6 contact-form pb-lg-3 pb-2">
                    <div class="form-group contact-forms">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="txt_name" 
                               value="<?= htmlspecialchars($seller['username']) ?>" required>
                    </div>
                    
                    <div class="form-group contact-forms">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txt_email" 
                               value="<?= htmlspecialchars($seller['email']) ?>" required>
                    </div>
                    
                    <div class="form-group contact-forms">
                        <label>Mobile Number</label>
                        <input type="text" class="form-control" name="txt_phone" 
                               value="<?= htmlspecialchars($seller['mobileno']) ?>" required>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6 contact-form pb-lg-3 pb-2">
                    <div class="form-group contact-forms">
                        <label>PAN Card No</label>
                        <input type="text" class="form-control" name="txt_lic" 
                               value="<?= htmlspecialchars($seller['pancardno'] ?? '') ?>">
                    </div>
                    
                    <div class="form-group contact-forms">
                        <label>New Password (leave blank to keep current)</label>
                        <input type="password" class="form-control" name="txt_pass" placeholder="New Password">
                    </div>
                    
                    <div class="form-group contact-forms">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="txt_cpass" placeholder="Confirm Password">
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <button type="submit" name="btn_update_seller_profile" class="btnn sent-butnn btn-lg">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</section>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
