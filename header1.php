<?php
 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
$url = $protocol . $_SERVER['HTTP_HOST'];

$host= $_SERVER["HTTP_HOST"];
// $urls= $_SERVER["REQUEST_URI"];
$urls = "https://appdental.es/";
$urls_local = "http://localhost:8072/landing-appdental-kitdigital";
?>

<body class="dia-static">
    <!-- preloader - start -->
    <div class="up">
        <a href="#" id="scrollup" class="dia-scrollup text-center"><i class="fas fa-angle-up"></i></a>
    </div>
    <!-- Start of header section
        ============================================= -->
    <header id="dia-header" class="dia-main-header">
        <div class="container">
            <div class="dia-main-header-content clearfix">
                <div class="dia-logo float-left">
                    <a href="index.php"><img src="<?php echo $urls ?>/assets/img/applogo.webp" alt="APP Dental Macía"></a>
                </div>
                <div class="dia-main-menu-item">
                    <nav class="dia-main-navigation  clearfix ul-li">
                        <ul id="main-nav" class="navbar-nav text-capitalize clearfix">
                            <li><a href="index.php" class="active">Inicio</a></li>
                            <li><a href="index.php#kitdigital">Kit digital</a></li>
                            <li><a href="index.php#appdental">App Dental</a></li>
                            <li><a href="index.php#dudas">Dudas y Pasos</a></li>
                            <li><a href="index.php#contact_formtest">Contacto</a> </li>                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /desktop menu -->
            <div class="dia-mobile_menu relative-position">
                <div class="dia-mobile_menu_button dia-open_mobile_menu">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="dia-mobile_menu_wrap">
                    <div class="mobile_menu_overlay dia-open_mobile_menu"></div>
                    <div class="dia-mobile_menu_content">
                        <div class="dia-mobile_menu_close dia-open_mobile_menu">
                            <i class="far fa-times-circle"></i>
                        </div>

                        <nav class="dia-mobile-main-navigation  clearfix ul-li">
                            <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                            <li><a href="index.php" class="active">Inicio</a></li>
                            <li><a href="index.php#kitdigital">Kit digital</a></li>
                            <li><a href="index.php#appdental">App Dental</a></li>
                            <li><a href="index.php#dudas">Dudas y Pasos</a></li>
                            <li><a href="index.php#contact_formtest">Contacto</a> </li> 
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /mobile-menu -->
            </div>
        </div>
    </header>
    <!-- End of header section
        ============================================= -->