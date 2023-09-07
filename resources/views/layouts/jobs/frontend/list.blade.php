@extends('layouts.jobs.app')
@section('title', 'Ventana del Listado de Emppleos')

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
 <div><a class="btn btn-outline-primary mb-3" href=""> CATEGORÍA : {{$cat->name}}</a></div>
 <hr>

 @if($cat->jobs->count())
  @foreach($cat->jobs as $job)     
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><a href="{{ url('/cats/GetcatID', $cat->id) }}">{{ $job->job_title}}</a></h5>
          
          <p class="card-text">Some quid make up the bulk of the card's content.</p>
          <a class="btn btn-outline-info " href="">{{ $job->Entity->name}}</a>
          <a class="btn btn-outline-info small-xs" href="">Vacancia: {{ $job->vacancy}}</a>
         <hr> 
          <a class="btn btn-info mb-2 text-white " href="{{ url('/jobs/getJobForm', $job->id) }}">Aplicar</a>
        </div>
      </div><!-- End Card with titles, buttons, and links -->

    </div>

    @endforeach
        @else
        <p id="p1" class="text-danger"> ! opps No se encontraron ofertas</p>
         @endif
        @endforeach
    </div>
  </div>
</section>

</main><!-- End #main -->
@endsection

