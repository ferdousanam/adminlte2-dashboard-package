@extends('dashboard::layouts.app')

@push('css')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('vendor/dashboard/assets/plugins/iCheck/all.css') }}">
    <style>
        ul {
            list-style: none;
        }

        ul .col-sm-12 .main-menu > label {
            display: block;
            color: #fff;
            background-color: #337ab7;
            padding-top: 7px;
            padding-bottom: 7px;
        }

        ul .col-sm-12 > label > input ~ span {
            /*margin: 7px;*/
        }

        #appmodule_view {
            border: 1px solid #e2d7d7;
            display: block;
        }
    </style>
@endpush

@section('page_title', 'Menu Visibility')
@section('page_tagline', 'Menu Visibility')

@section('content')
    @include('dashboard::msg.message')
    <!--begin::Palette-->
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Menu Visibility</h3>
        </div>
        <!--begin::Form-->
        <form id="menu-form" action="{{ route('menu-visibility.update', 1) }}" method="POST" class="form-horizontal">
            <div class="box-body">
                @method('PUT')
                @csrf

                <div class="visibility-menus">
                    {!! indent(generate_visibility_menus()) !!}
                </div>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
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
        $(document).ready(function () {
            $('#menu-visibility-mm').addClass('active');

            $('input[type=checkbox]').on("click", function () {
                let current_menu_id = $(this).val();
                if ($(this).is(':checked')) {

                    let parent = $(this).attr('parent-id');
                    $('#menu-id-' + parent).prop('checked', true);

                    let grand_parent = $('#menu-id-' + parent).attr('parent-id');
                    $('#menu-id-' + grand_parent).prop('checked', true);

                    console.log(current_menu_id + " is checked!");
                    console.log('Parent ID: ' + parent);
                } else {
                    console.log(current_menu_id + " is unchecked!");

                    let child = $('input[parent-id=' + current_menu_id + ']');
                    child.prop('checked', false);

                    child.each(function () {
                        let next_child = $('input[parent-id=' + $(this).val() + ']');
                        next_child.prop('checked', false);
                    });
                }
            });
        });

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

    </script>
@endpush
