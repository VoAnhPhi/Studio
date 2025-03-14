<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>GBOX STUDIO</title>
    <link rel="icon" href="favicon.ico">
    <meta name="title" content="" />
    <meta name="description" content="" />

    <!-- meta facebook -->
    <meta property="og:locale" content="vi" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:image" content="" />

    <link rel="stylesheet" href="public/fonts/fonts.css">
    <link rel="stylesheet" href="public/scss/style.css">
    <link rel="stylesheet" href="public/css/swiper-bundle/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body class="homepage">
    <header class="heading">
        <div class="container">
            <div class="heading__nav">
                <ul class="heading__nav-menu">
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a href="?page=product_page">Studio</a></li>
                    <li><a href="?page=service_page">Dịch Vụ</a></li>
                    <li><a href="?page=news">Tin Tức</a></li>
                    <li><a href="?page=contact_page">Liên Hệ</a></li>
                </ul>
                <div class="heading__nav-mobileMenu">
                    <span style="font-size:30px;cursor:pointer" onclick="openNav()"><img src="img/icon/menu-mobile.svg"
                            alt=""></span>
                    <div id="mySidenav" class="sidenav">
                        <div class="top">
                            <img src="img/logo-modal.svg" alt="">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        </div>
                        <ul>
                            <li><a href="index.php">Trang Chủ</a></li>
                            <li><a href="?page=product_page">Studio</a></li>
                            <li><a href="?page=service_page">Dịch Vụ</a></li>
                            <li><a href="?page=news">Tin Tức</a></li>
                            <li><a href="?page=contact_page">Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="heading__logo">
                <a href="index.php"><img src="img/logo.svg" alt="main_logo"></a>
            </div>
            <div class="heading__cta">
                <div class="heading__cta-search">
                    <img src="img/icon/magnifier.svg" alt="">
                    <input type="text" placeholder="Tìm kiếm...">
                </div>
                <div class="heading__cta-notice">
                    <img src="img/icon/notice.svg" alt="">
                </div>
                <div class="heading__cta-user">
                    <a href="?page=loginModal">
                        <img src="img/icon/user.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>