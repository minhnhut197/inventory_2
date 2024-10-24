<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WareMaster</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/_all-skins.css')}}"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/css/perfect-scrollbar.min.css"
        integrity="sha512-ygIxOy3hmN2fzGeNqys7ymuBgwSCet0LVfqQbWY10AszPMn2rB9JY0eoG0m1pySicu+nvORrBmhHVSt7+GI9VA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pagination.less') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    <style>
        .sidebar-mini {
            height: 630px;
            /* Đặt chiều cao của container */
            overflow: hidden;
            /* Ẩn thanh cuộn mặc định của trình duyệt */
        }

        .modal-content {
            background-color: white;
        }
    </style>
    @yield('css')
    @stack('styles')
</head>

<body>
    {{-- @include('livewire.body-component'); --}}
    <div class="container-scroller">
        {{-- <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas skin-blue" id="sidebar" style="border:2px solid var(--primary); ">
            <div
                class="bg-sidebar sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top ">
                <a class="text-decoration-none p-0 sidebar-brand brand-logo  d-block d-flex align-items-center justify-content-center "
                    style="height: 70px;border:2px solid var(--primary);border-bottom:none;"
                    href="{{ route('home') }}">
                    <span class="text-primaryy" style="font-weight: 700;font-size: 34px;">WareMaster</span>
                </a>
                {{-- <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-mini.svg"
                        alt="logo" /></a> --}}
                {{-- <div class="">
                    <h1>fdkh</h1>
                </div> --}}
            </div>
            <ul class="sidebar-menu nav" data-widget="tree">
                <li class="treeview nav-item profile">
                    <a href="# " class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                @auth
                                    <img class="img-xs rounded-circle"
                                        src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('images/avatars/default-avatar.jpg') }}"
                                        alt="">
                                    <span class="count bg-success"></span>
                                @else
                                    <img class="img-xs rounded-circle"
                                        src="{{ asset('assets/images/avatars/default-avatar.jpg') }}" alt="">
                                    <span class="count bg-success"></span>
                                @endauth
                            </div>
                            <div class="profile-name">
                                @auth
                                    <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                                    <span>{{ Auth::user()->role }}</span>
                                @else
                                    <h5 class="mb-0 font-weight-normal">Guest User</h5>
                                    <span>Guest</span>
                                @endauth
                            </div>
                        </div>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.bodycomponent', Auth::user()->id) }}" data-bs-toggle="modal"
                                data-bs-target="#edituser"s><img src="{{ asset('images/circle.png') }}" alt="">
                                Cập nhật thông tin</a>
                        </li>
                        {{-- <li>
                            <a href="">
                                <button type="button" wire:click.prevent="mount2({{Auth::user()->id}})"  class="btn btn-primary btn-sm edit-btn"
                                data-bs-toggle="modal" data-bs-target="#edituser"> 
                                <img src="{{ asset('images/circle.png') }}" alt=""> Cập nhật thông tin
                            </button>
                            </a>
                        </li> --}}

                        {{-- <li><a href="{{ route('admin.warehouselist') }}"> <img
                                    src="{{ asset('images/circle.png') }}" alt=""> Danh sách nhà kho</a></li>
                        <li><a href="{{ route('admin.warehouselist') }}"> <img
                                    src="{{ asset('images/circle.png') }}" alt=""> Danh sách nhà kho</a></li> --}}
                    </ul>
                </li>
                {{-- <li class="header">REPORTS</li>
                <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li> --}}
                {{-- <li class="nav-item profile ">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                @auth
                                    <img class="img-xs rounded-circle"
                                        src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('images/avatars/default-avatar.jpg') }}"
                                        alt="">
                                    <span class="count bg-success"></span>
                                @else
                                    <img class="img-xs rounded-circle"
                                        src="{{ asset('assets/images/avatars/default-avatar.jpg') }}" alt="">
                                    <span class="count bg-success"></span>
                                @endauth
                            </div>
                            <div class="profile-name">
                                @auth
                                    <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                                    <span>{{ Auth::user()->role }}</span>
                                @else
                                    <h5 class="mb-0 font-weight-normal">Guest User</h5>
                                    <span>Guest</span>
                                @endauth
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-onepassword  text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-calendar-today text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </li> --}}
                <li class="header ">MANAGE</li>
                <li class="treeview">
                    <a href="#">
                        <img src="{{ asset('images/dashboard.png') }}" alt="">
                        <span>Dashboard</span>
                        {{-- <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span> --}}
                    </a>
                    {{-- <ul class="treeview-menu">
                        <li><a href="{{ route('admin.userlist') }}"> <img src="{{ asset('images/circle.png') }}"
                                    alt=""> User List</a></li>
                    </ul> --}}
                </li>
                <li class="treeview">
                    <a href="#">
                        <img src="{{ asset('images/group.png') }}" alt="">
                        <span>Người dùng</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.userlist') }}"> <img src="{{ asset('images/circle.png') }}"
                                    alt=""> Danh sách người dùng</a></li>
                    </ul>
                </li>
                <li class="treeview ">
                    <a href="#">
                        <img src="{{ asset('images/storage.png') }}" alt="">
                        <span>Nhà kho</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.warehouselist') }}"> <img src="{{ asset('images/circle.png') }}"
                                    alt=""> Danh sách nhà kho</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <img src="{{ asset('images/supplier.png') }}" alt="">
                        <span>Đối tác</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.supplierlist') }}"> <img src="{{ asset('images/circle.png') }}"
                                    alt=""> Nhà cung cấp</a></li>
                        <li><a href="{{ route('customer') }}"> <img src="{{ asset('images/circle.png') }}"
                                    alt=""> Khách hàng</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <img src="{{ asset('images/category.png') }}" alt="">
                        <span>Danh mục và hàng hóa</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.categorylist') }}"> <img src="{{ asset('images/circle.png') }}"
                                    alt="">Danh mục</a></li>
                        <li><a href="{{ route('admin.itemlist') }}"> <img src="{{ asset('images/circle.png') }}"
                                    alt="">Hàng hóa</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <img src="{{ asset('images/category.png') }}" alt="">
                        <span>Hoạt động</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.import') }}"> <img src="{{ asset('images/circle.png') }}"
                                    alt="">Nhập hàng</a></li>
                        <li><a href="{{ route('goodissue') }}"> <img src="{{ asset('images/circle.png') }}"
                                    alt="">Xuất hàng</a></li>
                        <li><a href="{{ route('stocktake') }}"> <img src="{{ asset('images/circle.png') }}"
                                    alt="">Kiểm kho</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper ">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row" style="background-color: var(--sub)">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img
                            src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown d-none d-lg-block">
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="createbuttonDropdown">
                                <h6 class="p-3 mb-0">Projects</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-file-outline text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Software Development</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-web text-info"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">UI Development</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-layers text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Software Testing</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">See all projects</p>
                            </div>
                        </li>
                        {{-- <li class="nav-item nav-settings d-none d-lg-block">
                            <a class="nav-link" href="#">
                                <i class="mdi mdi-view-grid"></i>
                            </a>
                        </li> --}}

                        {{-- <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-email"></i>
                                <span class="count bg-success"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0">Messages</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="{{ asset('assets/images/faces/face4.jpg') }}" alt="image"
                                            class="rounded-circle profile-pic">
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                                        <p class="text-muted mb-0"> 1 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="{{ asset('assets/images/faces/face2.jpg') }}" alt="image"
                                            class="rounded-circle profile-pic">
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                                        <p class="text-muted mb-0"> 15 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="{{ asset('assets/images/faces/face3.jpg') }}" alt="image"
                                            class="rounded-circle profile-pic">
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                                        <p class="text-muted mb-0"> 18 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">4 new messages</p>
                            </div>
                        </li> --}}
                        {{-- <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown"
                                href="#" data-bs-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <span class="count bg-danger"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-calendar text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Event today</p>
                                        <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event
                                            today
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                        <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-link-variant text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Launch Admin</p>
                                        <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">See all notifications</p>
                            </div>
                        </li> --}}
                        <li class="nav-item nav-settings d-none d-lg-block">
                            <a href="{{ route('logout') }} "
                                onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();">
                                <img style="    height: 29px;margin-right: 5px;"
                                    src="{{ asset('images/shutdown.png') }}" alt="">
                            </a>

                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        {{-- <x-app-layout>
              
            </x-app-layout> --}}
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <div class="main-panel " style="height:100%;background-color:rgb(224, 228, 233)">
                {{-- {{ $slot }} --}}
                @yield('content')
            </div>
        </div>
    </div>
    @include('livewire.editusermodal')

    @livewireScripts
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"
        integrity="sha512-X41/A5OSxoi5uqtS6Krhqz8QyyD8E/ZbN7B4IaBSgqPLRbWVuXJXr9UwOujstj71SoVxh5vxgy7kmtd17xrJRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- End custom js for this page -->
    {{-- <script src="https://unpkg.com/@nextapps-be/livewire-sortablejs@0.2.0/dist/livewire-sortable.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('swal:confirm', event => {
            swal.fire({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(239 68 6)',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        window.livewire.emit(event.detail.method, event.detail.id);
                    }
                });
        });
    </script>

    @yield('js')
    @stack('scripts')
</body>

</html>
