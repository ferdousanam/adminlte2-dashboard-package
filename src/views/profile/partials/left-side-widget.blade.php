<div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ (Auth::user()->profile_image) ? asset('uploads/profile-image/'.Auth::user()->profile_image) : asset('uploads/profile-image/default.png') }}" alt="User profile picture">

            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

            <p class="text-muted text-center">{{ Auth::user()->priority->priority_name }}</p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Email</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                </li>
                <li class="list-group-item">
                    <b>Phone</b> <a class="pull-right">{{ (isset(Auth::user()->profile->phone)) ? Auth::user()->profile->phone : '' }}</a>
                </li>
                <li class="list-group-item">
                    <b>Location</b> <a class="pull-right">{{ (isset(Auth::user()->profile->address)) ? Auth::user()->profile->address : '' }}</a>
                </li>
            </ul>

            {{--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <a href="{{ route('profile.index') }}">
                <strong>Profile Overview</strong>
            </a>
            <hr>
            <a href="{{ route('profile.edit', 0) }}">
                <strong>Update Information</strong>
            </a>
            <hr>
            <a href="{{ route('edit-avatar') }}">
                <strong>Update Avatar</strong>
            </a>
            <hr>
            <a href="{{ route('edit-password') }}">
                <strong>Change Password</strong>
            </a>
            <hr>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
