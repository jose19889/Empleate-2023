@extends('layouts.jobs.app')

@section('title', 'Formulario de Apliacción de Empleo')
@section('content')
<main id="main" class="main">
<h1>@include('layouts.paths.heading')</h1>


<section class="section">

  <div class="row">
  @include('layouts.paths.alerts')
    <div class="col-lg-12">
  <div id="layoutSidenav_content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Formulario de Empleo/ Detalles del Aplicante</h5>

          <!-- General Form Elements -->
          <form method="POST" action="{{url('jobs/send_mail/')}}" enctype="multipart/form-data">
          @csrf
            <div class="row mb-3">
              <label for="{{ $job->job_title }}" class="col-sm-2 col-form-label">Posición</label>
              <div class="col-sm-10">
                <input  type="text" class="form-control" value="{{ $job->job_title }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="{{ $job->job_sumary }}" class="col-sm-2 col-form-label">Descripcion del Puesto</label>
              <div class="col-sm-10">
                <input style="height: 70px" type="textarea" class="form-control" value="{{ $job->job_sumary }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="message" class="col-sm-2 col-form-label">Asunto</label>
              <div class="col-sm-10">
                <input style="height: 100px" type="textarea" class="form-control" name="message" placeholder="message">
              </div>
            </div>
            <div class="row mb-3">
              <label for="entity_id" class="col-sm-2 col-form-label">Nombre de la Empresa</label>
              <div class="col-sm-10">
                <input type="sntity_id" class="form-control" value="{{ $job->entity->name }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="entity_id" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" value="{{ $job->entity->email }}">
              </div>
            </div>
           
            <div class="row mb-3">
              <label for="attachment" class="col-sm-2 col-form-label">Fichero adjunto</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" name="attachment" id="attachment">
                <p class="text-danger">NOTA: Por favor, adjunta un unico documemnto que contenga los expedientes que se requiere</p>
                <p class="text-danger"> *Ficheros admintidos: pdf, jpeg</p>
              </div>
            </div>
            <!-- <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control">
              </div>
            </div> -->
           
            <!-- <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                  <label class="form-check-label" for="gridRadios1">
                    First radio
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                  <label class="form-check-label" for="gridRadios2">
                    Second radio
                  </label>
                </div>
                <div class="form-check disabled">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios" value="option" disabled>
                  <label class="form-check-label" for="gridRadios3">
                    Third disabled radio
                  </label>
                </div>
              </div>
            </fieldset> -->
            <!-- <div class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Checkboxes</legend>
              <div class="col-sm-10">

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1">
                  <label class="form-check-label" for="gridCheck1">
                    Example checkbox
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                  <label class="form-check-label" for="gridCheck2">
                    Example checkbox 2
                  </label>
                </div>

              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Disabled</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="Read only / Disabled" disabled>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Select</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Multi Select</label>
              <div class="col-sm-10">
                <select class="form-select" multiple aria-label="multiple select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div> -->

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Boton de Enviar</label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>

    
  </div>
</section>

</main><!-- End #main -->
@endsection