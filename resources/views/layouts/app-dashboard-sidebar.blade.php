<nav class="col-md-3 d-none d-md-block bg-light sidebar border-right">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url(route('admin.dashboard')) }}"><span data-feather="home"></span>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span data-feather="file"></span>Staff</a>
                
                <ul class="pl-2 nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('admin.staff')) }}"><span data-feather="file"></span>Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('admin.newStaff')) }}"><span data-feather="file"></span>Add New</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span data-feather="shopping-cart"></span>Students</a>
                <ul class="pl-2 nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url(route('admin.student')) }}"><span data-feather="file"></span>All Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span data-feather="file"></span>Add New</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>