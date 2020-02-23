@extends('dashboard::layouts.app')

@section('page_title', 'Edit Profile')
@section('page_tagline', $user->name)

@section('content')
  <!--Begin::App-->
  <div class="row">

  @include('dashboard::profile.partials.left-side-widget')

      <div class="col-md-9">
          <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-tag"></i> User Information <small>update your personal information</small></h3>
              </div>
              <form action="{{ route('profile.update', 0) }}" method="post" class="form-horizontal">
                  <div class="box-body">
                      @method('PUT')
                      @csrf
                      <div class="form-group row">
                          <label class="col-xl-3 col-lg-3 control-label">Full Name</label>
                          <div class="col-lg-9 col-xl-6">
                              <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}">
                              <span class="form-text text-danger">{{ ($errors->has('name')) ? $errors->first('name') : '' }}</span>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-xl-3 col-lg-3 control-label">Company Name</label>
                          <div class="col-lg-9 col-xl-6">
                              <input class="form-control" type="text" name="company_name" value="{{ old('company_name', (isset($user->profile->company_name)) ? $user->profile->company_name : '') }}">
                              <span class="form-text text-danger">{{ ($errors->has('company_name')) ? $errors->first('company_name') : '' }}</span>
                              <span class="form-text text-muted">We don't share you company name info to others</span>
                          </div>
                      </div>
                  </div>
                  <div class="box-header with-border">
                      <h3 class="box-title"><i class="fa fa-connectdevelop"></i> Contact Information</h3>
                  </div>
                  <div class="box-body">
                      <div class="form-group row">
                          <label class="col-xl-3 col-lg-3 control-label">Contact Phone</label>
                          <div class="col-lg-9 col-xl-6">
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-phone"></i>
                                  </div>
                                  <input type="text" class="form-control" name="phone" value="{{ old('phone', (isset($user->profile->phone)) ? $user->profile->phone : '') }}" placeholder="Phone">
                              </div>
                              <span class="form-text text-danger">{{ ($errors->has('phone')) ? $errors->first('phone') : '' }}</span>
                              <span class="form-text text-muted">We'll never share your phone with anyone else.</span>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-xl-3 col-lg-3 control-label">Email Address</label>
                          <div class="col-lg-9 col-xl-6">
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-at"></i>
                                  </div>
                                  <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Email">
                              </div>
                              <span class="form-text text-danger">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</span>
                          </div>
                      </div>
                      <div class="form-group form-group-last row">
                          <label class="col-xl-3 col-lg-3 control-label">Address</label>
                          <div class="col-lg-9 col-xl-6">
                              <textarea name="address" id="address" class="form-control" rows="5" placeholder="Address">{{ old('address', (isset($user->profile->address)) ? $user->profile->address : '') }}</textarea>
                              <span class="form-text text-danger">{{ ($errors->has('address')) ? $errors->first('address') : '' }}</span>
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
      $('#profile-edit-link').addClass('kt-widget__item--active');
        @if((Session::has('success')))
          toastr.success("{{ Session::get('success') }}");
        @endif
        @if((Session::has('error')))
          toastr.success("{{ Session::get('error') }}");
        @endif
  </script>
@endpush
