<?php
/**
 * Logout Handler
 * Online Auction System
 */
require_once __DIR__ . '/../config/config.php';

$type = isset($_GET['type']) ? $_GET['type'] : 'buyer';

// Destroy session based on user type
if ($type === 'seller') {
    unset($_SESSION['seller_id']);
    unset($_SESSION['seller_name']);
    $redirectUrl = SITE_URL . '/auth/login-seller.php';
} elseif ($type === 'admin') {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    $redirectUrl = SITE_URL . '/admin/login.php';
} else {
    unset($_SESSION['buyer_id']);
    unset($_SESSION['buyer_name']);
    $redirectUrl = SITE_URL . '/auth/login-buyer.php';
}

// Destroy entire session if no other users logged in
if (!isset($_SESSION['buyer_id']) && !isset($_SESSION['seller_id']) && !isset($_SESSION['admin_id'])) {
    session_destroy();
}

header("Location: $redirectUrl");
exit();
?>
