@extends('dashboard::layouts.app')

@section('page_title', 'Edit User')
@section('page_tagline', 'Edit User')

@section('content')
    @include('dashboard::msg.message')
    <!--begin::Palette-->
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i></h3>
        </div>
        <!--begin::Form-->
        <form id="menu-form" action="{{ route('user.update', $user->id) }}" method="POST" class="form-horizontal">
            <div class="box-body">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">Full Name:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="name" name="name"
                               value="{{ old('name', $user->name) }}" placeholder="Full Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" id="email" name="email"
                               value="{{ old('email', $user->email) }}" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 control-label">Password:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" id="password" name="password"
                               placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="update_password" class="col-sm-2 control-label">Update Password:</label>
                    <div class="col-sm-10">
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="update_password" value="1">
                                Update Password
                                <span></span>
                            </label>
                            <label class="radio">
                                <input type="radio" name="update_password" value="0" checked>
                                Don't Update Password
                                <span></span>
                            </label>
                        </div>
                        <span class="form-text text-muted"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_level" class="col-sm-2 control-label">User Level:</label>
                    <div class="col-sm-10">
                        <select name="user_level" id="user_level" class="form-control chosen" required>
                            <option value="">Select User Level</option>
                            @if(isset($priority) && count($priority)>0)
                                @foreach ($priority as $pr)
                                    <option
                                        value="{{$pr->id}}" {{ ($pr->id == old('user_level', $user->user_level))? 'selected' : '' }}
                                    >{{$pr->priority_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 control-label">Status *</label>
                    <div class="col-sm-10">
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status" value="1"
                                    {{(old('status', $user->status) !== 0) ? 'checked' : ''}}>
                                Active
                                <span></span>
                            </label>
                            <label class="radio" style="float: left">
                                <input type="radio" name="status" value="0"
                                    {{(old('status', $user->status) === 0) ? 'checked' : ''}}>
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
                        <a href="{{ route('user.index') }}" class="btn btn-primary">Cancel</a>
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
        $('#user-mm').addClass('active menu-open');
        $('#user--edit-sm').addClass('active');
    </script>
@endpush
