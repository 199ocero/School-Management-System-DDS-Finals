<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" href="https://dl.dropboxusercontent.com/s/anz6ejg73qeb5lh/robot.svg" type="image/x-icon"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/datepicker.css">

    <style>
       hr {
            margin-top: 1rem;
            margin: 1rem;
            border: 0;
            border-top: 1px solid rgba(255, 255, 255, 0.199);
        }
    </style>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="yellow">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a class="simple-text logo-mini"></a>
                <a class="simple-text logo-normal">Admin Panel</a>
            </div>
            
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    
                    <li>
                        <a href="/dashboard">
                            <i class="fas fa-th-large"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <hr/>
                    <p style="margin-left: 1.5rem; color:white;" class="font-weight-light">User Management</p>
                    
                    <li>
                        <a href="/admin">
                            <i class="fas fa-users-cog"></i>
                            <p>Admins</p>
                        </a>
                    </li>
                    {{-- class="{{ 'instructors' == request()->path() ? 'active': ''}}" --}}
                    <li>
                        <a href="/instructor">
                            <i class="fas fa-user-tie"></i>
                            <p>Instructors</p>
                        </a>
                    </li>
                    {{-- class="{{ 'students' == request()->path() ? 'active': ''}}" --}}
                    <li>
                        <a href="/student">
                            <i class="fas fa-user-friends"></i>
                            <p>Students</p>
                        </a>
                    </li>
                    <hr/>
                    <p style="margin-left: 1.5rem; color:white" class="font-weight-light">School Management</p>
                    <li>
                        <a href="/college">
                            <i class="fas fa-home"></i>
                            <p>Colleges</p>
                        </a>
                    </li>
                    <li>
                        <a href="/course">
                            <i class="fas fa-scroll"></i>
                            <p>Courses</p>
                        </a>
                    </li>
                    <li>
                        <a href="/subject">
                            <i class="fas fa-book"></i>
                            <p>Subjects</p>
                        </a>
                    </li>
                    <li>
                        <a href="/section">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <p>Sections</p>
                        </a>
                    </li>
                    <hr/>
                    <p style="margin-left: 1.5rem; color:white" class="font-weight-light">Role Management</p>
                    <li>
                        <a href="/student-role">
                            <i class="fas fa-home"></i>
                            <p>Student Roles</p>
                        </a>
                    </li>
                    <li>
                        <a href="/instructor-role">
                            <i class="fas fa-home"></i>
                            <p>Instructor Roles</p>
                        </a>
                    </li>
                    <hr/>
                    <p style="margin-left: 1.5rem; color:white" class="font-weight-light">Security Management</p>
                    <li>
                        <a href="/security">
                            <i class="fas fad fa-key"></i>
                            <p>API Key</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand">UPortal - Hussle free access to University Portal</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                @yield('content')

            </div>

            <footer class="footer">
                <div class=" container-fluid ">
                    <div class="copyright" id="copyright">
                        &copy; <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>, Designed and Coded by <a href="https://www.facebook.com/UPortalv1" target="_blank">UPortal Dev</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script>
        @if (session('status'))
            swal({
                title: 'Success',
                text: '{{session('status')}}',
                icon: '{{session('statuscode')}}',
                button: "Got it!",
            });
        @endif
    </script>
    @yield('scripts')
</body>


</html>
