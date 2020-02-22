<li class="header">Developer Options</li>
<li id="project-details-mm">
  <a href="{{ route('project-details.index') }}"><i class="fa fa-cog"></i><span>Project Details</span></a>
</li>
<li id="main-menus-mm" class="treeview">
    <a href="javascript:;">
        <i class="fa fa-home"></i><span>Main Menus</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li id="main-menus-sm">
            <a href="{{ route('main-menu.index') }}"><i class="fa fa-circle-o"></i><span>Show Main Menus</span></a>
        </li>
        <li id="main-menus--create-sm">
            <a href="{{ route('main-menu.create') }}"><i class="fa fa-circle-o"></i><span>Create Main Menu</span></a>
        </li>
    </ul>
</li>
<li id="sub-menus-mm" class="treeview">
    <a href="javascript:;">
        <i class="fa fa-home"></i><span>Sub Menu</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li id="sub-menus-sm" class="">
            <a href="{{ route('sub-menu.index') }}"><i class="fa fa-circle-o"></i><span>Show Sub Menus</span></a>
        </li>
        <li id="sub-menus--create-sm" class="">
            <a href="{{ route('sub-menu.create') }}"><i class="fa fa-circle-o"></i><span>Create Sub Menu</span></a>
        </li>
    </ul>
</li>
<li id="menu-visibility-mm" class="treeview">
  <a href="{{ route('menu-visibility.index') }}"><i class="fa fa-cog"></i><span>Menu Visibility</span></a>
</li>
