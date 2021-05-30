<!DOCTYPE html>
<html class="no-js">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fav icon -->
    <link rel="shortcut icon" href="{{asset('Admin_Lib/img/favicon.ico')}}">

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,900,700,700italic,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Cantata+One' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700' rel='stylesheet' type='text/css'>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="{{asset('Admin_Lib/css/bootstrap.min.css')}}">

    <!-- Magnific Popup -->
    <link href="{{asset('Admin_Lib/css/magnific-popup.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('Admin_Lib/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admin_Lib/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('Admin_Lib/css/skin-lblue.css')}}">

    <link rel="stylesheet" href="{{asset('Admin_Lib/css/ecommerce.css')}}">

    <!-- Owl carousel -->
    <link href="{{asset('Admin_Lib/css/owl.carousel.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('Admin_Lib/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('Admin_Lib/style.css')}}">
    <link rel="stylesheet" href="{{asset('Admin_Lib/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin_Lib/css/revolutionslider_settings.css')}}" media="screen" />

    <script src="{{asset('Admin_Lib/js/vendor/modernizr-2.6.2.min.js')}}"></script>
</head>

<body class="style-14">

    <!-- Start Loading  -->
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h1 class="loader">Loading...</h1>
        </div>
    </section>
    <!-- End Loading  -->

    <!-- start header -->
    <header>
        <!-- Top bar starts -->
        <div class="top-bar">
            <div class="container">

                <!-- Contact starts -->
                <div class="tb-contact pull-left">
                    <!-- Email -->
                    <i class="fa fa-envelope color"></i> &nbsp; <a href="mailto:contact@domain.com">contact@domain.com</a> &nbsp;&nbsp;
                    <!-- Phone -->
                    <i class="fa fa-phone color"></i> &nbsp; +1 (342)-(323)-4923
                </div>
                <!-- Contact ends -->

                <!-- Shopping kart starts -->
                <div class="tb-shopping-cart pull-right">
                    <!-- Link with badge -->
                    <a href="#" class="btn btn-white btn-xs b-dropdown"><i class="fa fa-shopping-cart"></i> <i class="fa fa-angle-down color"></i> <span class="badge badge-color">2</span></a>
                    <!-- Dropdown content with item details -->
                    <div class="b-dropdown-block">
                        <!-- Heading -->
                        <h4><i class="fa fa-shopping-cart color"></i> Your Items</h4>
                        <ul class="list-unstyled">
                            <!-- Item 1 -->
                            <li>
                                <!-- Item image -->
                                <div class="cart-img">
                                    <a href="#"><img src="img/ecommerce/view-cart/1.png" alt="" class="img-responsive" /></a>
                                </div>
                                <!-- Item heading and price -->
                                <div class="cart-title">
                                    <h5><a href="#">Premium Quality Shirt</a></h5>
                                    <!-- Item price -->
                                    <span class="label label-color label-sm">$1,90</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <!-- Item 2 -->
                            <li>
                                <div class="cart-img">
                                    <a href="#"><img src="img/ecommerce/view-cart/2.png" alt="" class="img-responsive" /></a>
                                </div>
                                <div class="cart-title">
                                    <h5><a href="#">Premium Quality Shirt</a></h5>
                                    <span class="label label-color label-sm">$1,20</span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-white btn-sm">View Cart</a> &nbsp; <a href="#" class="btn btn-color btn-sm">Checkout</a>
                    </div>
                </div>
                <!-- Shopping kart ends -->

                <!-- Langauge starts -->
                <div class="tb-language dropdown pull-right">
                    <a href="#" data-target="#" data-toggle="dropdown"><i class="fa fa-globe"></i> English <i class="fa fa-angle-down color"></i></a>
                    <!-- Dropdown menu with languages -->
                    <ul class="dropdown-menu dropdown-mini" role="menu">
                        <li><a href="#">Germany</a></li>
                        <li><a href="#">France</a></li>
                        <li><a href="#">Brazil</a></li>
                    </ul>
                </div>
                <!-- Language ends -->

                <!-- Search section for responsive design -->
                <div class="tb-search pull-left">
                    <a href="#" class="b-dropdown"><i class="fa fa-search square-2 rounded-1 bg-color white"></i></a>
                    <div class="b-dropdown-block">
                        <form>
                            <!-- Input Group -->
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type Something">
                                <span class="input-group-btn">
										<button class="btn btn-color" type="button">Search</button>
									</span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Search section ends -->

                <!-- Social media starts -->
                <div class="tb-social pull-right">
                    <div class="brand-bg text-right">
                        <!-- Brand Icons -->
                        <a href="#" class="facebook"><i class="fa fa-facebook square-2 rounded-1"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter square-2 rounded-1"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus square-2 rounded-1"></i></a>
                    </div>
                </div>
                <!-- Social media ends -->

                <div class="clearfix"></div>
            </div>
        </div>

        <!-- Top bar ends -->

        <!-- Header One Starts -->
        <div class="header-1">

            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <!-- Logo section -->
                        <div class="logo">
                            <h1><a href="index.html"><i class="fa fa-bookmark-o"></i> LookCare</a></h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-2 col-sm-5 col-sm-offset-3 hidden-xs">
                        <!-- Search Form -->
                        <div class="header-search">
                            <form>
                                <!-- Input Group -->
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type Something">
                                    <span class="input-group-btn">
											<button class="btn btn-color" type="button">Search</button>
										</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation starts -->

            <div class="navi">
                <div class="container">
                    <div class="navy">
                        <ul>
                            <!-- Main menu -->
                            <li><a href="#">Home</a>
                                <!-- Submenu -->
                                <ul>

                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html"><span>Home 2</span></a></li>
                                    <li><a href="index-3.html"><span>Home 3</span></a></li>

                                </ul>
                            </li>

                            <li><a href="#">Features</a>
                                <ul>
                                    <li><a href="#">Footer</a>
                                        <ul>
                                            <li><a href="footer-one.html">Footer1</a></li>
                                            <li><a href="footer-two.html">Footer2</a></li>
                                            <li><a href="footer-three.html">Footer3</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Price Table</a>
                                        <ul>
                                            <li><a href="price-table-one.html">Price Table1</a></li>
                                            <li><a href="price-table-two.html">Price Table2</a></li>

                                        </ul>
                                    </li>

                                </ul>
                            </li>

                            <li><a href="#">Category</a>
                                <ul>
                                    <li><a href="#">Laptop</a>
                                        <ul>
                                            <li><a href="#">Vaio</a></li>
                                            <li><a href="#">Samsung</a></li>
                                            <li><a href="#">Toshiba</a></li>
                                            <li><a href="#">HP</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="#">Smartphone</a>
                                        <ul>
                                            <li><a href="#">Iphone</a></li>
                                            <li><a href="#">Oppo</a></li>
                                            <li><a href="#">Nokia</a></li>
                                            <li><a href="#">Sony</a></li>
                                            <li><a href="#">Samsung</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="#">Accessories</a>
                                        <ul>
                                            <li><a href="#">Headphone</a></li>
                                            <li><a href="#">Adapter</a></li>
                                            <li><a href="#">Bag</a></li>
                                            <li><a href="#">Baby doll</a></li>

                                        </ul>
                                    </li>
                                    <!-- Multi level menu -->
                                    <li><a href="#">Multi Level Menu</a>
                                        <ul>
                                            <!-- Sub menu -->
                                            <li><a href="#">Menu #1</a></li>
                                            <li><a href="#">Menu #1</a></li>
                                            <li><a href="#">Menu #1</a>
                                                <ul>
                                                    <!-- Sub menu -->
                                                    <li><a href="#">Menu #2</a></li>
                                                    <li><a href="#">Menu #2</a></li>
                                                    <li><a href="#">Menu #2</a>
                                                        <ul>
                                                            <!-- Sub menu -->
                                                            <li><a href="#">Menu #3</a></li>
                                                            <li><a href="#">Menu #3</a></li>
                                                            <li><a href="#">Menu #3</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="#">Blog</a>
                                <ul>
                                    <li><a href="blog.html"><span>Blog Default</span></a></li>
                                    <li><a href="blog-masonry.html"><span>Blog Masonry</span></a></li>
                                    <li><a href="blog-full-width.html"><span>Blog Full Width</span></a></li>
                                    <li><a href="single-post.html"><span>Single Page 1</span></a></li>
                                    <li><a href="single-post-v2.html"><span>Single Page 2</span></a></li>
                                </ul>
                            </li>

                            <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="shop.html"><span>Shop</span></a></li>
                                    <li><a href="single-product.html"><span>Single product</span></a></li>
                                    <li><a href="shopping-cart.html"><span>Cart</span></a></li>
                                    <li><a href="checkout.html"><span>Checkout</span></a></li>
                                    <li><a href="wishlist.html"><span>Wishlist</span></a></li>
                                    <li><a href="signin.html"><span>Sign In</span></a></li>
                                    <li><a href="signup.html"><span>Sign Up</span></a></li>
                                    <li><a href="404.html"><span>404 Page</span></a></li>
                                </ul>
                            </li>

                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Navigation ends -->

        </div>

        <!-- Header one ends -->

    </header>
    <!-- end header -->
