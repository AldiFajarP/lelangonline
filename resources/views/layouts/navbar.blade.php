<header id="header"><!--header-->
        <!-- <div class="header_top">
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
        </div> -->
        
        <div class="header-middle" style="background-color:#1c1c1c;">
            <div class="container" style="background-color:#1c1c1c;">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <div class="logo pull-left">
                            <a href="/" class="logotext"><img src="{{ asset('images/home/hmatech.png') }}" alt="" style="height:50px;" /> BikeAuction</a>
                        </div>
                        <!-- <div class="btn-group pull-right clearfix" style="background-color:#1c1c1c;">
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="">Canada</a></li>
                                    <li><a href="">UK</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="">Canadian Dollar</a></li>
                                    <li><a href="">Pound</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-md-8 clearfix">
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">

                                @if(Auth::user() && Auth::user()->id)
                                <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li><button class="buttonlogout btn" type="submit"><i class="fa fa-home"></i> Logout</a></li>
                                </form>
                                @else
                                <li>
                                <form action="{{ url('/login')}}">
                                <button class="buttonlogout btn" type="submit"><i class="fa fa-lock"></i> Login</a>
                                </form>
                                </li>
                                <li>
                                <form action="{{ url('/register')}}">
                                <button class="buttonlogout btn" type="submit"><i class="fa fa-lock"></i> Register</a>
                                </form>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
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
                                <li><a href="/" class="active">Beranda</a></li>
                                <li class="dropdown"><a href="#">Lelang<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Semua</a></li>
                                        <li><a href="product-details.html">Belum Dimulai</a></li> 
                                        <li><a href="checkout.html">Sedang Berlangsung</a></li> 
                                        <li><a href="cart.html">Ditutup</a></li> 
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Persyaratan<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
                                
                            </ul>
                        </div>
                        @if(Auth::user() && Auth::user()->id)
                        <div class="mainmenu pull-right">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                            <li class="pull-right"><a href="404.html">Tentang Akun</a></li>
                            </ul>
                        </div>
                        @endif
                    </div>
                    <!-- <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search"/>
                        </div>
                    </div> -->
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->