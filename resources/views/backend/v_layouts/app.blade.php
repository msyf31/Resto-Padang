<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/favicon.ico') }}">
    <title>Project Resto Padang</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/app-light.css') }}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ asset('backend/css/app-dark.css') }}" id="darkTheme">
</head>

<body class="vertical dark">
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted collapseSidebar mr-3 mt-2 p-0">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>
            <form class="form-inline searchform text-muted mr-auto">
                <input class="form-control mr-sm-2 text-muted border-0 bg-transparent pl-4" type="search"
                    placeholder="Type something..." aria-label="Search">
            </form>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
                        <i class="fe fe-sun fe-16"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal"
                        data-target=".modal-shortcut">
                        <span class="fe fe-grid fe-16"></span>
                    </a>
                </li>
                <li class="nav-item nav-notif">
                    <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                        <span class="fe fe-bell fe-16"></span>
                        <span class="dot dot-md bg-success"></span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="avatar avatar-sm mt-2">
                            <img src="{{ asset('backend/assets/avatars/logo.png') }}" alt="..."
                                class="avatar-img rounded-circle">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
                data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                <!-- nav bar -->
                <div class="w-100 d-flex mb-4">
                    <a class="navbar-brand flex-fill mx-auto mt-2 text-center" href="/">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                    </a>
                </div>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fe fe-home fe-16"></i>
                            <span class="item-text ml-3">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="fe fe-user fe-16"></i>
                            <span class="item-text ml-3">User</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('customer.index') }}">
                            <i class="fe fe-users fe-16"></i>
                            <span class="item-text ml-3">Customer</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item dropdown">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="fe fe-coffee fe-16"></i>
                            <span class="item-text ml-3">Menu</span><span class="sr-only">(current)</span>
                        </a>
                        <ul class="list-unstyled w-100 collapse pl-4" id="dashboard">
                            <li class="nav-item active">
                                <a class="nav-link pl-3" href="{{ route('makanan.index') }}"><span
                                        class="item-text ml-1">Makanan</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('minuman.index') }}"><span
                                        class="item-text ml-1">Minuman</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="">
                            <i class="fe fe-server fe-16"></i>
                            <span class="item-text ml-3">Transaksi</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('booking.index') }}">
                            <i class="fe fe-book fe-16"></i>
                            <span class="item-text ml-3">Booking</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('dinein.index') }}">
                            <i class="fe fe-hard-drive fe-16"></i>
                            <span class="item-text ml-3">Dine In</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('promo.index') }}">
                            <i class="fe fe-tag fe-16"></i>
                            <span class="item-text ml-3">Promo</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="#"
                            onclick="event.preventDefault(); document.getElementById('keluar-app').submit();"><i
                                class="fe fe-power fe-16"></i> <span class="item-text ml-3">Logout</span></a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- isi -->
        @yield('content')
        <!-- end -->
        <!-- main -->
    </div> <!-- .wrapper -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('backend/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('backend/js/config.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [10, 20, 30, -1],
                [10, 20, 30, "All"]
            ]
        });
    </script>
    <script src="{{ asset('backend/js/apps.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>

<!-- tambahan -->
<!-- sweetalert -->
<script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>

<!-- ckeditor  -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> -->
<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .catch(error => {
            console.error(error);
        });
</script>

<!-- sweetalert success-->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}"
        });
    </script>
@endif

<script type="text/javascript">
    //sweetalert delete
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var konfdelete = $(this).data("konf-delete");
        event.preventDefault();
        Swal.fire({
            title: 'Konfirmasi Hapus Data?',
            html: "Data <strong>" + konfdelete + "</strong> yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, dihapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success')
                    .then(() => {
                        form.submit();
                    });
            }
        });
    });
</script>

<script>
    //hanya angka
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    // previewImage
    function previewFoto() {
        const foto = document.querySelector('input[name="foto"]');
        const fotoPreview = document.querySelector('.foto-preview');
        fotoPreview.style.display = 'block';
        const fotoReader = new FileReader();
        fotoReader.readAsDataURL(foto.files[0]);
        fotoReader.onload = function(fotoEvent) {
            fotoPreview.src = fotoEvent.target.result;
            fotoPreview.style.width = '100%';
        }
    }

    function previewImgBerita() {
        const foto = document.querySelector('input[name="img-makanan"]');
        const fotoPreview = document.querySelector('.img-makanan-preview');
        fotoPreview.style.display = 'block';
        const fotoReader = new FileReader();
        fotoReader.readAsDataURL(foto.files[0]);
        fotoReader.onload = function(fotoEvent) {
            fotoPreview.src = fotoEvent.target.result;
            fotoPreview.style.width = '100%';
        }
    }
</script>
<!-- keluar aplikasi -->
<form id="keluar-app" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<!-- End keluar aplikasi -->
</body>

</html>
<form id="keluar-app" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
