<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Domotepec')</title>
    <meta content="" name="@yield('page_description')">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    @include('partials.linkscss')
    @stack('css')
    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    @include('partials.header')
    <!-- End Header -->
    <div class="loader-container" id='loader-main' style='display:none'>
        <div class="loader"></div>
        <div class="loader-text">...</div>
      </div>
    <!-- ======= Sidebar ======= -->
    @include('partials.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main" style="padding: 6px 10px !important;">

        <div class="pagetitle">
            <h1>@yield('title-section')</h1>
           
        </div><!-- End Page Title -->

        <section class="section dashboard">
            @yield('content')
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('partials.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('partials.linksjs')
    @routes
    @stack('js')
    <!--- End Vender js files -->

</body>

</html>