<?php
/**
 * Main Configuration File
 * Online Auction System
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Site settings
define('SITE_NAME', 'Online Auction System');
define('SITE_URL', '/project_adi');
define('ADMIN_URL', SITE_URL . '/admin');

// File paths
define('ROOT_PATH', dirname(__DIR__));
define('CONFIG_PATH', ROOT_PATH . '/config');
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('ASSETS_PATH', ROOT_PATH . '/assets');
define('UPLOADS_PATH', ROOT_PATH . '/admin/assets/img/products');

// Include database configuration
require_once CONFIG_PATH . '/database.php';

// Error reporting (set to 0 in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Helper function to redirect with message
 */
function redirect($url, $message = '', $type = 'success') {
    if (!empty($message)) {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_type'] = $type;
    }
    header("Location: $url");
    exit();
}

/**
 * Helper function to check if user is logged in
 */
function isLoggedIn($userType = 'buyer') {
    if ($userType === 'buyer') {
        return isset($_SESSION['buyer_id']);
    } elseif ($userType === 'seller') {
        return isset($_SESSION['seller_id']);
    } elseif ($userType === 'admin') {
        return isset($_SESSION['admin_id']);
    }
    return false;
}

/**
 * Helper function to require login
 */
function requireLogin($userType = 'buyer') {
    if (!isLoggedIn($userType)) {
        $loginPage = ($userType === 'seller') ? 'login_seller.php' : 'login_buyer.php';
        echo "<script>
            alert('Please Login To Continue..');
            window.location.replace('" . SITE_URL . "/auth/$loginPage');
        </script>";
        exit();
    }
}

/**
 * Helper function to sanitize input
 */
function sanitize($input) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($input)));
}

/**
 * Helper function to display flash messages
 */
function displayFlashMessage() {
    if (isset($_SESSION['flash_message'])) {
        $type = $_SESSION['flash_type'] ?? 'success';
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message'], $_SESSION['flash_type']);
        return "<div class='alert alert-$type'>$message</div>";
    }
    return '';
}
?>
