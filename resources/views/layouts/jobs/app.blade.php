<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Esrcitorio de Gestión de empleos</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet" type="text/css" />
  

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

  <!-- =======================================================
  * Template Name: Empleate
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
 @include('layouts.paths.app_navigation')
  <!-- End Header -->
  <!-- ======= Sidebar ======= -->
@include('layouts.jobs.sidenav_pub')
 <!-- End Sidebar-->
 @include('layouts.jobs.page')
  <!-- Start main-->
  <main id="main" class="main bg-light">

<div class="pagetitle" >
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active"></li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<hr>
<section class="section">
  <div class="container">
  <div class="row align-items-top">
  @if(Session::has('success'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}
        {{ Session::get('danger') }}</p>
  @endif
    <div class="col-lg-4">
   
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card with titles, buttons, and links</h5>
          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <button type="button" class="btn btn-info mb-2">
               Vacancias <span class="badge bg-white text-info">34</span>
          </button>
         
        </div>
      </div><!-- End Card with titles, buttons, and links -->

    </div>
    <div class="col-lg-4">
      <!-- Card with titles, buttons, and links -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card with titles, buttons, and links</h5>
          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <button type="button" class="btn btn-info mb-2">
               Vacancias <span class="badge bg-white text-info">34</span>
          </button>
         
        </div>
      </div><!-- End Card with titles, buttons, and links -->


    </div>
    <div class="col-lg-4">
    
      <!-- Card with titles, buttons, and links -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Card with titles, buttons, and links</h5>
          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <button type="button" class="btn btn-info mb-2">
               Vacancias <span class="badge bg-white text-info">34</span>
          </button>
          
        </div>
      </div><!-- End Card with titles, buttons, and links -->


    </div>
    </div>
  </div>
</section>

</main><!-- End #main -->

  <!-- End #main -->
 <!-- ======= Footer ======= -->
 @include('layouts.paths.app_footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>