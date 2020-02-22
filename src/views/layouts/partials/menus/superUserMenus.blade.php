<li class="header">Super Admin Menu</li>
<li id="user-mm" class="treeview">
    <a href="javascript:;">
        <i class="fa fa-users"></i><span>User</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li id="main-menus-sm">
            <a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i><span>Show All User</span></a>
        </li>
        <li id="main-menus--create-sm">
            <a href="{{ route('user.create') }}"><i class="fa fa-circle-o"></i><span>Add New User</span></a>
        </li>
    </ul>
</li>
<li id="user-mm" class="treeview">
    <a href="javascript:;">
        <i class="fa fa-home"></i><span>User Types</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li id="main-menus-sm">
            <a href="{{ route('user-type.index') }}"><i class="fa fa-circle-o"></i><span>Show User Types</span></a>
        </li>
        <li id="main-menus--create-sm">
            <a href="{{ route('user-type.create') }}"><i class="fa fa-circle-o"></i><span>Create User Type</span></a>
        </li>
    </ul>
</li>
<li id="user-priority-level-mm">
  <a href="{{ route('user-priority-level.index') }}"><i class="fa fa-cog"></i><span>User Priority Settings</span></a>
</li>
