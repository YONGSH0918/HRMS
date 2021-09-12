<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Human Resource Management System</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/ext-core/3.1.0/ext-core.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>

    <script defer src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">

    @yield('css')

</head>

<body>

    <div class="wrapper">

        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>HRM System</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('admin.home') }}">Dashboard</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Employee Management</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ route('viewEmployee') }}">Employees</a>
                        </li>
                        <li>
                            <a href="{{ route('viewCPD') }}">Career Path Development</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('viewVA') }}">Vaccination Management</a>
                </li>
                <li>
                    <a href="#">Attendance</a>
                </li>
                <li>
                    <a href="#">Leave</a>
                </li>
                <li>
                    <a href="#">Payroll</a>
                </li>
                <li>
                    <a href="{{ route('admin.recruitment') }}">
                        Online Recruitment <span class="label label-pill label-danger count"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('showCalendar') }}">Calendar</a>
                </li>
                <li>
                    <a href="#pageSubmenu" class="dropdown-toggle" data-bs-toggle="collapse" aria-expanded="false">
                        Settings<i class="fas fa-sort-down" style="margin-left:60%;"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ route('showState') }}">{{ __('State') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showCity') }}">{{ __('City') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showCountry') }}">{{ __('Country') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showBankname') }}">{{ __('Bank Name') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showDept') }}">{{ __('Department') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showJobtitle') }}">{{ __('Job Title') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showEmployment') }}">{{ __('Employment Type') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('showWRKtime') }}">{{ __('Working Time') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('viewHealthFacility') }}">Health Facility</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-secondary">
                        <i class="fas fa-align-left"></i>
                    </button>

                    <ul class="navbar-nav ms-auto">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="label label-pill label-danger count"></span>
                                <i class="fas fa-bell fa-lg"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li style="font-size: 12px;">No Notification Found</li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>

                </div>
            </nav>

            <div class="content-header mt-3">
                @yield('content-header')
            </div>


            <div id="content">
                <main>
                    @yield('content')
                </main>
            </div>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/onlinerecruit.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

        });

        function openForm(evt, formName) {
            var i, navcontent, navlinks;
            navcontent = document.getElementsByClassName("navcontent");
            for (i = 0; i < navcontent.length; i++) {
                navcontent[i].style.display = "none";
            }

            navlinks = document.getElementsByClassName("nav-link");
            for (i = 0; i < navlinks.length; i++) {
                navlinks[i].className = navlinks[i].className.replace(" active", "");
            }

            document.getElementById(formName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>

    @yield('script')

</body>

</html>