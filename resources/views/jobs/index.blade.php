@extends('layouts.app')
@section('title', 'Ventana de Ofertas de Empleo')

@section('content')
<section class="section">
      <div class="row">
        <div class="col-lg-12">
        @include('layouts/paths/alerts')
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ url('jobs/create')}}" class="btn btn-primary"><i class="bi bi-plus"></i> Agregar Oferta Empleo</a></h5>
              <p></p>

              <!-- Table with stripped rows -->
              <table class="table datatable" id = "jobs">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Posición</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Categoria.</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">vacancia</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Ciuadad</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($jobs as $job)
                  <tr>
                    <th scope="row">{{ $job->id}}</th>
                    <td>{{ $job->job_title}}</td>
                    <td>{{ $job->job_sumary}}</td>
                    <td> {{ $job->cat->name ?? 'unknown' }}</td>
                    <td> {{ $job->entity->name ?? 'unknown' }}</td>
                    <td>  <button type="button" class="btn btn-warning mb-2"><span class="badge bg-white text-warning">{{ $job->vacancy }}</span></button></td>
                    <td> {{ $job->province->name }}</td>
                    <td> {{ $job->city->name }}</td>
                    
                    <td>
                    <a href="{{ url('jobs/edit', ['id' =>$job->id])}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                    <a href="{{ url('jobs/destroy', ['id'=>$job->id])}}" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill "></i></a>
                   
                  </td>
                @endforeach
                  </tr>
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    
    <div id="paginationContainer"></div>
   <script>
      $(document).ready(function () {
         var table = $('#jobs').DataTable({
            "paging": true,
            "pageLength": 3
         });
      });
  
@endsection