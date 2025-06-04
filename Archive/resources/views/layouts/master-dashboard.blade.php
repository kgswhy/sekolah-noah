<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from joblly-admin-template-dashboard.multipurposethemes.com/bs5/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 08:20:10 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/assets/imgs/logo-icon.png">

    <title>Sekolah NOAH - Dashboard Page</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/skin_color.css">
    @yield('styles')

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        <div id="loader"></div>

        <header class="main-header">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <a href="#"
                    class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent"
                    data-toggle="push-menu" role="button">
                    <i data-feather="menu"></i>
                </a>
                <!-- Logo -->
                <a href="index.html" class="logo">
                    <!-- logo-->
                    <div class="logo-lg">
                        <span class="light-logo">
                            <img src="/assets/imgs/logo-text.png" alt="logo" style="height: 50px;">
                        </span>
                        <span class="dark-logo">
                            <img src="/assets/imgs/logo-text.png" alt="logo" style="height: 50px;">
                        </span>
                    </div>
                </a>
            </div>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div class="app-menu">
                    <ul class="header-megamenu nav">
                        <li class="btn-group nav-item d-md-none">
                            <a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu"
                                role="button">
                                <i data-feather="menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown"
                                title="Notifications">
                                <i data-feather="bell"></i>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">
                                <li class="header">
                                    <div class="p-20">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">Notifications</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu sm-scrol">
                                        <li>
                                            <a href="#">
                                                <i data-feather="users" class="text-info"></i> Curabitur id eros quis
                                                nunc suscipit blandit.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i data-feather="alert-triangle" class="text-warning"></i> Duis
                                                malesuada justo eu sapien elementum, in semper diam posuere.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i data-feather="users" class="text-danger"></i> Donec at nisi sit amet
                                                tortor commodo porttitor pretium a erat.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i data-feather="shopping-cart" class="text-success"></i> In gravida
                                                mauris et nisi
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i data-feather="user" class="text-danger"></i> Praesent eu lacus in
                                                libero dictum fermentum.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i data-feather="user" class="text-primary"></i> Nunc fringilla lorem
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i data-feather="user-check" class="text-success"></i> Nullam euismod
                                                dolor ut quam interdum, at scelerisque ipsum imperdiet.
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown"
                                title="User">
                                <i data-feather="user"></i>
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <a class="dropdown-item" href="#"><i data-feather="user"
                                            class="text-muted me-2"></i> Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout"><i data-feather="lock"
                                            class="text-muted me-2"></i> Logout</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar position-relative">
                <div class="user-profile px-20 py-10">
                    <div class="d-flex align-items-center">
                        <div class="image">
                            <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/avatar-13.png"
                                class="avatar avatar-lg bg-primary-light rounded100" alt="User Image">
                        </div>
                        <div class="info">
                            <a class="dropdown-toggle px-20" data-bs-toggle="dropdown"
                                href="#">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="ti-user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
                                <a class="dropdown-item" href="#"><i class="ti-link"></i> Connections</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline profile-setting mt-20 mb-0 d-flex justify-content-between">
                        <li><a href="#" data-bs-toggle="tooltip" title="Search"><i
                                    data-feather="search"></i></a></li>
                        <li><a href="#" data-bs-toggle="tooltip" title="Notification"><i
                                    data-feather="bell"></i></a>
                        </li>
                        <li><a href="#" data-bs-toggle="tooltip" title="Chat"><i
                                    data-feather="message-square"></i></a>
                        </li>
                        <li><a href="/logout" data-bs-toggle="tooltip" title="Logout"><i
                                    data-feather="log-out"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 100%;">
                        <!-- sidebar menu-->
                        <ul class="sidebar-menu" data-widget="tree">

                            <!-- Dashboard -->
                            <li class="treeview">
                                <a href="#"><i data-feather="grid"></i> <span>Dashboard</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/dashboard">Reports</a></li>
                                </ul>
                            </li>

                            <!-- Users -->
                            <li class="treeview">
                                <a href="#"><i data-feather="user-plus"></i> <span>Users (Pengguna)</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/users">Management User</a></li>
                                </ul>
                            </li>

                            <!-- Peraturan dan SOP -->
                            <li class="treeview">
                                <a href="#"><i data-feather="file-text"></i> <span>Peraturan dan SOP</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/regulasi">Peraturan</a></li>
                                    <li><a href="/sop">SOP (Standar Operasional Prosedur)</a></li>
                                </ul>
                            </li>

                            <!-- Kalender -->
                            <li>
                                <a href="/dashboard/calendar"><i data-feather="calendar"></i>
                                    <span>Kalender</span></a>
                            </li>

                            <!-- Pengajuan Kepegawaian -->
                            <li class="treeview">
                                <a href="#"><i data-feather="folder-plus"></i> <span>Pengajuan
                                        Kepegawaian</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/cuti">Tidak Masuk (Cuti/Izin/Sakit)</a></li>
                                    <li><a href="/brief-absen">Izin Meninggalkan Pekerjaan (Brief Absen)</a></li>
                                    <li><a href="/klaim-berobat">Klaim Berobat Jalan</a></li>
                                    <li><a href="/slip-gaji-skk">Permintaan Slip Gaji / Surat Keterangan Kerja</a></li>
                                    <li><a href="/pinjaman-cicilan">Pinjaman dan Cicilan</a></li>
                                    <li><a href="/lembur-honor">Lembur dan Honor Kegiatan</a></li>
                                    <li><a href="/surat-tugas">Surat Tugas dan Perjalanan Dinas</a></li>
                                </ul>
                            </li>

                            <!-- Pengadaan, Pemeliharaan, dan Peminjaman -->
                            <li class="treeview">
                                <a href="#"><i data-feather="package"></i> <span>Pengadaan, Pemeliharaan, dan
                                        Peminjaman</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/administrasi/request-fotocopy">Pengajuan Fotocopy</a></li>
                                    <li><a href="/administrasi/request-atk">Pengajuan ATK</a></li>
                                    <li><a href="/it/fixing-request">Permintaan Perbaikan Barang</a></li>
                                    <li><a href="/it/equipment-loan">Peminjaman Barang</a></li>
                                    <li><a href="/operasional/peminjaman">Peminjaman Ruangan</a></li>
                                    <li><a href="/permintaan-design">Permintaan Design</a></li>
                                    <li><a href="/operasional/kurir-mobil">Permintaan Kurir dan Mobil</a></li>
                                    <li><a href="/pengajuan-dana-bank">Pengajuan Dana dan LPJ</a></li>
                                    <li><a href="/surat-masuk">Surat Masuk</a></li>
                                    <li><a href="/surat-keluar">Surat Keluar</a></li>
                                </ul>
                            </li>

                            <!-- Kepegawaian -->
                            <li class="treeview">
                                <a href="#"><i data-feather="users"></i> <span>Kepegawaian</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/employee">Data Pegawai</a></li>
                                    <li><a href="/absence">Absensi</a></li>
                                    <li><a href="/payroll">Payroll</a></li>
                                    <li><a href="/shifts">Shift</a></li>
                                    <li><a href="/schedules">Schedule</a></li>
                                </ul>
                            </li>

                            <!-- Keuangan -->
                            <li class="treeview">
                                <a href="#"><i data-feather="credit-card"></i> <span>Keuangan</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/finance/pembayaran-siswa">Pembayaran Siswa</a></li>
                                    <li><a href="/finance/aktiva-tetap">Aset & Inventaris</a></li>
                                    <li><a href="/operasional/stok-barang">Stok Opname</a></li>
                                </ul>
                            </li>

                            <!-- Penerimaan Siswa -->
                            <li class="treeview">
                                <a href="#"><i data-feather="book-open"></i> <span>Penerimaan Siswa</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/admission/pendaftaran">Pendaftaran Siswa Baru</a></li>
                                    <li><a href="/admission/daftar-ulang">Pendaftaran Ulang Siswa</a></li>
                                </ul>
                            </li>

                            <!-- Kesiswaan -->
                            <li class="treeview">
                                <a href="#"><i data-feather="book"></i> <span>Kesiswaan</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/students">Data Siswa</a></li>
                                    <li><a href="/kelas">Kelas</a></li>
                                </ul>
                            </li>

                            <!-- Akademik -->
                            <li class="treeview">
                                <a href="#"><i data-feather="layers"></i> <span>Akademik</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/akademik/jadwal">Jadwal Pelajaran</a></li>
                                    <li><a href="/kelas">Kelas</a></li>
                                    <li><a href="/akademik/mapel">Mata Pelajaran</a></li>
                                    <li><a href="/akademik/ekskul">Ekstrakurikuler</a></li>
                                    <li><a href="/akademik/kehadiran">Kehadiran Siswa</a></li>
                                    <li><a href="/akademik/foto-kegiatan">Foto Kegiatan</a></li>
                                    <li><a href="/akademik/rapor">Rapor</a></li>
                                </ul>
                            </li>

                            <!-- DMS -->
                            <li class="treeview">
                                <a href="#"><i data-feather="cloud"></i> <span>Dokumen Manajemen
                                        System</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/dms/akademik">Akademik</a></li>
                                    <li><a href="/dms/hrd">HRD</a></li>
                                    <li><a href="/dms/finance">Finance</a></li>
                                    <li><a href="/dms/administrasi">Administrasi</a></li>
                                    <li><a href="/dms/it">IT</a></li>
                                    <li><a href="/dms/operasional">Operasional</a></li>
                                    <li><a href="/dms/admission">Admission</a></li>
                                    <li><a href="/dms/projek">Projek</a></li>
                                </ul>
                            </li>

                            <!-- Pengumuman -->
                            <li class="treeview">
                                <a href="#"><i data-feather="bell"></i> <span>Pengumuman</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/pengumuman">Pengumuman</a></li>
                                    <li><a href="/task">Task</a></li>
                                </ul>
                            </li>

                            <!-- Setting -->
                            <li class="treeview">
                                <a href="#"><i data-feather="settings"></i> <span>Setting</span></a>
                                <ul class="treeview-menu">
                                    <li><a href="/setting/hak-akses">Hak Akses</a></li>
                                    <li><a href="/setting/approval">Approval</a></li>
                                    <li><a href="/setting/general">General Setting</a></li>
                                </ul>
                            </li>

                        </ul>



                    </div>
                </div>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Main content -->
                <div class="content-header">
                    @yield('content-header')
                    @yield('header')
                </div>
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block">
                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Purchase Now</a>
                    </li>
                </ul>
            </div>
            &copy; 2021 <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
        </footer> -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar">

            <div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i
                        class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>
            <!-- Create the tabs -->
            <ul class="nav nav-tabs control-sidebar-tabs">
                <li class="nav-item"><a href="#control-sidebar-home-tab" data-bs-toggle="tab" class="active"><i
                            class="mdi mdi-message-text"></i></a></li>
                <li class="nav-item"><a href="#control-sidebar-settings-tab" data-bs-toggle="tab"><i
                            class="mdi mdi-playlist-check"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane active" id="control-sidebar-home-tab">
                    <div class="flexbox">
                        <a href="javascript:void(0)" class="text-grey">
                            <i class="ti-more"></i>
                        </a>
                        <p>Users</p>
                        <a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
                    </div>
                    <div class="lookup lookup-sm lookup-right d-none d-lg-block">
                        <input type="text" name="s" placeholder="Search" class="w-p100">
                    </div>
                    <div class="media-list media-list-hover mt-20">
                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-success" href="#">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/1.jpg"
                                    alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Tyler</strong></a>
                                </p>
                                <p>Praesent tristique diam...</p>
                                <span>Just now</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-danger" href="#">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/2.jpg"
                                    alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Luke</strong></a>
                                </p>
                                <p>Cras tempor diam ...</p>
                                <span>33 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-warning" href="#">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/3.jpg"
                                    alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-primary" href="#">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/4.jpg"
                                    alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-success" href="#">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/1.jpg"
                                    alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Tyler</strong></a>
                                </p>
                                <p>Praesent tristique diam...</p>
                                <span>Just now</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-danger" href="#">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/2.jpg"
                                    alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Luke</strong></a>
                                </p>
                                <p>Cras tempor diam ...</p>
                                <span>33 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-warning" href="#">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/3.jpg"
                                    alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-primary" href="#">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/4.jpg"
                                    alt="...">
                            </a>
                            <div class="media-body">
                                <p class="fs-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <div class="flexbox">
                        <a href="javascript:void(0)" class="text-grey">
                            <i class="ti-more"></i>
                        </a>
                        <p>Todo List</p>
                        <a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
                    </div>
                    <ul class="todo-list mt-20">
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_1" class="filled-in">
                            <label for="basic_checkbox_1" class="mb-0 h-15"></label>
                            <!-- todo text -->
                            <span class="text-line">Nulla vitae purus</span>
                            <!-- Emphasis label -->
                            <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_2" class="filled-in">
                            <label for="basic_checkbox_2" class="mb-0 h-15"></label>
                            <span class="text-line">Phasellus interdum</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_3" class="filled-in">
                            <label for="basic_checkbox_3" class="mb-0 h-15"></label>
                            <span class="text-line">Quisque sodales</span>
                            <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_4" class="filled-in">
                            <label for="basic_checkbox_4" class="mb-0 h-15"></label>
                            <span class="text-line">Proin nec mi porta</span>
                            <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_5" class="filled-in">
                            <label for="basic_checkbox_5" class="mb-0 h-15"></label>
                            <span class="text-line">Maecenas scelerisque</span>
                            <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_6" class="filled-in">
                            <label for="basic_checkbox_6" class="mb-0 h-15"></label>
                            <span class="text-line">Vivamus nec orci</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_7" class="filled-in">
                            <label for="basic_checkbox_7" class="mb-0 h-15"></label>
                            <!-- todo text -->
                            <span class="text-line">Nulla vitae purus</span>
                            <!-- Emphasis label -->
                            <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_8" class="filled-in">
                            <label for="basic_checkbox_8" class="mb-0 h-15"></label>
                            <span class="text-line">Phasellus interdum</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_9" class="filled-in">
                            <label for="basic_checkbox_9" class="mb-0 h-15"></label>
                            <span class="text-line">Quisque sodales</span>
                            <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_10" class="filled-in">
                            <label for="basic_checkbox_10" class="mb-0 h-15"></label>
                            <span class="text-line">Proin nec mi porta</span>
                            <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- ./side demo panel -->
    <!-- Sidebar -->



    <!-- Page Content overlay -->


    <!-- Vendor JS -->
    <script src="/js/vendors.min.js"></script>
    <script src="/js/pages/chat-popup.js"></script>
    <script
        src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/assets/icons/feather-icons/feather.min.js">
    </script>

    <script
        src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js">
    </script>
    <script
        src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/assets/vendor_components/moment/min/moment.min.js">
    </script>
    <script
        src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/assets/vendor_components/fullcalendar/fullcalendar.js">
    </script>

    <!-- Joblly App -->
    <script src="/js/template.js"></script>
    <script src="/js/pages/dashboard.js"></script>
    <script src="/js/pages/calendar-dash.js"></script>

    @yield('scripts')

</body>

<!-- Mirrored from joblly-admin-template-dashboard.multipurposethemes.com/bs5/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 08:22:07 GMT -->

</html>
