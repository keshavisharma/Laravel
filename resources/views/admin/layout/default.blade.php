<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>New Project</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{url('public/admin-assets')}}/app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('public/admin-assets')}}/app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('public/admin-assets')}}/app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('public/admin-assets')}}/app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('public/admin-assets')}}/app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="{{url('public/admin-assets')}}/app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/app-assets/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('public/admin-assets')}}/assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="{{route('admin-dashboard')}}" class="navbar-brand nav-link"><img alt="branding logo" src="{{url('public/admin-assets')}}/app-assets/images/logo/robust-logo-light.png" data-expand="{{url('public/admin-assets')}}/app-assets/images/logo/robust-logo-light.png" data-collapse="{{url('public/admin-assets')}}/app-assets/images/logo/robust-logo-small.png" class="brand-logo"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                @if(session('user'))
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
            </ul>
            @php
                $user = App\Model\Registration::where('email',session('user'))->first();
            @endphp
            <ul class="nav navbar-nav float-xs-right">
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{url('public/admin-assets')}}/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name">{{$user->name}}</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a><a href="#" class="dropdown-item"><i class="icon-mail6"></i> My Inbox</a><a href="#" class="dropdown-item"><i class="icon-clipboard2"></i> Task</a><a href="#" class="dropdown-item"><i class="icon-calendar5"></i> Calender</a>
                  <div class="dropdown-divider"></div><a href="{{route('admin-logout')}}" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
            @else
            <ul class="nav navbar-nav">
                <li><a href="{{route('admin-login')}}" class="btn btn-warning">Login</a></li>
            </ul>
            @endif
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href="{{route('admin-register')}}"><i class="icon-android-checkmark-circle"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Register</span></a>
          </li>
          {{-- <li class=" nav-item"><a href="{{route('admin-images')}}"><i class="icon-images"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">Images</span></a>
          </li> --}}
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Statistics -->

          @yield('content')

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border">
      Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
      <div>Made with <i class="icon-heart"></i> by <a href="https://www.instagram.com/the_happy_nature_snaps">Keshavi</div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{url('public/admin-assets')}}/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="{{url('public/admin-assets')}}/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="{{url('public/admin-assets')}}/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{url('public/admin-assets')}}/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="{{url('public/admin-assets')}}/app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="{{url('public/admin-assets')}}/app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="{{url('public/admin-assets')}}/app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="{{url('public/admin-assets')}}/app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="{{url('public/admin-assets')}}/app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{url('public/admin-assets')}}/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{url('public/admin-assets')}}/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{url('public/admin-assets')}}/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{url('public/admin-assets')}}/app-assets/js/scripts/pages/dashboard-2.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    @yield('footer-js')
  </body>
</html>
