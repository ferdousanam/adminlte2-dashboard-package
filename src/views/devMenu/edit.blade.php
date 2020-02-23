@extends('dashboard::layouts.app')

@section('page_title', 'Edit Main Menu')
@section('page_tagline', 'Edit Main Menu')

@section('content')
    @include('dashboard::msg.message')
    <!--begin::Palette-->
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i></h3>
        </div>
        <!--begin::Form-->
        <form id="menu-form" action="{{ route('main-menu.update', $main_menu->id) }}" method="POST"
              class="form-horizontal">
            <div class="box-body">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label for="serial_no" class="col-sm-2 control-label">Serial No *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="serial_no" name="serial_no"
                               value="{{ old('serial_no', $main_menu->serial_no) }}" placeholder="Serial No." required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu_name" class="col-sm-2 control-label">Menu Title *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="menu_name" name="menu_name"
                               value="{{ old('menu_name', $main_menu->menu_name) }}" placeholder="Menu Title" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="selector" class="col-sm-2 control-label">Selector *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="selector" name="selector"
                               value="{{ old('selector', $main_menu->selector) }}" placeholder="Menu ID Selector"
                               required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="route_name" class="col-sm-2 control-label">Route Url *</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="route_name" name="route_name"
                               value="{{ old('route_name', $main_menu->route_name) }}" placeholder="Route Url" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon" class="col-sm-2 control-label">Icon Name</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="{{ old('icon', $main_menu->icon) }}"></i>
                            </div>
                            <input class="form-control" type="text" id="icon" name="icon" placeholder="fa fa-home"
                                   value="{{ old('icon', $main_menu->icon) }}" aria-describedby="icon">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 control-label">Status *</label>
                    <div class="col-sm-10">
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status" value="1"
                                    {{(old('status', $main_menu->status) !== 0) ? 'checked' : ''}}>
                                Active
                                <span></span>
                            </label>
                            <label class="radio" style="float: left">
                                <input type="radio" name="status" value="0"
                                    {{(old('status', $main_menu->status) === 0) ? 'checked' : ''}}>
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
                        <a href="{{ route('main-menu.index') }}" class="btn btn-primary">Cancel</a>
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
        $('#main-menus-mm').addClass('active menu-open');
        $('#main-menus--edit-sm').addClass('active');
    </script>
@endpush
