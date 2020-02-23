@extends('dashboard::layouts.app')

@section('page_title', 'User Profile')
@section('page_tagline', Auth::user()->name)

@push('css')
@endpush

@section('content')
    <!--Begin::App-->
    <div class="row">
        @include('dashboard::profile.partials.left-side-widget')
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-tag"></i> Change Password <small>change or reset your account password</small></h3>
                </div>
                <form method="POST" action="{{ route('update-password') }}" class="form-horizontal">
                    <div class="box-body">
                        @csrf
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 control-label">Current Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control" value="" placeholder="Current password" name="current_password">
                                <span class="form-text text-danger">{{ ($errors->has('current_password')) ? $errors->first('current_password') : '' }}</span>
                                <span class="form-text text-danger">{{ (Session::has('current_password')) ? Session::get('current_password') : '' }}</span>
                                <a href="#" class="kt-link kt-font-sm kt-font-bold kt-margin-t-5">Forgot password ?</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 control-label">New Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control" value="" placeholder="New password" name="password">
                                <span class="form-text text-danger">{{ ($errors->has('password')) ? $errors->first('password') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group form-group-last row">
                            <label class="col-xl-3 col-lg-3 control-label">Confirm Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="password" class="form-control" value="" placeholder="Verify password" name="password_confirmation">
                                <span class="form-text text-danger">{{ ($errors->has('password_confirmation')) ? $errors->first('password_confirmation') : '' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 control-label">
                            </div>
                            <div class="col-lg-9 col-xl-6">
                                <button type="submit" class="btn btn-primary">Change Password</button>&nbsp;
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End::App-->

@endsection
@push('scripts')
    <script>
        $('#profile-change-password-link').addClass('kt-widget__item--active');
        @if((Session::has('success')))
        toastr.success("{{ Session::get('success') }}");
        @endif
        @if((Session::has('error')))
        toastr.success("{{ Session::get('error') }}");
        @endif
    </script>
@endpush
