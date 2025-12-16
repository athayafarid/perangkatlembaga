<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home | Mantis Bootstrap 5 Admin Template</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords"
        content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    {{--  Start css  --}}
    @include('layouts.admin.css')

    {{--  end css  --}}
</head>


<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    {{--  start sidebar  --}}
    @include('layouts.admin.sidebar')
    {{--  end sidebar  --}}

    {{--  start header  --}}
    @include('layouts.admin.header')
    {{--  end header  --}}


    {{--  start main content  --}}
   @yield('content')
    {{--  end main content    --}}

    {{--  start footer  --}}
    @include('layouts.admin.footer')
    {{--  end footer    --}}

    {{--  start js  --}}

    @include('layouts.admin.js')

    {{--  end js  --}}

</body>



</html>
