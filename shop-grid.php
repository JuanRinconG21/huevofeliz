<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Huevo Feliz - Compras</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Css Styles -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class='bx bx-envelope'></i> victor01@gmail.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class='bx bxl-facebook-circle'></i></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></i></a>
                                <a href="#"><i class='bx bxl-linkedin-square'></i></i></a>
                                <a href="#"><i class='bx bxl-pinterest-alt'></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="./assets/images/language.png" alt="">
                                <div>English</div>
                                <ul>
                                    <li><a href="#">Español</a></li>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Italiano</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="./login.php"></i>Cerrar Sesion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./dashboard.php"><img src="./assets/images/oie_transparent.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./dashboard.php">Inicio</a></li>
                            <li><a href="./shop-grid.php">Productos</a></li>
                            <li><a href="#">Compras</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.php">Registro De Compras</a></li>
                                    <li><a href="./shoping-cart.php">Carrito de Compra</a></li>
                                    <li><a href="./checkout.php">Check Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class='bx bxs-heart' ></i> <span>0</span></a></li>
                            <li><a href="#"><i class='bx bxs-cart-alt'></i> <span>0</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$0</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="¿Que necesitas buscar?">
                                <button type="submit" class="site-btn">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="./assets/images/oie_0xcA4sI7engn.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Productos</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Inicio</a>
                            <span>Productos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Categorias</h4>
                            <ul>
                                <li><a href="#">Huevos A</a></li>
                                <li><a href="#">Huevos AA</a></li>
                                <li><a href="#">Huevos AAA</a></li>
                                <li><a href="#">Huevos Jumbo</a></li>
                                <li><a href="#">Huevos La Vaquita</a></li>
                                <li><a href="#">Huevos Santa Anita</a></li>
                                <li><a href="#">Huevos Kikes</a></li>
                            </ul>
                        </div>
                        
                        
                        <div class="sidebar__item">
                            <h4>Destacados</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Huevos AA
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Huevos AAA
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Huevos Jumbo
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Huevos Santa Anita
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Ultimos Productos</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="./assets/images/featured/feature-4.png" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Huevos AAA x 12 Unds</h6>
                                                <span>$9000</span>
                                            </div>
                                        </a>
                                         <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./assets/images/featured/feature-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Huevos AA x 12 Unds</h6>
                                        <span>$6000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./assets/images/featured/feature-7.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Huevos AAA La Vaquita</h6>
                                        <span>$10000</span>
                                    </div>
                                </a>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./assets/images/featured/feature-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Huevo AA x 15 Unds</h6>
                                        <span>$7800</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./assets/images/featured/feature-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Huevos Jumbo</h6>
                                        <span>$22500</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./assets/images/featured/feature-5.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Huevos Blancos x 30 Unds</h6>
                                        <span>$18000</span>
                                    </div>
                                </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Descuentos</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="./assets/images/featured/feature-3.jpg"">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                                <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Huevos AA</span>
                                            <h5><a href="#">Huevo AA x 15 Unds</a></h5>
                                            <div class="product__item__price">$6250 <span>$7800</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="./assets/images/featured/feature-2.jpg"">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                                <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Huevos AA</span>
                                            <h5><a href="#">Huevos AA x 12 Unds</a></h5>
                                            <div class="product__item__price">$4800 <span>$6000</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="./assets/images/featured/feature-1.jpg"">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                                <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Huevos Jumbo</span>
                                            <h5><a href="#">Huevos Jumbo</a></h5>
                                            <div class="product__item__price">$18000 <span>$22500</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="./assets/images/featured/feature-10.png">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                                <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Huevos AAA</span>
                                            <h5><a href="#">Huevos AAA Kikes x 15 Unds</a></h5>
                                            <div class="product__item__price">$10400 <span>$12950</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="./assets/images/featured/feature-11.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                                <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Huevos AAA</span>
                                            <h5><a href="#">Huevos AAA Kikes x 30 Unds</a></h5>
                                            <div class="product__item__price">$8000 <span>$10000</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="./assets/images/featured/feature-12.png">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                                <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Huevos AAA</span>
                                            <h5><a href="#">Huevos AAA Marca Taeq</a></h5>
                                            <div class="product__item__price">$9850 <span>$12300</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Ordenar por</span>
                                    <select>
                                        <option value="0">Nombre</option>
                                        <option value="0">Precio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Productos Encontrados</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-1.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevos Jumbo</a></h6>
                                    <h5>$22500</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-2.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevos AA x 12 Unds</a></h6>
                                    <h5>$6000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-3.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevo AA x 15 Unds</a></h6>
                                    <h5>$7800</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-4.png">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevos AAA x 12 Unds</a></h6>
                                    <h5>$9000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-5.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevos Blancos x 30 Unds</a></h6>
                                    <h5>$18000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-6.png">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevos AA x 30 Unds</a></h6>
                                    <h5>$15000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-7.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevos AAA La Vaquita</a></h6>
                                    <h5>$10000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-8.png">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevo premium Santa Anita</a></h6>
                                    <h5>$17000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-9.png">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevos AAA x 15 Unds</a></h6>
                                    <h5>$8700</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-10.png">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevos AAA x 15 Unds</a></h6>
                                    <h5>$12950</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-11.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevos AAA Kikes x 15 Unds</a></h6>
                                    <h5>$10000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/featured/feature-12.png">
                                    <ul class="product__item__pic__hover">
                                         <li><a href="#"><i class='bx bxs-heart'></i></a></li>
                                        <li><a href="shoping-cart.php"><i class='bx bxs-cart-alt'></i></a></li>                               
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Huevos AAA Marca Taeq</a></h6>
                                    <h5>$12300</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./dashboard.php"><img src="./assets/images/oie_transparent.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Direccion: Avenida falsa Calle 123</li>
                            <li>Telefono: +57 311 651 6135</li>
                            <li>Email: avicolahuevofeliz@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Links Utiles</h6>
                        <ul>
                            <li><a href="#">Acerca de nosotros</a></li>
                            <li><a href="#">Acerca de nuestra tienda</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Informacion detallada</a></li>
                            <li><a href="#">Politicas de privacidad</a></li>
                            <li><a href="#">Nuestro sitio</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Quienes Somos</a></li>
                            <li><a href="#">Nuestros Servicios</a></li>
                            <li><a href="#">Proyectos</a></li>
                            <li><a href="#">Contactos</a></li>
                            <li><a href="#">Innovacion</a></li>
                            <li><a href="#">Testimonios</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Unete a nuestro periodico</h6>
                        <p>Consigue el E-mail y actualizate sobre nuestras ultimas ofertas.</p>
                        <form action="#">
                            <input type="text" placeholder="Ingresa tu email">
                            <button type="submit" class="site-btn">Suscribete</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class='bx bxl-facebook-circle'></i></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></i></a>
                            <a href="#"><i class='bx bxl-linkedin-square'></i></i></a>
                            <a href="#"><i class='bx bxl-pinterest-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="./assets/images/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="./assets/js/jquery-3.3.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery-ui.min.js"></script>
    <script src="./assets/js/jquery.slicknav.js"></script>
    <script src="./assets/js/mixitup.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="./assets/js/main.js"></script>



</body>

</html>