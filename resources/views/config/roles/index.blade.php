@extends('layouts.app')
@section('title', 'Crear Roles')

@section('content')
<section class="section">
      <div class="row">
        <div class="col-lg-12">
        @include('layouts/paths/alerts')

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ url('roles/create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Agregar Rol </a></h5>
              <p></p>

              <!-- Table with stripped rows -->
              <table class="table datatable" id = "users">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre de rol</th>
                    <th scope="col">Descripcion.</th>
                    <th scope="col">Fecha de Crreación.</th>
                    <th scope="col">Acciones.</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach($roles as $role)
                  <tr>
                    <th scope="row">{{ $role->id }}</th>
                    <td>{{ $role->name }}</td>
                      <td>{{ $role->desc }}</td>
                      <td>{{ $role->created_at }}</td>
                    <td>
                    <a href="{{ url('roles/edit_role_permissions', ['id' => $role->id]) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="{{ url('roles/edit', ['id' =>$role->id])}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                    <a href="{{ url('roles/destroy', ['id'=>$role->id])}}" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill "></i></a>
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