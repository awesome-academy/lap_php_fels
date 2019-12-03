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
                                    <a href="{{ route('home') }}" >Home</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <?php cate_parent($categories) ?>
                                    </ul>
                                </li>
                                <li class=""><a href="contact-us.html">Contact Us</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
                                    <ul class="dropdown-menu">
                                        <form class="form-inline" method="get" action="{{ route('search') }}">
                                            <button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" name="search" placeholder="Search">
                                        </form>
                                    </ul>
                                </li>
                                <li class="dropdown" >
                                    <div style=" padding: 16px">
                                        <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" aria-expanded="true">
                                            <i class="far fa-bell" style="font-size: 20px; color: black">
                                            </i>
                                        <span class="badge badge-danger count-notification" data-count="{{ count(Auth::user()->unreadNotifications) }}">{{ count(Auth::user()->unreadNotifications) }}</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-left pull-right" role="menu" aria-labelledby="dropdownMenu1">
                                            <li role="presentation">
                                                <a class="dropdown-menu-header text-center channel" data-channel="{{ Auth::user()->id }}">Notifications</a>
                                            </li>
                                            <div style="margin:10px; width:430px; padding-left: 0px" class="notifications">
                                                @foreach (Auth::user()->notifications as $key => $notification)
                                                    <div>
                                                        <div class="col-sm-10">
                                                            <a href="{{ route('get.all.lession', [$notification->data['course_id'], $notification->data['course_slug']]) }}"> {{ $notification->data['title'] }} <b>{{ $notification->data['content'] }}</b></a>
                                                            <i class="timeline-date">{{ $notification->created_at->diffForHumans() }} </i>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            @if (! $notification->read_at)
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Mark as read!" class="read" data-id="{{ $notification->id }}" data-type="0"><i class="fas fa-circle"></i></a>
                                                            @else
                                                                <a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Mark as unread!" class="read" data-id="{{ $notification->id }}" data-type="1"> <i class="far fa-circle"></i></a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <li role="presentation">
                                                <a href="#" class="text-center dropdown-menu-header">View all</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('get.profile',Auth::user()->id) }}"><i class="far fa-user-circle"></i>  Profile</a></li>
                                        <li>
                                            <a href="{{ route('get.logout') }}"><i class="fas fa-sign-out-alt"></i>  Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <header id="home" class="backstretched single-page-hero">
            <div class="dark-overlay single-page-hero">
                <div class="container single-page-hero">
                    <div class="vertical-center-js text-center">
                        @yield('header')
                    </div>
                </div>
            </div>
        </header>

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
