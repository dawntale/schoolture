<nav class="col-md-3 d-none d-md-block bg-light sidebar border-right p-0 py-3">
    <div class="sidebar-sticky">
        <ul class="nav flex-column" id="side-menu">
            <!-- Dashboard -->
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
                        <a class="nav-link {{ Request::is('*staff*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-staff2" aria-expanded="false" role="button"><span data-feather="user"></span>Staff<span class="float-right" data-feather="chevron-down"></span></a>
                        <ul id="side-staff2" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-staff">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*staff') ? 'active' : '' }}" href="{{ url(route('dashboard.staff.index')) }}"><span data-feather="users"></span>All Staff</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*staff/create') ? 'active' : '' }}" href="{{ url(route('dashboard.staff.create')) }}"><span data-feather="user-plus"></span>Create Staff</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*position*') ? 'active' : '' }}" href="{{ route('dashboard.position.index') }}"><span data-feather="navigation"></span>Add Position</a>
                    </li>
                </ul>
            </li>

            <!-- Manage Student -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('*student*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-student" aria-expanded="false" role="button"><span data-feather="user"></span>Manage Student<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#side-student" id="side-student" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*student') ? 'active' : '' }}" href="{{ route('dashboard.student.index') }}"><span data-feather="users"></span>All Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*student/create') ? 'active' : '' }}" href="{{ route('dashboard.student.create') }}"><span data-feather="user-plus"></span>Create Student</a>
                    </li>
                </ul>
            </li>

            <!-- Manage Subject -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('*subject*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-subject" aria-expanded="false" role="button"><span data-feather="book-open"></span>Manage Subject<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#side-subject" id="side-subject" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*subject/create') ? 'active' : '' }}" href="{{ route('dashboard.subject.create') }}"><span data-feather="book"></span>Add Subject</a>
                    </li>
                </ul>
            </li>

            <!-- Manage Lesson -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('*lesson*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-lesson" aria-expanded="false" role="button"><span data-feather="book-open"></span>Manage Lesson<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#side-lesson" id="side-lesson" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*lesson') ? 'active' : '' }}" href="{{ route('dashboard.lesson.index') }}"><span data-feather="book"></span>All Lesson</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*lesson/create') ? 'active' : '' }}" href="{{ route('dashboard.lesson.create') }}"><span data-feather="log-in"></span>Create Lesson</a>
                    </li>
                </ul>
            </li>

            <!-- Manage Schedule -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('*schedule*') || Request::is('*session*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-schedule" aria-expanded="false" role="button"><span data-feather="calendar"></span>Manage Schedule<span class="float-right" data-feather="chevron-down"></span></a>
                <ul data-toggled="#side-schedule" id="side-schedule" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*schedule*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#side-sch" aria-expanded="false" role="button"><span data-feather="user-plus"></span>Schedule<span class="float-right" data-feather="chevron-down"></span></a>
                        <ul id="side-sch" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-schedule">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('*schedule*') ? 'active' : '' }}" href="{{ route('dashboard.schedule.index') }}"><span data-feather="user-plus"></span>Add Schedule</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('*session*') ? 'active' : '' }}" href="{{ route('dashboard.session.index') }}"><span data-feather="user-plus"></span>Session Block</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>