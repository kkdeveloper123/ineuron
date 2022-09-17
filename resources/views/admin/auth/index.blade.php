<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('templates\libraries\assets\images\favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templates\libraries\bower_components\bootstrap\css\bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templates\libraries\assets\icon\themify-icons\themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templates\libraries\assets\icon\icofont\css\icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\assets\css\style.css') }}">

    <!-- NOTIFY -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templates\libraries\bower_components\pnotify\css\pnotify.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templates\libraries\bower_components\pnotify\css\pnotify.brighttheme.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templates\libraries\bower_components\pnotify\css\pnotify.buttons.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('templates\libraries\bower_components\pnotify\css\pnotify.mobile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates\libraries\assets\pages\pnotify\notify.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    
    <script type="text/javascript" src="{{ asset('templates\libraries\bower_components\jquery\js\jquery.min.js') }}">
    </script>

</head>

<body class="fix-menu">
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

    @if (session('flash-error'))
        <span class="admin-toastr"
            onclick="toastr_alert('Error','{{ session()->get('flash-error') }}','error')"></span>
    @endif
    @if (session('flash-success'))
        <span class="admin-toastr"
            onclick="toastr_alert('Success','{{ session()->get('flash-success') }}','success')"></span>
    @endif

    @yield('content')

    <script type="text/javascript" src="{{ asset('templates\libraries\bower_components\jquery-ui\js\jquery-ui.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('templates\libraries\bower_components\popper.js') }}\js\popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('templates\libraries\bower_components\bootstrap\js\bootstrap.min.js') }}">
    </script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript"
        src="{{ asset('templates\libraries\bower_components\jquery-slimscroll\js\jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('templates\libraries\bower_components\modernizr\js\modernizr.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('templates\libraries\bower_components\modernizr\js\css-scrollbars.js') }}"></script>
    <script type="text/javascript" src="{{ asset('templates\libraries\bower_components\i18next\js\i18next.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('templates\libraries\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('templates\libraries\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('templates\libraries\bower_components\jquery-i18next\js\jquery-i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('templates\libraries\assets\js\common-pages.js') }}"></script>


    <!-- NOTIFY TOASTER -->
    <script type="text/javascript" src="{{ asset('templates\libraries\bower_components\pnotify\js\pnotify.js') }}">
    </script>

    <script type="text/javascript" src="{{ asset('templates\libraries\assets\pages\pnotify\notify.js') }}"></script>


    <script type="text/javascript" src="{{ asset('admin\js\custom.js') }}"></script>

</body>

</html>
