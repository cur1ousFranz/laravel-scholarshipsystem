<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- BOOTSTRAP Link -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@isset($title){{ $title }}@endisset</title>
    {{-- This is to resolve passive events problem in console --}}
    <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>

    <!-- ALPINE JS -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- AJAX CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- BOOTSTRAP CDN -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Decription Box CDN -->
    <script src="https://cdn.tiny.cloud/1/t6ma4oxtlblgdc5mskjxpxgs6ham551qbxdkw09lip31ej1k/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
            menubar: false,
            max_height: 300
        });
    </script>

</head>

<body class="d-flex flex-column min-vh-100">

    <x-navbar/>

    @if (session()->has('success'));
        <div class="d-flex justify-content-center ms-3 text-center" id="alertSuccess">
            <div style="margin-top: 80px"
            class="alert bg-success text-white"
            x-data="{show: true}"
            x-init="setTimeout(() => show = false, 2000)"
            x-show="show">
                <h6 class="py-1 fw-bold"> {{ session('success') }}</h6>
            </div>
        </div>
    @endif

    @if (session()->has('error'));
        <div class="d-flex justify-content-center ms-3 text-center" id="alertError">
            <div style="margin-top: 80px"
            class="alert  bg-danger text-white top-0 position-static"
            x-data="{show: true}"
            x-init="setTimeout(() => show = false, 2000)"
            x-show="show">
                <h6 class="py-1 fw-bold"> {{ session('error') }}</h6>
            </div>
        </div>
    @endif
    
    <main class="max-w-screen-xl">
        {{ $slot }}
    </main>

    <x-footer/>

</body>

</html>
