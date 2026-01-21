<?php
/**
 * Seller - Add Product
 * Online Auction System
 */
require_once __DIR__ . '/../includes/header.php';
requireLogin('seller');
?>

<!-- Add Product Form -->
<section class="contact py-lg-4 py-md-4 py-sm-3 py-3" id="contact">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="text-center title mb-3 clr" style="padding-top:0%">
            Sell Item   
            <p style="color:yellow">Add Your Product</p>
        </h3>
        
        <?= displayFlashMessage() ?>
        
        <form action="<?= SITE_URL ?>/controllers/product-controller.php" method="post" enctype="multipart/form-data">
            <div class="row" style="color:#fff; padding-top:0%">
                <!-- Left Column -->
                <div class="col-lg-6 col-md-6 contact-form pb-lg-3 pb-2">
                    <div class="form-group contact-forms">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="txt_name" 
                               placeholder="Product Name" required tabindex="10">
                    </div>

                    <div class="form-group contact-forms">
                        <label>Starting Bid Amount</label>
                        <input type="number" class="form-control" name="txt_amt" 
                               placeholder="Starting Bid Amount" required tabindex="12">
                    </div>
                    
                    <div class="form-group contact-forms">
                        <label>Bid Start Time</label>
                        <input type="time" class="form-control" name="txt_bid_start_time" 
                               placeholder="Start Time" required tabindex="14" min="09:00" max="18:00">
                        <small class="text-muted">Bidding time must be between 9am to 6pm</small>
                    </div>

                    <div class="form-group contact-forms">
                        <label>Bid End Time</label>
                        <input type="time" class="form-control" name="txt_bid_end_time" 
                               placeholder="End Time" required tabindex="16">
                    </div>
                </div>
                
                <!-- Right Column -->
                <div class="col-lg-6 col-md-6 contact-form pb-lg-3 pb-2">
                    <div class="form-group contact-forms">
                        <label>Upload Product Images (3 images required)</label>
                        <input type="file" class="form-control" name="txt_img_1" 
                               accept="image/*" required tabindex="11">
                    </div>
                    
                    <div class="form-group contact-forms">
                        <input type="file" class="form-control" name="txt_img_2" 
                               accept="image/*" required tabindex="13">
                    </div>
                    
                    <div class="form-group contact-forms">
                        <input type="file" class="form-control" name="txt_img_3" 
                               accept="image/*" required tabindex="15">
                    </div>
                    
                    <div class="form-group contact-forms">
                        <label>Description</label>
                        <textarea class="form-control" style="padding:2%" 
                                  placeholder="Product Description..." 
                                  name="txt_desc" required tabindex="17" rows="4"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <button type="submit" name="btn_add_item" class="btnn sent-butnn btn-lg" tabindex="18">
                    Add Item
                </button>
            </div>
        </form>
    </div>
</section>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
