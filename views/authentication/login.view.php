<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="YourOwnTV" />
    <meta name="description" content="YourOwnTV" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>YourOwnTV</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <!-- CSS bootstrap-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css" />
</head>

<body>

    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="assets/images/logo-1.png" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!-- Log-in  -->
    <section class="position-relative pb-0">
        <div class="gen-login-page-background" style="background-image: url('assets/images/background/asset-54.jpg');"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <form name="pms_login" id="pms_login" action="/login" method="post">
                            <h4>Sign In</h4>
                            <p class="login-username">
                                <label for="user_login">Email Address</label>
                                <input type="text" name="email" id="email" class="input" value="" size="20" required>
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Password</label>
                                <input type="password" name="password" id="password" class="input" value="" size="20" required>
                            </p>
                            <p class="login-remember">
                                <label>
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember
                                    Me </label>
                            </p>
                            <p class="login-submit">
                                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary"
                                    value="Log In">
                                <input type="hidden" name="redirect_to">
                            </p>
                            <a href="/register">Register</a> | <a href="/forgot">Lost your password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Log-in  -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

    <!-- js-min -->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/asyncloader.min.js"></script>
    <!-- JS bootstrap -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- owl-carousel -->
    <script src="/assets/js/owl.carousel.min.js"></script>
    <!-- counter-js -->
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <!-- popper-js -->
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/swiper-bundle.min.js"></script>
    <!-- Iscotop -->
    <script src="/assets/js/isotope.pkgd.min.js"></script>

    <script src="/assets/js/jquery.magnific-popup.min.js"></script>

    <script src="/assets/js/slick.min.js"></script>

    <script src="/assets/js/streamlab-core.js"></script>

    <script src="/assets/js/script.js"></script>


</body>

</html>