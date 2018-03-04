<nav class="col-md-3 d-none d-md-block bg-light sidebar border-right p-0 py-3">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url(route('admin.dashboard')) }}"><span data-feather="home"></span>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#side-school" aria-expanded="false" role="button"><span data-feather="globe"></span>Manage School<span class="float-right" data-feather="chevron-down"></a>
                <ul data-toggled="#side-school" id="side-school" class="ml-4 list-unstyled flex-column collapse border-left">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-toggle="collapse" data-target="#side-department" aria-expanded="false" role="button"><span data-feather="user-plus"></span>Department<span class="float-right" data-feather="chevron-down"></a>
                        <ul id="side-department" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-school">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url(route('dashboard.department.index')) }}"><span data-feather="user-plus"></span>All Department</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url(route('dashboard.department.create')) }}"><span data-feather="user-plus"></span>Create Department</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-toggle="collapse" data-target="#side-grade" aria-expanded="false" role="button"><span data-feather="user-plus"></span>Grade<span class="float-right" data-feather="chevron-down"></a>
                        <ul id="side-grade" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-school">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url(route('dashboard.grade.index')) }}"><span data-feather="user-plus"></span>All Grade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url(route('dashboard.grade.create')) }}"><span data-feather="user-plus"></span>Create Grade</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-toggle="collapse" data-target="#side-class" aria-expanded="false" role="button"><span data-feather="user-plus"></span>Class<span class="float-right" data-feather="chevron-down"></a>
                        <ul id="side-class" class="ml-4 list-unstyled flex-column collapse border-left" data-parent="#side-school">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url(route('dashboard.class.index')) }}"><span data-feather="user-plus"></span>All Class</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url(route('dashboard.class.create')) }}"><span data-feather="user-plus"></span>Create Class</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span data-feather="user"></span>Manage Staff</a>
                <ul class="pl-2 nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('dashboard.staff')) }}"><span data-feather="users"></span>All Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('dashboard.staff.create')) }}"><span data-feather="user-plus"></span>Add New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('dashboard.position.index')) }}"><span data-feather="plus-square"></span>Manage Position</a>
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