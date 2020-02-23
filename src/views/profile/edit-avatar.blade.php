@extends('dashboard::layouts.app')

@section('page_title', 'Edit Profile')
@section('page_tagline', Auth::user()->name)

@section('content')
  <!--Begin::App-->
  <div class="row">
  @include('dashboard::profile.partials.left-side-widget')
      <div class="col-md-9">
          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-tag"></i> Update Avatar <small>update your avatar</small></h3>
              </div>
              <form method="POST" action="{{ route('update-avatar') }}" class="form-horizontal" enctype="multipart/form-data">
                  <div class="box-body">
                      @csrf
                      <div class="form-group row">
                          <div class="col-lg-3 col-xl-3"></div>
                          <div class="col-lg-9 col-xl-6 avatar-upload">
                              <img src="{{ (Auth::user()->profile_image) ? asset('uploads/profile-image/'.Auth::user()->profile_image) : asset('uploads/profile-image/default.png') }}" class="rounded" alt="{{ $user->profile_image }}">
                          </div>
                      </div>
                      <div class="form-group form-group-last row">
                          <label class="col-xl-3 col-lg-3 control-label">Profile Avatar</label>
                          <div class="col-lg-9 col-xl-6">
                              <div class="custom-file">
                                  <input type="file" class="form-control" id="profile_avatar" name="profile_avatar" accept=".png, .jpg, .jpeg">
                              </div>
                              <span class="form-text text-danger">{{ ($errors->has('profile_avatar')) ? $errors->first('profile_avatar') : '' }}</span>
                          </div>
                      </div>
                  </div>
                  <div class="box-footer">
                      <div class="row">
                          <div class="col-xl-3 col-lg-3 control-label">
                          </div>
                          <div class="col-lg-9 col-xl-6">
                              <button type="submit" class="btn btn-success">Update</button>&nbsp;
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
      $('#edit-avatar-link').addClass('kt-widget__item--active');
      @if((Session::has('success')))
      toastr.success("{{ Session::get('success') }}");
      @endif

      @if((Session::has('error')))
      toastr.success("{{ Session::get('error') }}");
      @endif

  </script>
@endpush
