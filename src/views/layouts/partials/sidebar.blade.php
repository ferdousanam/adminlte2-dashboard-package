<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ getLoginName() }}</p>
                {{--<!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navigation Menus</li>
            {!! indent(generate_multilevel_menus()) !!}
            @if(super_user())
                @include('dashboard::layouts.partials.menus.superUserMenus')
            @endif
            @if(super_user() && developer_mode())
                @include('dashboard::layouts.partials.menus.devMenus')
            @endif
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
