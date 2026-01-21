<?php
/**
 * User Controller
 * Handles user profile updates
 * Online Auction System
 */
require_once __DIR__ . '/../config/config.php';

/**
 * Update Seller Profile
 */
if (isset($_POST['btn_update_seller_profile'])) {
    requireLogin('seller');
    
    $sellerId = $_SESSION['seller_id'];
    $name = sanitize($_POST['txt_name']);
    $email = sanitize($_POST['txt_email']);
    $phone = sanitize($_POST['txt_phone']);
    $pancard = sanitize($_POST['txt_lic']);
    $password = $_POST['txt_pass'];
    $confirmPassword = $_POST['txt_cpass'];
    
    // Update basic info
    $qry = "UPDATE seller SET 
            username = '$name',
            email = '$email',
            mobileno = '$phone',
            pancardno = '$pancard'
            WHERE userid = $sellerId";
    $result = mysqli_query($conn, $qry);
    
    // Update password if provided
    if (!empty($password)) {
        if ($password === $confirmPassword) {
            $qry = "UPDATE seller SET password = '$password' WHERE userid = $sellerId";
            mysqli_query($conn, $qry);
        } else {
            echo "<script>
                alert('Passwords do not match');
                window.location.replace('" . SITE_URL . "/seller/profile.php');
            </script>";
            exit();
        }
    }
    
    if ($result) {
        $_SESSION['seller_name'] = $name;
        echo "<script>
            alert('Profile updated successfully!');
            window.location.replace('" . SITE_URL . "/seller/profile.php');
        </script>";
    } else {
        echo "<script>
            alert('Failed to update profile');
            window.location.replace('" . SITE_URL . "/seller/profile.php');
        </script>";
    }
    exit();
}

/**
 * Update Buyer Profile
 */
if (isset($_POST['btn_update_buyer_profile'])) {
    requireLogin('buyer');
    
    $buyerId = $_SESSION['buyer_id'];
    $name = sanitize($_POST['txt_name']);
    $email = sanitize($_POST['txt_email']);
    $phone = sanitize($_POST['txt_phone']);
    $license = sanitize($_POST['txt_lic']);
    $password = $_POST['txt_pass'];
    $confirmPassword = $_POST['txt_cpass'];
    
    // Update basic info
    $qry = "UPDATE buyer SET 
            buyername = '$name',
            email = '$email',
            mobileno = '$phone',
            licenseno = '$license'
            WHERE buyerid = $buyerId";
    $result = mysqli_query($conn, $qry);
    
    // Update password if provided
    if (!empty($password)) {
        if ($password === $confirmPassword) {
            $qry = "UPDATE buyer SET password = '$password' WHERE buyerid = $buyerId";
            mysqli_query($conn, $qry);
        } else {
            echo "<script>
                alert('Passwords do not match');
                window.location.replace('" . SITE_URL . "/buyer/profile.php');
            </script>";
            exit();
        }
    }
    
    if ($result) {
        $_SESSION['buyer_name'] = $name;
        echo "<script>
            alert('Profile updated successfully!');
            window.location.replace('" . SITE_URL . "/buyer/profile.php');
        </script>";
    } else {
        echo "<script>
            alert('Failed to update profile');
            window.location.replace('" . SITE_URL . "/buyer/profile.php');
        </script>";
    }
    exit();
}

/**
 * Contact Form Handler
 */
if (isset($_POST['btn_contact'])) {
    $name = sanitize($_POST['txt_name']);
    $email = sanitize($_POST['txt_email']);
    $phone = sanitize($_POST['txt_phone']);
    $message = sanitize($_POST['txt_msg']);
    
    $qry = "INSERT INTO `contact`(`name`, `email`, `phone`, `msg`) 
            VALUES ('$name', '$email', '$phone', '$message')";
    $result = mysqli_query($conn, $qry);
    
    if ($result) {
        echo "<script>
            alert('Message sent successfully!');
            window.location.replace('" . SITE_URL . "/index.php');
        </script>";
    } else {
        echo "<script>
            alert('Failed to send message. Please try again.');
            window.location.replace('" . SITE_URL . "/index.php#contact');
        </script>";
    }
    exit();
}
?>
