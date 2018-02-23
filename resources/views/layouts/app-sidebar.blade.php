<ul class="nav nav-pills flex-column">
    <li class="nav-item active">
        <a href="{{ url(route('admin.dashboard')) }}" class="nav-link">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapse" href="#" data-target="#fact-submenu" aria-expanded="true"><i class="dash-icon fas fa-fw fa-chevron-down"></i> Staff</a>
        <div class="pl-2">
            <a class="nav-link" href="{{ url(route('admin.staff')) }}"><i class="fas fa-fw fa-chevron-right"></i> All Staff</a>
            <a class="nav-link" href="#"><i class="fas fa-fw fa-chevron-right"></i> Add New</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapse" href="#" data-target="#fact-submenu" aria-expanded="true"><i class="dash-icon fas fa-fw fa-chevron-down"></i> Students</a>
        <div class="pl-2">
            <a class="nav-link" href="{{ url(route('admin.student')) }}"><i class="fas fa-fw fa-chevron-right"></i> All Students</a>
            <a class="nav-link" href="#"><i class="fas fa-fw fa-chevron-right"></i> Add New</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapse" href="#" data-target="#fact-submenu" aria-expanded="true"><i class="dash-icon fas fa-fw fa-chevron-down"></i> Subjects</a>
        <div class="pl-2">
            <a class="nav-link" href="{{ url(route('admin.subject')) }}"><i class="fas fa-fw fa-chevron-right"></i> All Subjects</a>
            <a class="nav-link" href="#"><i class="fas fa-fw fa-chevron-right"></i> Add New</a>
        </div>
    </li>
</ul>