<?php
/**
 * Home Page - Main Entry Point
 * Online Auction System
 */
require_once __DIR__ . '/includes/header.php';
?>

<!-- Banner -->
<div class="main-banner text-center">
    <div class="container">
        <div class="banner-right-txt">
            <h5 class="mb-lg-4 mb-md-3 mb-2">Welcome To</h5>
            <h4><span class="colo-change">O</span>nl<span class="colo-change">i</span>ne <span class="colo-change">A</span>uc<span class="colo-change">t</span>ion</h4>
        </div>
        <div class="slide-info-txt">
            <p>An online auction is an auction which is held over the internet. It is a popular method for buying and selling products and services. Online Auction System helps the customer to sell and buy product in best price. It is developed with the objective of making the system reliable, easier and fast.</p>
        </div>
        <br>
        <div class="btn">
            <a href="<?= SITE_URL ?>/seller/add-product.php"><button><span>Sell an Item</span></button></a>
        </div>
        <div class="btn">
            <a href="<?= SITE_URL ?>/buyer/products.php"><button><span>Buy an Item</span></button></a>
        </div>
    </div>
</div>
</div>
<!-- //Banner -->

<!-- About Section -->
<section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-2">About Us</h3>
        <div class="title-wls-text clr-two text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
            <p>A place for buyers and sellers to come together and trade almost anything.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 about-grid-wthree">
                <div class="about-fashion-grid text-center">
                    <div class="about-icon mb-md-4 mb-3">
                        <span class="fa fa-diamond" aria-hidden="true"></span>
                    </div>
                    <h4 class="pb-3">What We Do</h4>
                    <p>We provide a secure platform for the customers to buy and sell products at best prices.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 about-grid-wthree">
                <div class="about-fashion-grid text-center">
                    <div class="about-icon mb-md-4 mb-3">
                        <span class="fa fa-laptop" aria-hidden="true"></span>
                    </div>
                    <h4 class="pb-3">Why Choose Us</h4>
                    <p>Simply because it is easy to use, much reliable, fast and secure.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 about-grid-wthree">
                <div class="about-fashion-grid text-center">
                    <div class="about-icon mb-md-4 mb-3">
                        <span class="fa fa-bars" aria-hidden="true"></span>
                    </div>
                    <h4 class="pb-3">What About Us</h4>
                    <p>Our online auction system lets you easily browse lots and place bids using a secure server.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 about-grid-wthree">
                <div class="about-fashion-grid text-center">
                    <div class="about-icon mb-md-4 mb-3">
                        <span class="fa fa-database" aria-hidden="true"></span>
                    </div>
                    <h4 class="pb-3">Why We Are Best</h4>
                    <p>Our site provides a safe and secure environment for online users.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //About Section -->

<!-- Services Section -->
<section class="service py-lg-4 py-md-3 py-sm-3 py-3" id="service">
    <div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-2 clr">Our Services</h3>
        <div class="title-wls-text text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
            <p>Online auction systems provide immediate access advantages compared with their physical auction systems counterpart.</p>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-6 service-left-grid">
                <h5>Your Price, Your Way.</h5>
            </div>
            <div class="col-lg-5 col-md-6 service-left-matter">
                <div class="row my-lg-4 my-3">
                    <div class="col-lg-2 col-md-2 col-sm-3 feature-icons p-0">
                        <span class="fa fa-arrow-right text-center" aria-hidden="true"></span>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-9 features-left px-0 pt-1">
                        <h4>Personal Details</h4>
                    </div>
                    <p class="mt-2">For selling or buying products online user have to provide their personal details like Email address, License number, PAN Card number and Mobile number</p>
                </div>
                <div class="row my-lg-4 my-3">
                    <div class="col-lg-2 col-md-2 col-sm-3 feature-icons p-0">
                        <span class="fa fa-arrow-right text-center" aria-hidden="true"></span>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-9 features-left px-0 pt-1">
                        <h4>Verification</h4>
                    </div>
                    <p class="mt-2">Verification is conducted and only valid users will have authority to sell and bid.</p>
                </div>
                <div class="row my-lg-4 my-3">
                    <div class="col-lg-2 col-md-2 col-sm-3 feature-icons p-0">
                        <span class="fa fa-arrow-right text-center" aria-hidden="true"></span>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-9 features-left px-0 pt-1">
                        <h4>Fraud Detection</h4>
                    </div>
                    <p class="mt-2">We treat the fraud detection with a binary classification. Fraud user accounts are deleted.</p>
                </div>
                <div class="row my-lg-4 my-3">
                    <div class="col-lg-2 col-md-2 col-sm-3 feature-icons p-0">
                        <span class="fa fa-arrow-right text-center" aria-hidden="true"></span>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-9 features-left px-0 pt-1">
                        <h4>Feedback</h4>
                    </div>
                    <p class="mt-2">It is a crucial part of the communication between the user and us.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //Services Section -->

<!-- Team Section -->
<section class="team py-lg-4 py-md-3 py-sm-3 py-3" id="team">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-2 clr">Our Team</h3>
        <div class="title-wls-text text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">
            <p></p>
        </div>
        <div align="center" class="row">
            <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="col-lg-3 col-md-6 col-sm-6 team-item text-center my-3">
                <div class="team-ile-img">
                    <img src="<?= SITE_URL ?>/assets/images/team1.jpg" alt="Team Member" class="img-fluid">
                    <div class="team-color-ile text-center">
                        <div class="social-icons">
                            <ul>
                                <li class="facebook"><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li class="rss"><a href="#"><span class="fa fa-rss"></span></a></li>
                            </ul>
                        </div>
                        <div class="mt-3 team-txt-ile">
                            <h4>Aditya Patel</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="col-lg-3 col-md-6 col-sm-6 team-item text-center my-3">
                <div class="team-ile-img">
                    <img src="<?= SITE_URL ?>/assets/images/team2.png" alt="Team Member" class="img-fluid">
                    <div class="team-color-ile text-center">
                        <div class="social-icons">
                            <ul>
                                <li class="facebook"><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li class="rss"><a href="#"><span class="fa fa-rss"></span></a></li>
                            </ul>
                        </div>
                        <div class="mt-3 team-txt-ile">
                            <h4>Narsi Joshi</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //Team Section -->

<!-- Contact Section -->
<section class="contact py-lg-4 py-md-4 py-sm-3 py-3" id="contact">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="text-center title mb-3 clr">Contact Us</h3>
        <div class="title-wls-text text-center pt-lg-3 pt-2 mb-lg-5 mb-md-4 mb-sm-4 mb-3">
            <p></p>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 contact-form pb-lg-3 pb-2">
                <form action="<?= SITE_URL ?>/controllers/user-controller.php" method="post">
                    <div class="form-group contact-forms">
                        <input type="text" class="form-control" name="txt_name" placeholder="Name" required>
                    </div>
                    <div class="form-group contact-forms">
                        <input type="email" class="form-control" name="txt_email" placeholder="Email" required>
                    </div>
                    <div class="form-group contact-forms">
                        <input type="text" class="form-control" name="txt_phone" placeholder="Phone" required>
                    </div>
                    <div class="form-group contact-forms">
                        <textarea class="form-control" placeholder="Message" name="txt_msg" required></textarea>
                    </div>
                    <button type="submit" name="btn_contact" class="btnn sent-butnn btn-lg">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- //Contact Section -->

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
