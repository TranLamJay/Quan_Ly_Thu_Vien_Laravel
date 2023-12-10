<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <title>Book Library</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="{{url("/FE/css/bootstrap.min.css") }}">
	<link rel="stylesheet" href="{{url("/FE/css/normalize.css") }}">
	<link rel="stylesheet" href="{{url("/FE/css/font-awesome.min.css") }}">
	<link rel="stylesheet" href="{{url("/FE/css/icomoon.css") }}">
	<link rel="stylesheet" href="{{url("/FE/css/jquery-ui.css") }}">
	<link rel="stylesheet" href="{{url("/FE/css/owl.carousel.css") }}">
	<link rel="stylesheet" href="{{url("/FE/css/transitions.css") }}">
	<link rel="stylesheet" href="{{url("/FE/css/main.css") }}">
	<link rel="stylesheet" href="{{url("/FE/css/color.css") }}">
	<link rel="stylesheet" href="{{url("/FE/css/responsive.css") }}">
	<script src="FE/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>


    <header id="tg-header" class="tg-header tg-haslayout">
       
        <div class="tg-middlecontainer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <strong class="tg-logo"><a href="books"><img src="/FE/images/logo.png" alt="company name here"></a></strong>
                        <div class="tg-wishlistandcart">
                            <div class="dropdown tg-themedropdown tg-wishlistdropdown">
                                <a href="javascript:void(0);" id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="tg-themebadge">3</span>
                                    <i class="icon-heart"></i>
                                    <span>Wishlist</span>
                                </a>
                                <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
                                    <div class="tg-description"><p>No products were added to the wishlist!</p></div>
                                </div>
                            </div>
                            <div class="dropdown tg-themedropdown tg-minicartdropdown">
                                <a href="{{ route('orders.index') }}" id="tg-minicart" class="tg-btnthemedropdown">
                                    <span class="tg-themebadge count-book-in-cart"></span>
                                    <i class="icon-cart"></i>
                                </a>
                                <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                                    <div class="tg-minicartbody">
                                        <div class="tg-minicarproduct">
                                            <figure>
                                                <img src="FE/images/products/img-01.jpg" alt="image description">
                                                
                                            </figure>
                                            <div class="tg-minicarproductdata">
                                                <h5><a href="javascript:void(0);">Our State Fair Is A Great Function</a></h5>
                                                <h6><a href="javascript:void(0);">$ 12.15</a></h6>
                                            </div>
                                        </div>
                                        <div class="tg-minicarproduct">
                                            <figure>
                                                <img src="FE/images/products/img-02.jpg" alt="image description">
                                                
                                            </figure>
                                            <div class="tg-minicarproductdata">
                                                <h5><a href="javascript:void(0);">Bring Me To Light</a></h5>
                                                <h6><a href="javascript:void(0);">$ 12.15</a></h6>
                                            </div>
                                        </div>
                                        <div class="tg-minicarproduct">
                                            <figure>
                                                <img src="FE/images/products/img-03.jpg" alt="image description">
                                                
                                            </figure>
                                            <div class="tg-minicarproductdata">
                                                <h5><a href="javascript:void(0);">Have Faith In Your Soul</a></h5>
                                                <h6><a href="javascript:void(0);">$ 12.15</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tg-minicartfoot">
                                        <a class="tg-btnemptycart" href="javascript:void(0);">
                                            <i class="fa fa-trash-o"></i>
                                            <span>Clear Your Cart</span>
                                        </a>
                                        <span class="tg-subtotal">Subtotal: <strong>35.78</strong></span>
                                        <div class="tg-btns">
                                            <a class="tg-btn tg-active" href="javascript:void(0);">View Cart</a>
                                            <a class="tg-btn" href="javascript:void(0);">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tg-userlogin">
                                <figure><a href="javascript:void(0);"><img src="/FE/images/users/img-01.jpg" alt="image description"></a></figure>
                                <span>Hi, John</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tg-navigationarea">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <nav id="tg-nav" class="tg-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                                <ul>
                                    <li><a href="/books">Home</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="javascript:void(0);">Authors</a>
                                        <ul class="sub-menu">
                                            <li><a href="/authors">Authors</a></li>
                                            <li><a href="/authors/author-detail">Author Detail</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="products.html">My Book</a></li>
                                    {{-- <li class="menu-item-has-children">
                                        <a href="javascript:void(0);">Latest News</a>
                                        <ul class="sub-menu">
                                            <li><a href="newslist.html">News List</a></li>
                                            <li><a href="newsgrid.html">News Grid</a></li>
                                            <li><a href="newsdetail.html">News Detail</a></li>
                                        </ul>
                                    </li> --}}
                                    <li><a href="/contact">Contact</a></li>
                                    <li><a href="/about">About</a></li>
                                    <li><a href="/admin/login">Login</a></li>
                                    {{-- <li class="menu-item-has-children current-menu-item">
                                        <a href="javascript:void(0);"><i class="icon-menu"></i></a>
                                        <ul class="sub-menu">
                                            <li class="menu-item-has-children">
                                                <a href="aboutus.html">Products</a>
                                                <ul class="sub-menu">
                                                    <li><a href="products.html">Products</a></li>
                                                    <li><a href="productdetail.html">Product Detail</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="aboutus.html">About Us</a></li>
                                            <li><a href="404error.html">404 Error</a></li>
                                            <li><a href="comingsoon.html">Coming Soon</a></li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>