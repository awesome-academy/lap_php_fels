<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <script src="{{ asset('bower_components/bower-hai/font-awesome.js') }}" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="{{ asset('bower_components/bower-hai/images/favicon/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('bower_components/bower-hai/images/favicon/apple-touch-icon.png') }}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('bower_components/bower-hai/images/favicon/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('bower_components/bower-hai/images/favicon/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('bower_components/bower-hai/images/favicon/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('bower_components/bower-hai/images/favicon/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('bower_components/bower-hai/images/favicon/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('bower_components/bower-hai/images/favicon/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('bower_components/bower-hai/images/favicon/apple-touch-icon-152x152.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('bower_components/bower-hai/images/favicon/apple-touch-icon-180x180.png') }}" />
    <link href="{{ asset('bower_components/bower-hai/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower-hai/font-Montserrat.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('bower_components/bower-hai/font-Cardo.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('bower_components/bower-hai/font-Raleway.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('bower_components/bower-hai/font-awesome.js') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower-hai/pe-icons/css') }}/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="{{ asset('bower_components/bower-hai/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower-hai/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower-hai/style.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bower-hai/css/alt-colors.css') }}" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower-hai/profile.css') }}">
    
    @yield('title')

</head>
<body class="regular-navigation">
    <div id="master-wrapper">
        <div class="preloader">
            <div class="preloader-img">
                <span class="loading-animation animate-flicker"><img src="{{ asset('bower_components/hai-bower/images/loading.gif') }}" alt="loading" /></span>
            </div>
        </div>
        <!-- navigator -->
        <div class="nav-wrapper smoothie">  
            <div class="container">      
                <div class="row">
                    <div class="col-xs-3">
                        <a class="logo" href="{{ route('home') }}"><img alt="" class="logo img-responsive" src="{{ asset('bower_components/hai-bower/images/logo.png') }}"></a> 
                    </div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="col-xs-9">
                        <div class="collapse navbar-collapse" id="navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">                        
                                <li class="dropdown">
                                    <a href="{{ route('home') }}" >{{ trans('layout.home') }}</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        {{ cate_parent($categories) }}
                                    </ul>
                                </li>
                                <li class=""><a href="contact-us.html">{{ trans('layout.contact') }}</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
                                    <ul class="dropdown-menu">
                                        <form class="form-inline">
                                            <button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" placeholder="{{ trans('layout.search') }}">
                                        </form>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('get.profile', Auth::user()->id) }}"><i class="far fa-user-circle"></i>  {{ trans('layout.profile') }}</a></li>
                                        <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>  {{ trans('layout.logout') }}</a></li></li>
                                    </ul>
                                </li> 
                            </ul>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <footer>
            <div class="container">
                <div class="row">                
                    <div class="col-md-6 footer-social">
                        <a class="facebook" href="#"><i class="fab fa-facebook"></i></a>
                        <a class="google" href="#"><i class="fab fa-google-plus"></i></a>
                        <a class="twitter" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="pinterest" href="#"><i class="fab fa-pinterest"></i></a>
                        <a class="blog" href="#"><i class="fa fa-rss"></i></a>
                        <a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a>     
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="copyright"><small>{{ trans('layout.copyright') }}<i class="far fa-heart"></i></small></p>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>
    </div>
    <script src="{{ asset('bower_components/bower-hai/js/jquery.min.js') }}"></script> 
    <script src="{{ asset('bower_components/bower-hai/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/bower-hai/js/plugins.js') }}"></script> 
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{ asset('bower_components/bower-hai/js/init.js') }}"></script>
</body>
</html>
