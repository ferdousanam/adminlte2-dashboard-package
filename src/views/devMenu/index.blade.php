@extends('dashboard::layouts.app')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('page_title', 'Main Menu')
@section('page_tagline', 'Main Menu List')

@section('content')
    @include('dashboard::components.delete-modal')
    @include('dashboard::msg.message')
    <!--begin::Palette-->
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Main Menu List</h3>
        </div>
        <div class="box-body">
            <!--begin: Datatable -->
            {!! $dataTable->table(['class' => 'table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline'], true) !!}
            <!--end: Datatable -->
        </div>
    </div>
    <!--end::Palette-->
@endsection

@push('scripts')
    @include('dashboard::scripts.delete')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#main-menus-mm').addClass('active menu-open');
            $('#main-menus-sm').addClass('active');
        });
    </script>
    <!-- DataTables -->
    <script src="{{ asset('vendor/dashboard/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/dashboard/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}" type="text/javascript"></script>
    {!! $dataTable->scripts() !!}
@endpush
