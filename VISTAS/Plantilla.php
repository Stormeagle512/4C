<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NextGenerationDev">
    <title>Wedding 4C JVDH</title>
    <!--Favicon img-->
    <link rel="shortcut icon" href="html/assets/img/favicon/favicon.png">
    <!--Bootstarp min css-->
    <link rel="stylesheet" href="html/assets/css/bootstrap.min.css">
    <!--Bootstarp map css-->
    <link rel="stylesheet" href="html/assets/css/bootstrap.css.map">
    <!--Owl Carousel css-->
    <link rel="stylesheet" href="html/assets/css/owl.min.css">
    <!--Owl Carousel Theme css-->
    <link rel="stylesheet" href="html/assets/css/owl.theme.default.min.css">
    <!--All min css-->
    <link rel="stylesheet" href="html/assets/css/all.min.css">
    <!--Animate css-->
    <link rel="stylesheet" href="html/assets/css/animate.css">
    <!--Magnific popup css-->
    <link rel="stylesheet" href="html/assets/css/magnific-popup.css">
    <!--Swiper min css-->
    <link rel="stylesheet" href="html/assets/css/swiper-bundle.min.css">
    <!--main css-->
    <link rel="stylesheet" href="html/assets/css/main.css">
</head>

<body>

    <!--==== Header Section Here ======= -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo-menu">
                    <a href="index.php?Inicio=home" class="logo">
                        <img src="html/assets/img/logo/logo1.png" alt="img">
                    </a>
                </div>
                <div class="header-bar d-lg-none">
                </div>
                <ul class="main-menu">
                <li>
                        <a href="#0">User<i class="fas fa-chevron-down"></i></a>
                        <ul class="sub-menu">
                            <li class="subtwohober">
                                <a href="index.php?Inicio=login">
                                    <span>Login</span>
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="index.php?Inicio=register">
                                    <span>Register</span>
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="index.php?Inicio=admin">
                                    <span>Admin</span>
                                </a>
                                <li class="subtwohober">
                                <a href="index.php?Inicio=exit">
                                    <span>Log Out</span>
                                </a>
                            </li>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="index.php?Inicio=home">Home</a>
                    </li>
                    <li>
                        <a href="index.php?Inicio=about">About</a>

                    </li>
                    <li>
                        <a href="#0">Service <i class="fas fa-chevron-down"></i></a>
                        <ul class="sub-menu">
                            <li class="subtwohober">
                                <a href="index.php?Inicio=service">
                                    <span>Service</span>
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="index.php?Inicio=service-single">
                                    <span>Service Single</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?Inicio=story">Our story</a>
                    </li>
                    <li>
                        <a href="#0">Pages <i class="fas fa-chevron-down"></i></a>
                        <ul class="sub-menu">
                            <li class="subtwohober">
                                <a href="index.php?Inicio=event">
                                    <span>Our event</span>
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="index.php?Inicio=gallery">
                                    <span>Gallery</span>
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="index.php?Inicio=error">
                                    <span>Error 404</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#0">Blog <i class="fas fa-chevron-down"></i></a>
                        <ul class="sub-menu">
                            <li class="subtwohober">
                                <a href="index.php?Inicio=blog">
                                    <span>Blog</span>
                                </a>
                            </li>
                            <li class="subtwohober">
                                <a href="index.php?Inicio=blog-single">
                                    <span>Blog Single</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?Inicio=contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!--==== Header Section End ======= -->
        <?php
        if (isset($_GET["Inicio"])) {
            if (
                $_GET["Inicio"] == "login" ||
                $_GET["Inicio"] == "register" ||
                $_GET["Inicio"] == "admin" ||
                $_GET["Inicio"] == "exit" ||
                $_GET["Inicio"] == "about" ||
                $_GET["Inicio"] == "blog-single" ||
                $_GET["Inicio"] == "blog" ||
                $_GET["Inicio"] == "contact" ||
                $_GET["Inicio"] == "error" ||
                $_GET["Inicio"] == "event" ||
                $_GET["Inicio"] == "gallery" ||
                $_GET["Inicio"] == "home" ||
                $_GET["Inicio"] == "service-single" ||
                $_GET["Inicio"] == "service" || 
                $_GET["Inicio"] == "form" ||
                $_GET["Inicio"] == "story" ) {
                include "PAGINAS/" . $_GET["Inicio"] . ".php";
            }  else{
                include "PAGINAS/error.php";
            }
        } else {
            include "PAGINAS/home.php";
        }
        ?>
    <!--==== Scroll-Up Section Here ======= -->
    <div class="scroll-up">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!--==== Scroll-Up Section End ======= -->

    <div class="footer__section">
        <div class="container">
            <div class="border__area">
                <div class="container">
                    <div class="footer__logo center">
                        <a href="index.php?Inicio=home">
                            <img src="html/assets/img/logo/logo.png" alt="footer__logo">
                        </a>
                    </div>
                    <div class="footer__bottom center">
                        <p>© 2023 All Rights Reserved. Designed by <a href="#0" class="text-base-2">NextGenerationDev</a></p>
                        <ul class="footer__icon">
                            <li>
                                <a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li class="active">
                                <a href="#0"><i class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="#0"><i class="fa-brands fa-whatsapp"></i></a>
                            </li>
                            <li class="mr-none">
                                <a href="#0"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                        <ul class="footer__menu">
                            <li><a href="index.php?Inicio=home">home</a></li>
                            <li><a href="index.php?Inicio=about">about</a></li>
                            <li><a href="index.php?Inicio=service">service</a></li>
                            <li><a href="index.php?Inicio=story">Story</a></li>
                            <li><a href="index.php?Inicio=gallery">gallery</a></li>
                            <li><a href="index.php?Inicio=blog">blog</a></li>
                            <li class="mr-none"><a href="index.php?Inicio=contact">contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Jquery 3 6 0 Min Js-->
    <script src="html/assets/js/jquery-3.6.0.min.js"></script>
    <!--Bootstrap bundle Js-->
    <script src="html/assets/js/bootstrap.bundle.min.js"></script>
    <!--Viewport Jquery Js-->
    <script src="html/assets/js/viewport.jquery.js"></script>
    <!--Wow min Js-->
    <script src="html/assets/js/wow.min.js"></script>
    <!--Owl Carousel min Js-->
    <script src="html/assets/js/owl.min.js"></script>
    <!--Swiper min Js-->
    <script src="html/assets/js/swiper-bundle.min.js"></script>
    <!--Magnific popup min Js-->
    <script src="html/assets/js/jquery.magnific-popup.min.js"></script>
    <!--main Js-->
    <script src="html/assets/js/main.js"></script>
</body>
</html>