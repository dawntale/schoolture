<nav class="col-md-3 d-none d-md-block bg-light sidebar border-right">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url(route('admin.dashboard')) }}"><span data-feather="home"></span>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span data-feather="user"></span>Staff</a>
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
                <a class="nav-link" href="#"><span data-feather="user"></span>Student</a>
                <ul class="pl-2 nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('dashboard.student')) }}"><span data-feather="users"></span>All Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('dashboard.student.create')) }}"><span data-feather="user-plus"></span>Add New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span data-feather="user-plus"></span>Add Grade</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span data-feather="user-plus"></span>Add Class</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>