<?php
/**
 * Authentication Controller
 * Handles login, signup, and password reset
 * Online Auction System
 */
require_once __DIR__ . '/../config/config.php';

/**
 * Buyer Login
 */
if (isset($_POST['btn_buyer_login'])) {
    $username = sanitize($_POST['txt_username']);
    $password = $_POST['txt_pass'];

    $qry = "SELECT * FROM `buyer` WHERE (buyername='$username' OR email='$username') AND password='$password'";
    $result = mysqli_query($conn, $qry);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['buyer_id'] = $row['buyerid'];
        $_SESSION['buyer_name'] = $row['buyername'];
        
        echo "<script>
            alert('Welcome to Online Auction!');
            window.location.replace('" . SITE_URL . "/buyer/products.php');
        </script>";
    } else {
        echo "<script>
            alert('Invalid Email/Password');
            window.location.replace('" . SITE_URL . "/auth/login-buyer.php');
        </script>";
    }
    exit();
}

/**
 * Seller Login
 */
if (isset($_POST['btn_seller_login'])) {
    $username = sanitize($_POST['txt_username']);
    $password = $_POST['txt_pass'];

    $qry = "SELECT * FROM `seller` WHERE (username='$username' OR email='$username') AND password='$password'";
    $result = mysqli_query($conn, $qry);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['seller_id'] = $row['userid'];
        $_SESSION['seller_name'] = $row['username'];
        
        echo "<script>
            alert('Welcome to Online Auction!');
            window.location.replace('" . SITE_URL . "/seller/add-product.php');
        </script>";
    } else {
        echo "<script>
            alert('Invalid Email/Password');
            window.location.replace('" . SITE_URL . "/auth/login-seller.php');
        </script>";
    }
    exit();
}

/**
 * Buyer Signup
 */
if (isset($_POST['btn_buyer_signup'])) {
    $username = sanitize($_POST['txt_username']);
    $license = sanitize($_POST['txt_licenseno']);
    $email = sanitize($_POST['txt_email']);
    $phone = sanitize($_POST['txt_phone']);
    $password = $_POST['txt_pass'];
    $confirmPassword = $_POST['txt_cpass'];

    $errMsg = "";
    
    if (empty($username) || empty($license) || empty($email) || empty($phone) || empty($password) || empty($confirmPassword)) {
        $errMsg = "Please fill all fields";
    } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $username)) {
        $errMsg = "Name must have letters and spaces only";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errMsg = "Invalid email format";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errMsg = "Please enter a valid 10-digit mobile number";
    } elseif ($password !== $confirmPassword) {
        $errMsg = "Passwords do not match";
    } else {
        // Check if user already exists
        $checkQry = "SELECT * FROM buyer WHERE email = '$email' OR buyername = '$username'";
        $checkResult = mysqli_query($conn, $checkQry);
        
        if (mysqli_num_rows($checkResult) > 0) {
            $errMsg = "Username or email already exists";
        } else {
            $qry = "INSERT INTO `buyer`(`buyername`, `password`, `email`, `licenseno`, `mobileno`) 
                    VALUES ('$username', '$password', '$email', '$license', '$phone')";
            $result = mysqli_query($conn, $qry);
            
            if ($result) {
                echo "<script>
                    alert('Account created successfully! Please login.');
                    window.location.replace('" . SITE_URL . "/auth/login-buyer.php');
                </script>";
                exit();
            } else {
                $errMsg = "Registration failed. Please try again.";
            }
        }
    }
    
    echo "<script>
        alert('$errMsg');
        window.location.replace('" . SITE_URL . "/auth/signup-buyer.php');
    </script>";
    exit();
}

/**
 * Seller Signup
 */
if (isset($_POST['btn_seller_signup'])) {
    $username = sanitize($_POST['txt_username']);
    $pancard = sanitize($_POST['txt_panno']);
    $email = sanitize($_POST['txt_email']);
    $phone = sanitize($_POST['txt_phone']);
    $password = $_POST['txt_pass'];
    $confirmPassword = $_POST['txt_cpass'];

    $errMsg = "";
    
    if (empty($username) || empty($pancard) || empty($email) || empty($phone) || empty($password) || empty($confirmPassword)) {
        $errMsg = "Please fill all fields";
    } elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $username)) {
        $errMsg = "Name must have letters and spaces only";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errMsg = "Invalid email format";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errMsg = "Please enter a valid 10-digit mobile number";
    } elseif ($password !== $confirmPassword) {
        $errMsg = "Passwords do not match";
    } else {
        // Check if user already exists
        $checkQry = "SELECT * FROM seller WHERE email = '$email' OR username = '$username'";
        $checkResult = mysqli_query($conn, $checkQry);
        
        if (mysqli_num_rows($checkResult) > 0) {
            $errMsg = "Username or email already exists";
        } else {
            $qry = "INSERT INTO `seller`(`username`, `password`, `email`, `pancardno`, `mobileno`) 
                    VALUES ('$username', '$password', '$email', '$pancard', '$phone')";
            $result = mysqli_query($conn, $qry);
            
            if ($result) {
                echo "<script>
                    alert('Account created successfully! Please login.');
                    window.location.replace('" . SITE_URL . "/auth/login-seller.php');
                </script>";
                exit();
            } else {
                $errMsg = "Registration failed. Please try again.";
            }
        }
    }
    
    echo "<script>
        alert('$errMsg');
        window.location.replace('" . SITE_URL . "/auth/signup-seller.php');
    </script>";
    exit();
}

/**
 * Admin Login
 */
if (isset($_POST['btn_login'])) {
    $email = sanitize($_POST['txt_email']);
    $password = $_POST['txt_pass'];

    $qry = "SELECT * FROM `admin` WHERE username='$email' AND password='$password'";
    $result = mysqli_query($conn, $qry);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_name'] = $row['username'];
        
        echo "<script>
            alert('Login Successful');
            window.location.replace('" . SITE_URL . "/admin/dashboard.php');
        </script>";
    } else {
        echo "<script>
            alert('Invalid Email/Password');
            window.location.replace('" . SITE_URL . "/admin/login.php');
        </script>";
    }
    exit();
}
?>
