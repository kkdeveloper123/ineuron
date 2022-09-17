<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('templates\libraries\assets\images\favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\bower_components\bootstrap\css\bootstrap.min.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\assets\icon\feather\css\feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\assets\css\jquery.mCustomScrollbar.css') }}">

    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\assets\icon\icofont\css\icofont.css') }}">
    <!-- jquery file upload Frame work -->
    <link href="{{ asset('templates\libraries\assets\pages\jquery.filer\css\jquery.filer.css') }}" type="text/css" rel="stylesheet">

    <!-- NOTIFY -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\bower_components\pnotify\css\pnotify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\bower_components\pnotify\css\pnotify.brighttheme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\bower_components\pnotify\css\pnotify.buttons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\bower_components\pnotify\css\pnotify.mobile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\assets\pages\pnotify\notify.css') }}">

    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{ asset('templates\libraries\bower_components\select2\css\select2.min.css') }}">
    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\bower_components\multiselect\css\multi-select.css') }}">

    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\assets\pages\data-table\css\buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css') }}">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\assets\css\style.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

    <script type="text/javascript" src="{{ asset('templates\libraries\bower_components\jquery\js\jquery.min.js') }}">
    </script>

</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        @if (session('flash-error'))
        <span class="admin-toastr" onclick="toastr_alert('Error','{{ session()->get('flash-error') }}','error')"></span>
        @endif
        @if (session('flash-success'))
        <span class="admin-toastr" onclick="toastr_alert('Success','{{ session()->get('flash-success') }}','success')"></span>
        @endif

        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="index-1.htm">
                            <img class="img-fluid" src="{{ asset('templates\libraries\assets\images\logo.png') }}" alt="Theme-Logo">
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            {{-- <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i
                                                class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i
                                                class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li> --}}
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="" class="img-radius" alt="User-Profile-Image">
                                        <span></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="{{ route('admin.getProfile') }}">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.logout') }}">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <!-- Sidebar inner chat start-->
            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-chevron-left"></i> Josephin Doe
                    </a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="{{ asset('templates\libraries\assets\images\avatar-3.jpg') }}" alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about
                                yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about
                                yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media-right photo-table">
                        <a href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src="{{ asset('templates\libraries\assets\images\avatar-4.jpg') }}" alt="Generic placeholder image">
                        </a>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="{{ route('admin.dashboard') }}">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="{{ route('admin.usersIndex') }}">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Users</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('admin.categoryIndex') }}">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Category</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('admin.subadminIndex') }}">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Subadmin</span>
                                    </a>
                                </li>

                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-layers"></i>
                                        </span>
                                        <span class="pcoded-mtext">Pages</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{ route('admin.privacyPolicy') }}">
                                                <span class="pcoded-mtext">Privacy Policy</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Settings</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="{{ route('admin.settingIndex') }}">
                                                <span class="pcoded-mtext">Google Authentication</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.emailSettingIndex') }}">
                                                <span class="pcoded-mtext">Email</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    @yield('content')

                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    var base_url = "<?php echo url('') . '/'; ?>";
    var csrf_token = "{{ csrf_token() }}";
</script>


<!-- Required Jquery -->
<script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script>
<script type="text/javascript" src="{{ asset('templates\libraries\bower_components\jquery-ui\js\jquery-ui.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('templates\libraries\bower_components\popper.js\js\popper.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('templates\libraries\bower_components\bootstrap\js\bootstrap.min.js') }}">
</script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('templates\libraries\bower_components\jquery-slimscroll\js\jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('templates\libraries\bower_components\modernizr\js\modernizr.js') }}">
</script>
<!-- Chart js -->
<script type="text/javascript" src="{{ asset('templates\libraries\bower_components\chart.js\js\Chart.js') }}"></script>
<!-- amchart js -->
<script src="{{ asset('templates\libraries\assets\pages\widget\amchart\amcharts.js') }}"></script>
<script src="{{ asset('templates\libraries\assets\pages\widget\amchart\serial.js') }}"></script>
<script src="{{ asset('templates\libraries\assets\pages\widget\amchart\light.js') }}"></script>
<script src="{{ asset('templates\libraries\assets\js\jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('templates\libraries\assets\js\SmoothScroll.js') }}"></script>
<script src="{{ asset('templates\libraries\assets\js\pcoded.min.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('templates\libraries\assets\js\vartical-layout.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('templates\libraries\assets\pages\dashboard\custom-dashboard.js') }}">
</script>
<script type="text/javascript" src="{{ asset('templates\libraries\assets\js\script.min.js') }}"></script>


<!-- jquery file upload js -->
<script src="{{ asset('templates\libraries\assets\pages\jquery.filer\js\jquery.filer.min.js') }}"></script>
<script src="{{ asset('templates\libraries\assets\pages\filer\custom-filer.js') }}"></script>
<script src="{{ asset('templates\libraries\assets\pages\filer\jquery.fileuploads.init.js') }}"></script>
<!-- Select 2 js -->
<script type="text/javascript" src="{{ asset('templates\libraries\bower_components\select2\js\select2.full.min.js') }}"></script>


<!-- Multiselect js -->
<script type="text/javascript" src="{{ asset('templates\libraries\bower_components\bootstrap-multiselect\js\bootstrap-multiselect.js') }}">
</script>
<script type="text/javascript" src="{{ asset('templates\libraries\bower_components\multiselect\js\jquery.multi-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('templates\libraries\assets\js\jquery.quicksearch.js') }}"></script>

{{-- <script type="text/javascript"
    src="{{ asset('templates\libraries\assets\pages\advance-elements\select2-custom.js') }}"></script> --}}

<!-- data-table js -->
<script src="{{ asset('templates\libraries\bower_components\datatables.net\js\jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('templates\libraries\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js') }}">
</script>
<script src="{{ asset('templates\libraries\assets\pages\data-table\js\jszip.min.js') }}"></script>
<script src="{{ asset('templates\libraries\assets\pages\data-table\js\pdfmake.min.js') }}"></script>
<script src="{{ asset('templates\libraries\assets\pages\data-table\js\vfs_fonts.js') }}"></script>
<script src="{{ asset('templates\libraries\bower_components\datatables.net-buttons\js\buttons.print.min.js') }}">
</script>
<script src="{{ asset('templates\libraries\bower_components\datatables.net-buttons\js\buttons.html5.min.js') }}">
</script>
<script src="{{ asset('templates\libraries\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('templates\libraries\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('templates\libraries\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js') }}">
</script>

<!-- NOTIFY TOASTER -->
<script type="text/javascript" src="{{ asset('templates\libraries\bower_components\pnotify\js\pnotify.js') }}">
</script>

<script type="text/javascript" src="{{ asset('templates\libraries\assets\pages\pnotify\notify.js') }}"></script>



<script type="text/javascript" src="{{ asset('admin\js\custom.js') }}"></script>