<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Page Register</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/feather.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/app-light.css') }}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ asset('backend/css/app-dark.css') }}" id="darkTheme">
</head>

<body class="dark ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form action="{{ route('register-proses') }}" class="col-lg-3 col-md-4 col-10 mx-auto text-center"
                method="POST">
                @csrf
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('login') }}">
                    <svg version="1.1" id="logo" class="navbar-brand-img brand-md"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 120 120" xml:space="preserve">
                        <g>
                            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                        </g>
                    </svg>
                </a>
                <h1 class="h1 mb-3">Resto Padang</h1>
                <div class="form-group">
                    <input type="text" name="nama" class="form-control form-control-lg" placeholder="Name" value="{{ old('nama') }}">
                    @error('nama')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                <p class="mt-5 mb-3 text-muted"> Ben in Shaf © 2024</p>
            </form>
        </div>
    </div>
    <script src="{{ asset('backend/js/jquery.min') }}"></script>
    <script src="{{ asset('backend/js/popper.min') }}"></script>
    <script src="{{ asset('backend/js/moment.min') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min') }}"></script>
    <script src="{{ asset('backend/js/simplebar.min') }}"></script>
    <script src="{{ asset('backend/js/daterangepicker') }}"></script>
    <script src="{{ asset('backend/js/jquery.stickOnScroll') }}"></script>
    <script src="{{ asset('backend/js/tinycolor-min') }}"></script>
    <script src="{{ asset('backend/js/config') }}"></script>
    <script src="{{ asset('backend/js/apps') }}"></script>
    <!-- Global site tag (gtag) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
        <script>
            Swal.fire("{{ $message }}");
        </script>
    @endif

    @if ($message = Session::get('failed'))
        <script>
            Swal.fire("{{ $message }}");
        </script>
    @endif

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
</body>

</html>
