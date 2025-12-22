<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Dashboard | Bina Desa')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{--  Start css  --}}
    @include('layouts.admin.css')
    {{--  End css  --}}

    {{-- WA Floating Style --}}
    <style>
        .wa-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 55px;
            height: 55px;
            z-index: 9999;
        }

        .wa-float img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .wa-float:hover img {
            transform: scale(1.1);
        }
    </style>
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

    {{-- Loader --}}
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    {{-- Sidebar --}}
    @include('layouts.admin.sidebar')

    {{-- Header --}}
    @include('layouts.admin.header')

    {{-- Main Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('layouts.admin.footer')

    {{-- Floating WhatsApp (GLOBAL) --}}
   <a href="https://api.whatsapp.com/send?phone=6282288360449&text=Halo%20Admin%20Bina%20Desa"
   class="wa-float"
   target="_blank"
   aria-label="Chat WhatsApp">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg"
         alt="WhatsApp">
</a>



    {{-- JS --}}
    @include('layouts.admin.js')

</body>

</html>
