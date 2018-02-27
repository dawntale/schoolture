<nav class="navbar navbar-expand navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <ul class="navbar-nav px-3 ml-auto">
        @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('student.login') }}">Student Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('staff.login') }}">Staff Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Admin Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                @if(request()->route()->getName() === 'admin.dashboard')
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @elseif(request()->route()->getName() === 'staff.dashboard')
                <a class="dropdown-item" href="{{ route('staff.logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('staff.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <a class="dropdown-item" href="{{ route('student.logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endif
            </div>
        </li>
        @endguest
    </ul>
</nav>