@extends('layouts.app')
@section('title', 'Ventana de Categorias')
@section('content')
<section class="section">
      <div class="row">
        <div class="col-lg-12">
        @include('layouts/paths/alerts')
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ url('cats/create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Agregar Categoria</a></h5>
              <p></p>

              <!-- Table with stripped rows -->
              <table class="table datatable" id = "cats">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre de la Categoria</th>
                    <th scope="col">Descripcion.</th>
                    <th scope="col">Fecha de Crreación.</th>
                    <th scope="col">Acciones.</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach($cats as $cat)
                  <tr>
                    <th scope="row">{{ $cat->id }}</th>
                    <td>{{ $cat->name }}</td>
                      <td>{{ $cat->desc }}</td>
                      <td>{{ $cat->created_at }}</td>
                    <td>
                    <a href="{{ url('cats/edit', ['id' =>$cat->id])}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                    <a href="{{ url('cats/destroy', ['id'=>$cat->id])}}" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill "></i></a>
                  </td>
                  </tr>
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
         var table = $('#users').DataTable({
            "paging": true,
            "pageLength": 3
         });
      });
  
@endsection