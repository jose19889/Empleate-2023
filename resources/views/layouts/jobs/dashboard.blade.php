@extends('layouts.jobs.app')

@section('title', 'Ventana de Ofertas de Empleo')
@section('content')
<main id="main" class="main bg-light">
<div class="pagetitle" >
@include('layouts.paths.heading')
</div><!-- End Page Title -->
<hr>
<section class="section">
  <div class="container">
  <div class="row align-items-top">
 @include('layouts.paths.alerts')

 @foreach($cats as $cat)
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><a href="{{ url('/cats/GetcatID', $cat->id) }}">{{ $cat->name }}</a></h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $cat->name }}</h6>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <!-- <button type="button" class="btn btn-info mb-2">
               Vacancias <span class="badge bg-white text-info">34</span>
          </button> -->
          <a class="btn btn-info mb-2 text-white " href="{{ url('/cats/GetcatID', $cat->id) }}">Veer Ofertas</a>
        </div>
      </div><!-- End Card with titles, buttons, and links -->

    </div>
    @endforeach
    </div>
  </div>
</section>

</main><!-- End #main -->
@endsection