<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">

    <style type="text/css">
        .paymentWrap {
            padding: 50px;
        }

        .paymentWrap .paymentBtnGroup {
            max-width: 800px;
            margin: auto;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod {
            padding: 40px;
            box-shadow: none;
            position: relative;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod.active {
            outline: none !important;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod.active .method {
            border-color: #4cd264;
            outline: none !important;
            box-shadow: 0px 3px 22px 0px #7b7b7b;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod .method {
            position: absolute;
            right: 3px;
            top: 3px;
            bottom: 3px;
            left: 3px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            border: 2px solid transparent;
            transition: all 0.5s;
        }

        .paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
            background-image: url("https://1.bp.blogspot.com/-NszaOiDwjDM/WgC1WD_C0bI/AAAAAAAAAZ0/4ZC7cxC50VcahDBEkN2IMn-pwURs9fvzgCLcBGAs/s640/create-and-verify-payza-account-min.png");
        }

        .paymentWrap .paymentBtnGroup .paymentMethod .method.amex {
            background-image: url("https://thumbs.dreamstime.com/b/hand-paying-cash-wallet-female-pulling-her-order-to-pay-something-50443297.jpg");
        }

        .paymentWrap .paymentBtnGroup .paymentMethod .method.vishwa {
            background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNHAkhFt5BlrExfLIwNhgkjz-2BJQUMSPIshIyxWs4ZrMDalDI");
        }

        .paymentWrap .paymentBtnGroup .paymentMethod .method.ez-cash {
            background-image: url("https://3.bp.blogspot.com/-44bkVkbn1xU/WIOf2tb5GFI/AAAAAAAAErU/lzvl8hKC_vcnTDIIBaVhmVy8Kmee1SM8QCLcB/s1600/bkash-logo.jpg");
        }


        .paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
            border-color: #4cd264;
            outline: none !important;
        }
    </style>

</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ url('/') }}"><img src="{{URL::to('frontend/images/home/logo.png')}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>

                            <?php 

                            $customer_id = Session::get('customer_id'); 
                            $shipping_id = Session::get('shipping_id');


                            ?>

                            <?php if($customer_id != NULL  && $shipping_id == NULL) { ?>
                                <li><a href="{{ URL::to('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li> 
                            <?php } if($customer_id != NULL  && $shipping_id != NULL) { ?>    
                                <li><a href="{{ URL::to('/payment') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>    
                            <?php } else{ ?>
                               <li><a href="{{ URL::to('/login_check') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li> 
                            <?php } ?> 
                                
                                <li><a href="{{ URL::to('/show_cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            
                            @if($customer_id != NULL)
                                <li><a href="{{ URL::to('/customer_logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                            @else    
                                <li><a href="{{ URl::to('/login_check') }}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif    

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ url('/') }}" class="active">Home</a></li>
                                <li class="dropdown"><a href="">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">

                                    <?php 

                                    $customer_id = Session::get('customer_id'); 
                                    $shipping_id = Session::get('shipping_id');

                                    ?>

                                    <?php if($customer_id != NULL  && $shipping_id == NULL) { ?>
                                        <li><a href="{{ URL::to('/checkout') }}"> Checkout</a></li> 
                                    <?php } if($customer_id != NULL  && $shipping_id != NULL) { ?>    
                                        <li><a href="{{ URL::to('/payment') }}"> Checkout</a></li>    
                                    <?php } else{ ?>
                                       <li><a href="{{ URL::to('/login_check') }}"> Checkout</a></li> 
                                    <?php } ?> 
                                        
                                        <li><a href="{{ URL::to('/show_cart') }}"> Cart</a></li>
                                    
                                    @if($customer_id != NULL)
                                        <li><a href="{{ URL::to('/customer_logout') }}"> Logout</a></li>
                                    @else    
                                        <li><a href="{{ URl::to('/login_check') }}"> Login</a></li>
                                    @endif    
                                                


                                    </ul>
                                </li> 
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search"/>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    


    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">

                @yield('slider')  

            </div>
        </div>
    </section><!--/slider-->
    

    
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-3">

                  @yield('sidebar') 

                </div>
                
                  @yield('content')  

            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <!-- <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL::to('frontend/images/home/iframe1.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL::to('frontend/images/home/iframe2.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL::to('frontend/images/home/iframe3.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL::to('frontend/images/home/iframe4.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{URL::to('frontend/images/home/map.png')}}" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2018 Shahadatsdk All rights reserved.</p>
                    <p class="pull-right">Developed By <span><a target="_blank" href="">Shahadatsdk</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>