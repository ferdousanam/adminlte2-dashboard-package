@extends('dashboard::layouts.app')

@section('page_title', 'Edit User Type')
@section('page_tagline', 'Edit User Type')

@section('content')
  @include('dashboard::msg.message')
  <!--begin::Palette-->
  <div class="box box-default color-palette-box">
      <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i></h3>
      </div>
      <!--begin::Form-->
    <form id="menu-form" action="{{ route('user-type.update', $user_type->id) }}" method="POST" class="form-horizontal">
        <div class="box-body">
        @method('PUT')
        @csrf

        <div class="form-group row">
          <label for="priority_name" class="col-sm-2 control-label">User Type:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" id="priority_name" name="priority_name" value="{{ old('priority_name', $user_type->priority_name) }}" placeholder="User Type" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="priority_description" class="col-sm-2 control-label">Description:</label>
          <div class="col-sm-10">
            <textarea name="priority_description" id="priority_description" class="form-control" rows="10" placeholder="Type Description">{{ old('priority_description', $user_type->priority_description) }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="priority_status" class="col-sm-2 control-label">Status:</label>
          <div class="col-sm-10">
            <div class="radio-inline">
              <label class="radio">
                <input type="radio" name="priority_status" value="1"
                  {{(old('priority_status', $user_type->priority_status) == 1) ? 'checked' : ''}}>
                Active
                <span></span>
              </label>
              <label class="radio">
                <input type="radio" name="priority_status" value="0"
                  {{(old('priority_status', $user_type->priority_status) == 0) ? 'checked' : ''}}>
                Inactive
                <span></span>
              </label>
            </div>
            <span class="form-text text-muted"></span>
          </div>
        </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-10">
                    <a href="{{ route('user-type.index') }}" class="btn btn-primary">Cancel</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </div>
    </form>
  </div>
  <!--end::Palette-->
@endsection

@push('scripts')
  <script>
      $('#user-types-mm').addClass('active menu-open');
      $('#user-types--edit-sm').addClass('active');
  </script>
@endpush
