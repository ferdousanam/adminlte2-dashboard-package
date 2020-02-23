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
  @include('dashboard::layouts.inc.stylesheets')

  <!--begin::Global Theme Styles(used by all pages) -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>

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
            <span class="logo-mini">{!! logoBadge() !!}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>{{ config('app.name') }}</b></span>
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
                {{--<ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>--}}
            </section>

        <!-- Main content -->
        <section class="content">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('dashboard::layouts.partials.footer')
</div>
@include('dashboard::layouts.inc.scripts')
@stack('scripts')

</body>
<!-- begin::Body -->
</html>
