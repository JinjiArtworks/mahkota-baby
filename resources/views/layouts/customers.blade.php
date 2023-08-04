<!DOCTYPE html>
<!--[if lte IE 8]> <html class="oldie" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <title>Bambino</title>
    <link rel="stylesheet" href="{{ asset('templates/Bambino/css/fancySelect.css') }}" />
    <link rel="stylesheet" href="{{ asset('templates/Bambino/css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ asset('templates/Bambino/css/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('templates/Bambino/css/jquery-ui-1.10.4.custom.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/Bambino/css/all.css') }}" />
    <link media="screen" rel="stylesheet" type="text/css" href="{{ asset('templates/Bambino/css/screen.css') }}" />
    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
</head>
<body>
    <div id="wrapper">
        <div class="wrapper-holder">
            <div class="header-holder">
                <header id="header">
                    <span class="logo"><a href="index.html">Bambino</a></span>
                    <div class="tools-nav_holder">
                        <ul class="tools-nav">
                            <li><a href="#">My account</a></li>
                            <li class="login"><a href="#">Logout</a></li>
                        </ul>
                        <div class="checkout">
                            <span>3 products, <span class="pink">$380,50</span></span>
                            <a href="cart.html" class="btn btn_checkout">Checkout</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <a class="menu_trigger" href="#">menu</a>
                    <nav id="nav">
                        <ul class="navi">
                            <li class="searc_li">
                                <div class="ul_search li">
                                    <a class="search" href="#"><span>search</span></a>
                                    <form method="get" class="searchform" action="#">
                                        <input type="text" class="field" name="s" id="s"
                                            placeholder="What are you looking for?" />
                                        <input type="submit" class="submit" value="" />
                                        <div class="clear"></div>
                                    </form>
                                </div>
                            </li>
                            <li><a href="products.html">Our Collection</a></li>
                            <li><a href="products.html">Top Products </a></li>
                            <li><a href="products.html">Best Sellers</a></li>
                            <li><a href="products.html">Gifts</a></li>
                            <li><a href="products.html">Promotions</a></li>
                        </ul>
                        <div class="ul_search">
                            <a class="search" href="#"><span>search</span></a>
                            <form method="get" class="searchform" action="#">
                                <input type="text" class="field" name="s" id="s"
                                    placeholder="What are you looking for?" />
                                <input type="submit" class="submit" value="" />
                            </form>
                        </div>
                    </nav>
                </header>
            </div>
            @yield('content')
        </div>
        <footer id="footer">
            <div class="footer-content">
                <ul class="left_side">
                    <li>
                        <span>Our mission:</span>
                        <p style="line-height: 26px;">Veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia.</p>
                    </li>
                    <li>
                        <span>Popular posts:</span>
                        <a href="#">Perspiciatis unde omnis</a>
                        <a href="#">Numquam eius</a>
                        <a href="#">Corporis suscipit laboriosam</a>
                        <a class="last" href="#">Neque porro quisquam</a>
                    </li>
                    <li>
                        <span>Contact us:</span>
                        <p>Bambino INC.<br />6737 Arch St, PA 19107</p>
                        <p>Tel. (421) 562 524 534<br />office@bambino.com</p>

                    </li>
                </ul>
                <ul class="right_side">
                    <li>
                        <span>Social media:</span>
                        <div class="social">
                            <a href="#" class="fb">Facebook</a>
                            <a href="#" class="tw">Twitter</a>
                        </div>
                        <div class="social">
                            <a href="#" class="gl">Google+</a>
                            <a href="#" class="pn">Pinterest</a>
                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
                <p class="copy">Copyright 2014 Bambino. All rights reserved.</p>
            </div>
        </footer>
    </div>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('templates/Bambino/js/jcarousellite.js') }}"></script>
    <script type="text/javascript" src="{{ asset('templates/Bambino/js/jquery.placeholder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('templates/Bambino/js/jquery.uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('templates/Bambino/js/fancySelect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('templates/Bambino/js/jquery.bxslider.js') }}"></script>
    <script src="{{ asset('templates/Bambino/js/jquery-ui-1.10.4.custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('templates/Bambino/js/main.js') }}"></script>
</body>

</html>
