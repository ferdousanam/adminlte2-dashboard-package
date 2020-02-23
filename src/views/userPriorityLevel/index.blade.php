@extends('dashboard::layouts.app')

@push('css')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard/assets/plugins/iCheck/all.css') }}">
@endpush

@section('page_title', 'User Priority Level')
@section('page_tagline', 'User Priority Level ')

@section('content')
    @include('dashboard::msg.message')
    <!--begin::Palette-->
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> User Priority Level </h3>
        </div>

        <!--begin::Form-->
        <form id="menu-form" action="{{ route('user-priority-level.update',1) }}" method="POST" class="form-horizontal">
            <div class="box-body">
                @method('PUT')
                @csrf

                <div class="col-md-4"></div>
                <div class="col-md-4 form-group text-center">
                    <label class="align-self-center text-center"><h2>User Type Name *</h2></label>
                    <div></div>
                    <select name="priority_id" id="priority_id" class="custom-select form-control chosen" required
                            onchange="getAppModuleView();">
                        <option value="">Select A User Type</option>
                        @if(isset($priority) && count($priority)>0)
                            @foreach ($priority as $pr)
                                <option value="{{$pr->id}}">{{$pr->priority_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div id="appmodule_view"></div>
            </div>
            <div class="box-footer" style="display: none;">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--end::Palette-->
@endsection
@push('scripts')
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('vendor/dashboard/assets/plugins/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript">
        $('#user-priority-level-mm').addClass('active');

        function getAppModuleView() {
            $('.box-footer').hide();
            $('#appmodule_view').html(
                '<div class="col-md-2"></div><div class="col-md-8"><h4 class="alert alert-success text-center">Loading...</h4></div>'
            );
            var pr_id = $('#priority_id').val();
            if (pr_id !== "") {
                $.ajax({
                    url: "{{ route('user-priority-level.index') }}/" + pr_id,
                    type: 'GET',
                    data: {},
                    success: function (data) {
                        $('#appmodule_view').html(data);
                    }
                }).done(function () {
                    $('.box-footer').show();
                });

            } else {
                $('#appmodule_view').html(
                    '<div class="col-md-1"></div><div class="align-self-center col-md-10"><h4 class="alert alert-danger text-center">Please Select User Type Name</h4></div>'
                );
            }
        }
    </script>
@endpush
