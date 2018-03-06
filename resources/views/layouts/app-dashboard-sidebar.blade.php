<nav class="col-md-3 d-none d-md-block bg-light sidebar border-right p-0 py-3">
    <div class="sidebar-sticky">
        <ul class="nav flex-column" id="side-menu">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url(route('admin.dashboard')) }}"><span data-feather="home"></span>Dashboard</a>
            </li>
            <!-- Manage School -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('*department*') || Request::is('*grade*') || Request::is('*class*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-school" aria-expanded="false" role="button"><span data-feather="globe"></span>Manage School<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#side-school" id="side-school" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*department*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-department" aria-expanded="false" role="button"><span data-feather="user-plus"></span>Department<span class="float-right" data-feather="chevron-down"></span></a>
                        <ul id="side-department" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-school">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*department') ? 'active' : '' }}" href="{{ url(route('dashboard.department.index')) }}"><span data-feather="user-plus"></span>All Department</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*department/create') ? 'active' : '' }}" href="{{ url(route('dashboard.department.create')) }}"><span data-feather="user-plus"></span>Create Department</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*grade*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-grade" aria-expanded="false" role="button"><span data-feather="user-plus"></span>Grade<span class="float-right" data-feather="chevron-down"></span></a>
                        <ul id="side-grade" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-school">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*grade') ? 'active' : '' }}" href="{{ url(route('dashboard.grade.index')) }}"><span data-feather="user-plus"></span>All Grade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*grade/create') ? 'active' : '' }}" href="{{ url(route('dashboard.grade.create')) }}"><span data-feather="user-plus"></span>Create Grade</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*class*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-class" aria-expanded="false" role="button"><span data-feather="user-plus"></span>Class<span class="float-right" data-feather="chevron-down"></span></a>
                        <ul id="side-class" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-school">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*class') ? 'active' : '' }}" href="{{ url(route('dashboard.class.index')) }}"><span data-feather="user-plus"></span>All Class</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*class/create') ? 'active' : '' }}" href="{{ url(route('dashboard.class.create')) }}"><span data-feather="user-plus"></span>Create Class</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <!-- Manage Staff & Position -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('*staff*') || Request::is('*position*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-staff" aria-expanded="false" role="button"><span data-feather="user"></span>Manage Staff & Position<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#side-staff" id="side-staff" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*staff*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-staff2" aria-expanded="false" role="button"><span data-feather="user-plus"></span>Staff<span class="float-right" data-feather="chevron-down"></span></a>
                        <ul id="side-staff2" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-staff">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*staff') ? 'active' : '' }}" href="{{ url(route('dashboard.staff.index')) }}"><span data-feather="user-plus"></span>All Staff</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*staff/create') ? 'active' : '' }}" href="{{ url(route('dashboard.staff.create')) }}"><span data-feather="user-plus"></span>Create Staff</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*position*') ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" role="button"><span data-feather="user-plus"></span>Add Position</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span data-feather="user"></span>Manage Student</a>
                <ul class="pl-2 nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('dashboard.student')) }}"><span data-feather="users"></span>All Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('dashboard.student.create')) }}"><span data-feather="user-plus"></span>Add New</a>
                    </li>
                </ul>
            </li>

            <!-- Manage Subject -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('*subject*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-subject" aria-expanded="false" role="button"><span data-feather="globe"></span>Manage Subject<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#side-subject" id="side-subject" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*subject/create') ? 'active' : '' }}" href="{{ route('dashboard.subject.create') }}"><span data-feather="plus-square"></span>Add Subject</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*subject/assign-teacher') ? 'active' : '' }}" href="{{ route('dashboard.subject.teacher') }}"><span data-feather="plus-square"></span>Assign Teacher</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span data-feather="user"></span>Manage Subject</a>
                <ul class="pl-2 nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.subject.create') }}"><span data-feather="plus-square"></span>Add Subject</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.subject.teacher') }}"><span data-feather="plus-square"></span>Assign Teacher</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
@section('script')
    <script type="text/javascript">
        if($('.sidebar .nav-link').hasClass('active')){
            $('.active').siblings('.collapse').addClass('show');
        };
    </script>
@endsection