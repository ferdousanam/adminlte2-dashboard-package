<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->

<head>
  <base href="">
  <meta charset="utf-8"/>
  <title>{{ config('app.name') }} | @yield('page_tagline')</title>
  <meta name="description" content="Latest updates and statistic charts">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="base-url" content="{{ url('/') }}">

    <link rel="stylesheet" href="{{ asset('vendor/dashboard/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard/assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard/assets/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard/assets/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard/assets/dist/css/skins/skin-blue.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

  <!--begin::Global Theme Styles(used by all pages) -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>

  <!--end::Global Theme Styles -->


  <!--begin::Layout Skins(used by all pages) -->

  <!--end::Layout Skins -->
  <link rel="shortcut icon" href="{{asset('uploads/project-info/') . '/' . project()->app_icon}}"/>
  <script>
    window.base_url = '{{ url("/") }}';
  </script>
@stack('css')

<!-- Custom Theme Style -->
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{ route('dashboard.index') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        @include('dashboard::layouts.partials.header-navbar')
    </header>

    @include('dashboard::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('page_title')
                    <small>@yield('optional_description')</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>

        <!-- Main content -->
        <section class="content container-fluid">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('dashboard::layouts.partials.footer')
</div>

<!-- jQuery 3 -->
<script src="{{ asset('vendor/dashboard/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('vendor/dashboard/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/dashboard/assets/dist/js/adminlte.min.js') }}"></script>

@stack('scripts')

</body>
<!-- begin::Body -->
</html>
