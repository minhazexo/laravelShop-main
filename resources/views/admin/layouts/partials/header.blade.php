<!-- CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Flot Core -->
<script src="{{ asset('admin/assets/vendors/jquery.flot/jquery.flot.js') }}"></script>

<!-- Flot Plugins -->
<script src="{{ asset('admin/assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>


<!-- Your chart init -->
<script>
$(function () {
    const data = [
        { label: "Sales", data: [[1, 10], [2, 20], [3, 15], [4, 25]] }
    ];
    $.plot("#flotChart", data, {
        series: { lines: { show: true }, points: { show: true } },
        grid: { hoverable: true, clickable: true }
    });
});
</script>

<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i data-feather="search"></i>
                    </div>
                </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
        </form>
        <ul class="navbar-nav">
            <!-- Language Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mt-1 flag-icon flag-icon-us" title="us"></i>
                    <span class="ml-1 mr-1 font-weight-medium d-none d-md-inline-block">English</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a href="javascript:;" class="py-2 dropdown-item"><i class="flag-icon flag-icon-us"></i> English</a>
                    <a href="javascript:;" class="py-2 dropdown-item"><i class="flag-icon flag-icon-fr"></i> French</a>
                    <a href="javascript:;" class="py-2 dropdown-item"><i class="flag-icon flag-icon-de"></i> German</a>
                    <a href="javascript:;" class="py-2 dropdown-item"><i class="flag-icon flag-icon-pt"></i> Portuguese</a>
                    <a href="javascript:;" class="py-2 dropdown-item"><i class="flag-icon flag-icon-es"></i> Spanish</a>
                </div>
            </li>

            <!-- Apps Dropdown -->
            <li class="nav-item dropdown nav-apps">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="appsDropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium">Web Apps</p>
                        <a href="javascript:;" class="text-muted">Edit</a>
                    </div>
                    <div class="dropdown-body">
                        <div class="d-flex align-items-center apps">
                            <a href="pages/apps/chat.html"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>
                            <a href="pages/apps/calendar.html"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>
                            <a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a>
                            <a href="pages/general/profile.html"><i data-feather="instagram" class="icon-lg"></i><p>Profile</p></a>
                        </div>
                    </div>
                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>

            <!-- Messages Dropdown -->
            <li class="nav-item dropdown nav-messages">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="mail"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="messageDropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium">9 New Messages</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="dropdown-body">
                        <a href="javascript:;" class="dropdown-item">
                            <div class="figure">
                                <img src="{{ asset('assets/images/screenshots/30x30.jpg') }}" alt="userr">
                            </div>
                            <div class="content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Leonardo Payne</p>
                                    <p class="sub-text text-muted">2 min ago</p>
                                </div>
                                <p class="sub-text text-muted">Project status</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item">
                            <div class="figure">
                                <img src="{{ asset('assets/images/screenshots/30x30.jpg') }}" alt="userr">
                            </div>
                            <div class="content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Carl Henson</p>
                                    <p class="sub-text text-muted">30 min ago</p>
                                </div>
                                <p class="sub-text text-muted">Client meeting</p>
                            </div>
                        </a>
                        <!-- Add more messages here with the same 30x30 placeholder -->
                    </div>
                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>

            <!-- Notifications Dropdown -->
            <li class="nav-item dropdown nav-notifications">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell"></i>
                    <div class="indicator">
                        <div class="circle"></div>
                    </div>
                </a>
                <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                    <div class="dropdown-header d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium">6 New Notifications</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="dropdown-body">
                        <a href="javascript:;" class="dropdown-item">
                            <div class="icon"><i data-feather="user-plus"></i></div>
                            <div class="content"><p>New customer registered</p><p class="sub-text text-muted">2 sec ago</p></div>
                        </a>
                        <a href="javascript:;" class="dropdown-item">
                            <div class="icon"><i data-feather="gift"></i></div>
                            <div class="content"><p>New Order Received</p><p class="sub-text text-muted">30 min ago</p></div>
                        </a>
                        <!-- Add more notifications here -->
                    </div>
                    <div class="dropdown-footer d-flex align-items-center justify-content-center">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>

            <!-- Profile Dropdown -->
            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/images/screenshots/30x30.jpg') }}" alt="profile">
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="mb-3 figure">
                            <img src="{{ asset('assets/images/screenshots/80x80.jpg') }}" alt="">
                        </div>
                        <div class="text-center info">
                            <p class="mb-0 name font-weight-bold">Amiah Burton</p>
                            <p class="mb-3 email text-muted">amiahburton@gmail.com</p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="p-0 pt-3 profile-nav">
                            <li class="nav-item">
                                <a href="pages/general/profile.html" class="nav-link">
                                    <i data-feather="user"></i> <span>Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link">
                                    <i data-feather="edit"></i> <span>Edit Profile</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link">
                                    <i data-feather="repeat"></i> <span>Switch User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link">
                                    <i data-feather="log-out"></i> <span>Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</nav>
