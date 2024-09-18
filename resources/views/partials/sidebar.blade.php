<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    @method('POST')
</form>
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            @if (auth()->user()->role == 'admin')
                <a class="nav-link " href="/admin">
            @else
                <a class="nav-link " href="/user">
            @endif
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#enrollment-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-clipboard-data"></i><span>Enrollment Form</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="enrollment-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.pages.registerform') }}">
                        <i class="bi bi-plus-circle"></i><span>Add Enrollment</span>
                    </a>
                </li>
                <li>
                    <a href="/enroll/list">
                        <i class="bi bi-list"></i><span>All Enrollments</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-heading">Pages</li>

        @if (auth()->user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/users/list">
                        <i class="bi bi-person"></i><span>All Users</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->
        @endif

        <li class="nav-item">
            <a href="#" onclick="event.preventDefault(); var c = confirm('Are you sure you want to logout?'); if(c) { document.getElementById('logout-form').submit(); }" class="nav-link collapsed">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Login Page Nav -->

    </ul>

</aside>