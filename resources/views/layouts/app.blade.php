<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'QBAdminUI') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('qbadminui/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('qbadminui/css/vendor/bootstrap-4.3.1/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('qbadminui/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('qbadminui/css/vendor/DataTable-1.10.20/datatables.min.css') }}"></link>

    <!-- TinyMCE script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.4.0/tinymce.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
    </style>
    <meta name="theme-color" content="#fafafa">
</head>
<body class="position-relative">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
    <div class="container-fluid px-0">
        <!-- The side bar -->
        <div class="side-bar side-bar-lg-active" data-theme="purple">
            <!-- Brand details -->
            <div class="side-menu-brand d-flex flex-column justify-content-center align-items-center clear mt-3">
                <img src="{{ asset('https://www.atvadventurepark.com/images/hutan.png') }}" alt="bran_name" class="brand-img">
                <!-- <a href="{{ route('home') }}" class="brand-name mt-2 ml-2 font-weight-bold">e-Spatial</a> -->
                <a href="{{ route('home') }}" class="brand-name mt-2 ml-2 font-weight-bold" style="text-align: center; font-size: 20px;">Permohonan Data Geospatial</a>

            </div>
            @if(Auth::user())
            <!-- Side bar menu -->
            <div class="the_menu mt-5">
                <!-- Heading -->
                <div class="side-menu-heading d-flex">
                    <h6 class=" font-weight-bold pb-2 mx-3"> {{ucwords(strtolower((Auth::user()->name)))}} </h6>
                    <a  class="font-weight-bold ml-auto px-3"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                    >
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>

                <!-- Menu item -->
                <div id="accordion">
                    <ul class="side-menu p-0 m-0 mt-3">
                        @if(Auth::user()->role == 0)
                        <li class="side-menu-item px-3"><a href="{{ route('home') }}" class="w-100 py-3 pl-4">Dashboard</a></li>
                        <!-- Sub menu parent -->
                        <!-- <li class="side-menu-item px-3"><a href="{{ route('permohonan.list') }}" class="w-100 py-3 pl-4">Senarai Permohonan #temp</a></li> -->

                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu3" aria-expanded="false" aria-controls="table-sub-menu">Senarai Permohonan </a></li>
                        <div id="table-sub-menu3" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="{{ route('permohonan.listBaru') }}" class="w-100 pl-4">Senarai Permohonan Baru </a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('permohonan.listSedangDiproses') }}" class="w-100 pl-4">Senarai Permohonan Sedang Diproses </a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('permohonan.list') }}" class="w-100 pl-4">Senarai Permohonan Lulus </a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('permohonan.listGagal') }}" class="w-100 pl-4">Senarai Permohonan Tidak Lulus </a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('permohonan.listTidakBerkaitan') }}" class="w-100 pl-4">Senarai Permohonan Tidak Berkaitan </a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('permohonan.listBatal') }}" class="w-100 pl-4">Senarai Permohonan Batal </a></li>
                                <!-- <li class="side-sub-menu-item px-3"><a href="{{ route('permohonan.listDalaman') }}" class="w-100 pl-4">Senarai Permohonan Dalaman </a></li> -->
                            </ul>
                        </div>

                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="{{ route('pengumuman.list') }}" class="w-100 py-3 pl-4" >Senarai Pengumuman</a></li>

                        @endif


                        @if( Auth::user()->role == 1 || Auth::user()->role == 2)
                        <li class="side-menu-item px-3"><a href="{{ route('home') }}" class="w-100 py-3 pl-4">Dashboard</a></li>
                        <!-- Sub menu parent -->
                        <!-- <li class="side-menu-item px-3"><a href="{{ route('permohonan.list') }}" class="w-100 py-3 pl-4">Senarai Permohonan #temp</a></li> -->

                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu3" aria-expanded="false" aria-controls="table-sub-menu">Senarai Permohonan </a></li>
                        <div id="table-sub-menu3" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="{{ route('permohonan.listBaru') }}" class="w-100 pl-4">Senarai Permohonan Baru </a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{ route('permohonan.listSedangDiproses') }}" class="w-100 pl-4">Senarai Permohonan Sedang Diproses </a></li>
                            </ul>
                        </div>

                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="{{ route('pengumuman.list') }}" class="w-100 py-3 pl-4" >Senarai Pengumuman</a></li>

                        @endif


                        @if( Auth::user()->role == 3)
                        <li class="side-menu-item px-3"><a href="{{ route('home') }}" class="w-100 py-3 pl-4">Dashboard</a></li>
                        <li class="side-menu-item px-3"><a href="{{ route('permohonan.listBaru') }}" class="w-100 py-3 pl-4">Senarai Permohonan Baru</a></li>
                        <li class="side-menu-item px-3"><a href="{{ route('pengumuman.list') }}" class="w-100 py-3 pl-4" >Senarai Pengumuman</a></li>
                        @endif


                        @if(Auth::user()->role == 0)
                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="{{ route('senarai-harga.list') }}" class="w-100 py-3 pl-4" >Senarai Harga</a></li>
                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="{{ route('senarai-surat.list') }}" class="w-100 py-3 pl-4" >Senarai Templat Surat</a></li>
                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="{{ route('senarai-email.list') }}" class="w-100 py-3 pl-4" >Senarai Templat Email</a></li>

                        <li class="side-menu-item px-3"><a href="{{ route('permohonan.statusPerlaksanaan') }}" class="w-100 py-3 pl-4" >Status Perlaksanaan</a></li>

                        <li class="side-menu-item px-3"><a href="#" class="w-100 py-3 pl-4 sub-menu-parent" data-toggle="collapse" data-target="#table-sub-menu-laporan" aria-expanded="false" aria-controls="table-sub-menu">Laporan</a></li>
                        <div id="table-sub-menu-laporan" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <ul class="side-sub-menu p-0">
                                <li class="side-sub-menu-item px-3"><a href="{{route('laporan.laporan-1')}}" class="w-100 pl-4">Laporan Bilangan Keseluruhan Permohonan</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{route('laporan.laporan-2')}}" class="w-100 pl-4">Laporan Bilangan Permohonan Mengikut Kategori Permohon</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{route('laporan.laporan-3')}}" class="w-100 pl-4">Laporan Mengikut Kategori Data Yang Dipohon</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{route('laporan.laporan-4')}}" class="w-100 pl-4">Laporan Mengikut Status Permohonan</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{route('laporan.laporan-5')}}" class="w-100 pl-4">Laporan Mengikut Kategori Data Yang Diluluskan</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{route('laporan.laporan-6')}}" class="w-100 pl-4">Laporan Mengikut Kategori Data Yang Tidak Diluluskan</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{route('laporan.laporan-7')}}" class="w-100 pl-4">Laporan Mengikut Kategori Data Yang Tidak Berkaitan</a></li>
                                <li class="side-sub-menu-item px-3"><a href="{{route('laporan.laporan-8')}}" class="w-100 pl-4">Laporan Mengikut Kategori Data Yang Batal</a></li>
                            </ul>
                        </div>

                        @endif

                        @if(Auth::user()->role == 4)
                        <!-- Sub menu parent -->
                        <li class="side-menu-item px-3"><a href="{{ route('home') }}" class="w-100 py-3 pl-4">Dashboard</a></li>

                        <li class="side-menu-item px-3"><a href="{{ route('superadmin.list') }}" class="w-100 py-3 pl-4" >Senarai Pengguna</a></li>

                        <li class="side-menu-item px-3"><a href="{{ route('superadmin.listPenggunaLuar') }}" class="w-100 py-3 pl-4" >Senarai Pemohon</a></li>

                        <li class="side-menu-item px-3"><a href="{{ route('superadmin.auditTrail') }}" class="w-100 py-3 pl-4" >Audit Trail Proses</a></li>

                        <li class="side-menu-item px-3"><a href="{{ route('superadmin.auditTrailLogUser') }}" class="w-100 py-3 pl-4" >Audit Trail Log Akses</a></li>

                        @endif
                    </ul>
                </div>
            </div>

            @endif
        </div>

        <!-- Main section -->
        <main class="bg-light main-full-body" style="background-color: #ccc!important;">

            <!-- Theme changer -->
            <!-- <div class="theme-option p-4">
                <div class="theme-pck" data-toggle="tooltip" data-placement="left" title="Bahasa | Language">
                    <i class="fas fa-cog fa-lg"></i>
                </div>
                <p>Colour Theme:</p>
                <div class="side-nav-themes d-flex flex-row">
                    <p class="p-3 rounded side-nav-theme-primary side-nav-theme" theme-color="purple"></p>
                    <p class="p-3 rounded ml-2 side-nav-theme-light side-nav-theme" theme-color="light"></p>
                </div>
            </div> -->
            @if ($message = Session::get('success'))
           <div id=alert>

             <div class="alert alert-card  alert-success" role="alert">
                 <strong>Operasi Berjaya! </strong>
                 {{$message}}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
             </div>
           </div>
           @elseif ($message = Session::get('error'))
           <div id="alert">
             <div class="alert alert-card  alert-danger" role="alert">
                 <strong>Ralat! </strong>
                 {{$message}}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
             </div>
           </div>
           @endif


            <!-- The navbar -->
            <nav class="navbar navbar-expand navbar-light bg-light py-3" style="background-color: #ccc!important;">
                <p class="navbar-brand mb-0 pb-0">
                    <span></span>
                    <span></span>
                    <span></span>
                </p>
                <a href="{{ url()->previous() }}" class="btn btn-outline-primary m-2" style="font-size:150%"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Kembali</a>

                <!-- Navbar search section -->
                <!-- <div class="navb-search ml-5 d-none d-md-block">
                    <form action="#" method="POST">
                        <div class="input-group search-round">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn border" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div> -->
                <!-- Navbar right menu section -->
                <div class="navb-menu ml-auto d-flex flex-row">
                    <!-- Message dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2 pt-1">
                        <!-- Icon -->

                    </div>

                    <!-- Notification dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2 pt-1">
                        <!-- icon -->
                        <a href="#" class="w-100 dropdown-toggle text-muted position-relative" data-toggle="dropdown">
                            <!-- Notification -->
                            <i class="far fa-bell fa-2x"></i>
                            <span class="badge badge-primary position-absolute notification-badge">{{$count_notification}}</span>
                        </a>
                        <!-- Dropdown menu -->
                        @if($count_notification != 0)
                        <div class="dropdown-menu dropdown-menu-right p-0 dropdown-menu-max-height">
                            <!-- Menu item -->
                            @foreach($permohonan_admin as $permohonan)
                              @foreach($permohonan->unreadNotifications->sortByDesc('created_at') as $notification)
                                @if($notification->data['kepada_id'] == Auth::user()->id)
                                  <a href="{{route('notification.mark-as-read', $notification->id)}}" class="dropdown-item text-secondary-light p-0">
                                    <div class="d-flex flex-row border-bottom">
                                        <div class="notification-icon bg-secondary-c pt-3 px-3 pb-3"><i class="far fa-envelope text-primary fa-lg pt-3"></i></div>
                                        <div class="flex-grow-1 px-3 py-3">
                                            <p class="mb-0"> {{date('d-m-Y H:i:s', strtotime($notification->created_at))}} &ensp;<span class="badge badge-pill badge-primary">Baru</span></p>
                                            <small>{{$notification->data['tajuk'] }}</small>
                                        </div>
                                    </div>
                                  </a>
                                @endif
                              @endforeach
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <!-- Profile action dropdown -->
                    <div class="dropdown dropdown-arow-none d-contents text-center mx-2">
                        <!-- Icon -->
                        <a href="#" class="w-100 dropdown-toggle text-muted" data-toggle="dropdown">
                          @if(Auth::user()->gambar_profile == null)
                          <img src="{{ asset('https://icon-library.com/images/default-profile-icon/default-profile-icon-24.jpg') }}" alt="profile" class="profile-avatar" style="height:40px; width:40px; ">
                          @else
                          <img src="{{ asset( $image_path = str_replace('public', 'storage',  Auth::user()->gambar_profile)) }}"  class="profile-avatar" style="height:40px; width:40px; ">
                          @endif
                        </a>
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-max-height">
                            <!-- Menu items -->
                            <a href="#" class="dropdown-item disabled small"><i class="far fa-user mr-1"></i>{{explode(' ',trim(ucwords(strtolower((Auth::user()->name)))))[0]}} </a>
                            <a href="{{ route('profil-admins.editProfil') }}" class="dropdown-item text-secondary-light">Kemaskini Profil</a>
                            <a href="{{ route('profil-admins.changePass') }}" class="dropdown-item text-secondary-light">Tukar Kata Laluan</a>
                            <!-- <a href="#" class="dropdown-item text-secondary-light">Account setting</a>
                            <a href="#" class="dropdown-item text-secondary-light">Billing history</a> -->
                            <a  class="dropdown-item text-secondary-light"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            >Log Keluar</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

    @yield('content')

    <!-- Footer section -->
    <footer id="footer" class="footer-full-body p-4 d-flex flex-row justify-content-between text-secondary" style="background: linear-gradient(to bottom, #cccccc 0%, #ffffff 110%) !important;">
        <p>&copy; Hakcipta Terpelihara 2020. <a href="https://www.forestry.gov.my/my/" target="_Blank">Jabatan Perhutanan Semenanjung Malaysia</a></p>
        <p>Versi 1.0</p>
    </footer>
  </div>


    <script src="{{ asset('qbadminui/js/vendor/bootstrap-4.3.1/modernizr-3.7.1.min.js') }}"></script>
    <script src="{{ asset('qbadminui/js/vendor/jquery-3.3.1/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('qbadminui/js/vendor/popper-js/popper1.14.7.js') }}"></script>
    <script src="{{ asset('qbadminui/js/vendor/bootstrap-4.3.1/bootstrap.min.js') }}"></script>
    <!-- eChart -->
    <script src="{{ asset('qbadminui/js/vendor/eChart/echarts.min.js') }}"></script>
    <script src="{{ asset('qbadminui/js/vendor/eChart/echarts.option.min.js') }}"></script>
    <!-- eChart script -->
    <script src="{{ asset('qbadminui/js/plugins/echart_drw.js') }}"></script>
    <script src="{{ asset('qbadminui/js/plugins.js') }}"></script>
    <script src="{{ asset('qbadminui/js/main.js') }}"></script>
    <!-- Data Table -->
    <script src="{{ asset('qbadminui/js/vendor/DataTable-1.10.20/datatables.min.js') }}"></script>
    <!-- Data Table script -->
    <script src="{{ asset('qbadminui/js/plugins/dataTable_script.js') }}"></script>

</body>
</html>
<script type="text/javascript">
$("document").ready(function(){
  setTimeout(function(){
     $("div.alert").remove();
  }, 5000 ); // 5 secs

});
</script>
