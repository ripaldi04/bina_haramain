<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bina Haramain')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('images/Logo Bina Haramain Baru.png') }}" type="image/x-icon">

    <!-- Custom CSS (jika ada) -->
    @vite(['resources/css/user/navbar.css', 'resources/css/user/footer.css'])
    @yield('style')


</head>

<body>

    @include('pages.user.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('pages.user.partials.footer')

    @yield('script')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
