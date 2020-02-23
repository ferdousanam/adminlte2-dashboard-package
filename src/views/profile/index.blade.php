@extends('dashboard::layouts.app')

@section('page_title', 'User Information')
@section('page_tagline', Auth::user()->name)

@push('css')
@endpush

@section('content')
    <!--Begin::App-->
    <div class="row" id="user_profile">
        @include('dashboard::profile.partials.left-side-widget')
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-tag"></i> User Information</h3>
                </div>
                <form class="form-horizontal">
                    <div class="box-body box-profile">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <li class="time-label">
                                <i class="fa fa-user bg-aqua"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header text-primary text-bold">User Info:</h3>
                                    <div class="timeline-body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3">Last Successful Login</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <p class="">{{ (isset(Auth::user()->last_login_at)) ? Auth::user()->last_login_at->format('d-m-Y h:i:s A') : '' }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3">Last Failed Login</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <p class="">{{ (isset(Auth::user()->last_failed_login_at) ? Auth::user()->last_failed_login_at->format('d-m-Y h:i:s A') : '') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!--End::App-->

@endsection
@push('scripts')
    <script>
        $('#profile-overview-link').addClass('kt-widget__item--active');
    </script>
@endpush
