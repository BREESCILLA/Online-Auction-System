<?php
/**
 * Product Controller
 * Handles product CRUD operations and bidding
 * Online Auction System
 */
require_once __DIR__ . '/../config/config.php';

/**
 * Helper function for image upload validation
 */
function validateImageUpload($img) {
    $allowedExtensions = array("png", "jpg", "jpeg");
    $fileExtension = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));
    
    if (!file_exists($img["tmp_name"])) {
        return "Please choose an image file to upload.";
    }
    
    if (!in_array($fileExtension, $allowedExtensions)) {
        return "Only PNG and JPEG images are allowed.";
    }
    
    if ($img["size"] > 2000000) {
        return "Image size exceeds 2MB limit.";
    }
    
    return true;
}

/**
 * Add Product (Seller)
 */
if (isset($_POST['btn_add_item'])) {
    requireLogin('seller');
    
    $name = sanitize($_POST['txt_name']);
    $startTime = $_POST['txt_bid_start_time'];
    $endTime = $_POST['txt_bid_end_time'];
    $amount = (int)$_POST['txt_amt'];
    $description = sanitize($_POST['txt_desc']);
    $sellerId = $_SESSION['seller_id'];
    
    // Set timezone
    date_default_timezone_set("Asia/Kolkata");
    $date = date('d-m-Y h:i:sa');
    
    $errMsg = '';
    
    // Validation
    if (empty($name) || empty($startTime) || empty($endTime) || empty($amount) || empty($description)) {
        $errMsg = "Please fill all fields!";
    } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
        $errMsg = "Product name can only contain letters, numbers and spaces";
    } elseif ($startTime == $endTime) {
        $errMsg = "Start and end time cannot be the same";
    } else {
        // Validate images
        $img1Valid = validateImageUpload($_FILES['txt_img_1']);
        $img2Valid = validateImageUpload($_FILES['txt_img_2']);
        $img3Valid = validateImageUpload($_FILES['txt_img_3']);
        
        if ($img1Valid !== true) {
            $errMsg = "Image 1: " . $img1Valid;
        } elseif ($img2Valid !== true) {
            $errMsg = "Image 2: " . $img2Valid;
        } elseif ($img3Valid !== true) {
            $errMsg = "Image 3: " . $img3Valid;
        } else {
            // Upload images
            $uploadPath = __DIR__ . '/../admin/assets/img/products/';
            
            $img1 = time() . '_1_' . basename($_FILES['txt_img_1']['name']);
            $img2 = time() . '_2_' . basename($_FILES['txt_img_2']['name']);
            $img3 = time() . '_3_' . basename($_FILES['txt_img_3']['name']);
            
            move_uploaded_file($_FILES['txt_img_1']["tmp_name"], $uploadPath . $img1);
            move_uploaded_file($_FILES['txt_img_2']["tmp_name"], $uploadPath . $img2);
            move_uploaded_file($_FILES['txt_img_3']["tmp_name"], $uploadPath . $img3);
            
            // Insert product
            $qry = "INSERT INTO `product`(`proname`, `starttime`, `endtime`, `bidamnt`, `descr`, `img_1`, `img_2`, `img_3`, `seller_id`, `add_date`) 
                    VALUES ('$name', '$startTime', '$endTime', $amount, '$description', '$img1', '$img2', '$img3', $sellerId, '$date')";
            
            $result = mysqli_query($conn, $qry);
            
            if ($result) {
                $errMsg = "Product added successfully!";
            } else {
                $errMsg = "Failed to add product. Please try again.";
            }
        }
    }
    
    echo "<script>
        alert('$errMsg');
        window.location.replace('" . SITE_URL . "/seller/add-product.php');
    </script>";
    exit();
}

/**
 * Delete Product (Seller)
 */
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    requireLogin('seller');
    
    $productId = (int)$_GET['id'];
    $sellerId = $_SESSION['seller_id'];
    
    // Verify ownership
    $checkQry = "SELECT * FROM product WHERE proid = $productId AND seller_id = $sellerId";
    $checkResult = mysqli_query($conn, $checkQry);
    
    if (mysqli_num_rows($checkResult) > 0) {
        // Delete product
        $qry = "DELETE FROM product WHERE proid = $productId";
        mysqli_query($conn, $qry);
        
        // Delete associated auctions
        $qry = "DELETE FROM auction WHERE product_id = $productId";
        mysqli_query($conn, $qry);
        
        echo "<script>
            alert('Product deleted successfully');
            window.location.replace('" . SITE_URL . "/seller/products.php');
        </script>";
    } else {
        echo "<script>
            alert('Unauthorized action');
            window.location.replace('" . SITE_URL . "/seller/products.php');
        </script>";
    }
    exit();
}

/**
 * Place Bid (Buyer)
 */
if (isset($_POST['btn_buyers_bid'])) {
    requireLogin('buyer');
    
    $productId = (int)$_POST['txt_proid'];
    $oldAmount = (int)$_POST['txt_old_rate'];
    $bidAmount = (int)$_POST['txt_bid_amt'];
    $buyerId = $_SESSION['buyer_id'];
    
    date_default_timezone_set("Asia/Kolkata");
    $date = date('d-m-Y h:i:sa');
    
    if ($bidAmount > $oldAmount) {
        $qry = "INSERT INTO `auction`(`product_id`, `buyer_id`, `bid_amount`, `bid_time`, `status`) 
                VALUES ($productId, $buyerId, $bidAmount, '$date', 'pending')";
        $result = mysqli_query($conn, $qry);
        
        echo "<script>
            alert('Your bid has been submitted successfully!');
            window.location.replace('" . SITE_URL . "/buyer/products.php');
        </script>";
    } else {
        echo "<script>
            alert('Bid amount must be higher than the starting price');
            window.location.replace('" . SITE_URL . "/buyer/view-product.php?id=$productId');
        </script>";
    }
    exit();
}

/**
 * Accept Bid Request (Seller)
 */
if (isset($_POST['btn_req_submit'])) {
    requireLogin('seller');
    
    $auctionId = (int)$_POST['txt_id'];
    
    $qry = "UPDATE auction SET status = 'accepted' WHERE auc_id = $auctionId";
    $result = mysqli_query($conn, $qry);
    
    if ($result) {
        echo "<script>
            alert('Bid request accepted! SMS will be sent to customer.');
            window.location.replace('" . SITE_URL . "/seller/bid-requests.php');
        </script>";
    } else {
        echo "<script>
            alert('Failed to accept bid request');
            window.location.replace('" . SITE_URL . "/seller/bid-requests.php');
        </script>";
    }
    exit();
}

/**
 * Reject Bid Request (Seller)
 */
if (isset($_POST['btn_req_reject'])) {
    requireLogin('seller');
    
    $auctionId = (int)$_POST['txt_id'];
    
    $qry = "UPDATE auction SET status = 'rejected' WHERE auc_id = $auctionId";
    $result = mysqli_query($conn, $qry);
    
    if ($result) {
        echo "<script>
            alert('Bid request rejected');
            window.location.replace('" . SITE_URL . "/seller/bid-requests.php');
        </script>";
    } else {
        echo "<script>
            alert('Failed to reject bid request');
            window.location.replace('" . SITE_URL . "/seller/bid-requests.php');
        </script>";
    }
    exit();
}
?>
