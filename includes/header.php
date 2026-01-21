<?php require_once __DIR__ . '/../config/config.php'; ?>
<?php require_once INCLUDES_PATH . '/head.php'; ?>
<body>
    <!-- Banner Section -->
    <div class="banner-left-side" id="home">
        <!-- Header -->
        <div class="headder-top d-sm-flex justify-content-sm-between">
            <!-- Navigation -->
            <style type="text/css">
                .menu a, .menu li { color: blue; font-size: 14px; font-weight: bold; }
            </style>
            <nav class="text-center">
                <label for="drop" class="toggle" style="border:0px solid red">Menu</label>
                <input type="checkbox" id="drop">
                <ul class="menu mt-2">
                    <li class="active"><a href="<?= SITE_URL ?>/index.php">Home</a></li>
                    <li><a href="<?= SITE_URL ?>/index.php#about">About</a></li>
                    <li><a href="<?= SITE_URL ?>/index.php#service">Services</a></li>			
                    <li>
                        <!-- Dropdown Menu -->
                        <label for="drop-2" class="toggle toogle-2">MENU<span class="fa fa-angle-down" aria-hidden="true"></span></label>
                        <a href="#">MENU <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-2">
                        <ul style="z-index:10000">
                            <li><a href="<?= SITE_URL ?>/index.php#team" class="drop-text">Team</a></li>
                            <li><a href="<?= SITE_URL ?>/index.php#contact" class="drop-text">Contact</a></li>
                            
                            <?php if (isLoggedIn('seller')): ?>
                                <li><a href="<?= SITE_URL ?>/seller/add-product.php" class="drop-text">Add Products</a></li>
                                <li><a href="<?= SITE_URL ?>/seller/bid-requests.php" class="drop-text">Bid Request</a></li>
                                <li><a href="<?= SITE_URL ?>/seller/products.php" class="drop-text">Products</a></li>
                                <li><a href="<?= SITE_URL ?>/seller/profile.php" class="drop-text">Profile</a></li>
                                <li><a href="<?= SITE_URL ?>/auth/logout.php?type=seller" class="drop-text">Logout</a></li>
                            <?php elseif (isLoggedIn('buyer')): ?>
                                <li><a href="<?= SITE_URL ?>/buyer/products.php" class="drop-text">Browse Products</a></li>
                                <li><a href="<?= SITE_URL ?>/buyer/my-bids.php" class="drop-text">My Bidding</a></li>
                                <li><a href="<?= SITE_URL ?>/buyer/profile.php" class="drop-text">Profile</a></li>
                                <li><a href="<?= SITE_URL ?>/auth/logout.php?type=buyer" class="drop-text">Logout</a></li>
                            <?php else: ?>
                                <li><a href="<?= SITE_URL ?>/auth/login-buyer.php" class="drop-text">Login as Buyer</a></li>
                                <li><a href="<?= SITE_URL ?>/auth/login-seller.php" class="drop-text">Login as Seller</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </nav>
            
            <div id="logo">
                <h1><img src="<?= SITE_URL ?>/assets/images/logo.png" height="64" width="300"/></h1>
            </div>
            
            <div class="social-icons text-sm-right pt-2">		
                <ul>
                    <li class="facebook">
                        <a href="#"><span class="fa fa-facebook"></span></a>
                    </li>
                    <li class="twitter">
                        <a href="#"><span class="fa fa-twitter"></span></a>
                    </li>
                    <li class="rss mr-lg-3">
                        <a href="#"><span class="fa fa-rss"></span></a>
                    </li>
                </ul>
            </div>
            <!-- //Navigation -->
        </div>
        <!-- //Header -->
