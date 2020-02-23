@extends('dashboard::layouts.app')

@section('page_title', 'Add New User')
@section('page_tagline', 'Add New User')

@section('content')
    @include('dashboard::msg.message')
    <!--begin::Palette-->
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i></h3>
        </div>
        <!--begin::Form-->
        <form id="menu-form" action="{{ route('user.store') }}" method="POST" class="form-horizontal">
            <div class="box-body">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">Full Name:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}"
                               placeholder="Full Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}"
                               placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 control-label">Password:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password"
                               value="{{ old('password') }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_level" class="col-sm-2 control-label">User Level:</label>
                    <div class="col-sm-10">
                        <select name="user_level" id="user_level" class="form-control chosen" required>
                            <option value="">Select User Level</option>
                            @if(isset($priority) && count($priority)>0)
                                @foreach ($priority as $pr)
                                    <option value="{{$pr->id}}">{{$pr->priority_name}}</option>
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
                                    {{(old('status') !== 0) ? 'checked' : ''}}>
                                Active
                                <span></span>
                            </label>
                            <label class="radio" style="float: left">
                                <input type="radio" name="status" value="0"
                                    {{(old('status') === 0) ? 'checked' : ''}}>
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
    <!--end::Portlet-->
@endsection

@push('scripts')
    <script>
        $('#user-mm').addClass('active menu-open');
        $('#user--create-sm').addClass('active');
    </script>
@endpush
