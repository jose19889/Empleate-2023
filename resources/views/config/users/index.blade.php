@extends('layouts.app')
@section('title', 'Ventana de  Usuarios')

@section('content')
<section class="section">
      <div class="row">
        <div class="col-lg-12">
        @include('layouts/paths/alerts')
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ url('users/create')}}" class="btn btn-primary"><i class="bi bi-plus"></i> Agregar Usuario </a></h5>
              <p></p>

              <!-- Table with stripped rows -->
              <table class="table datatable" id = "users">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Telefono.</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <th scope="row">{{ $user->id}}</th>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->second_name}}</td>
                    <td>{{ $user->phone}}</td>
                    <td>{{ $user->email}}</td>
                    <td> {{ $user->role->name ?? 'unknown' }}</td>
                    <td> {{ $user->entity->name ?? 'unknown' }}</td>
                    
                    <td>
                    <a href="{{ url('users/edit', ['id' =>$user->id])}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                    <a href="{{ url('users/destroy', ['id'=>$user->id])}}" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill "></i></a>
                   
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
         var table = $('#users').DataTable({
            "paging": true,
            "pageLength": 3
         });
      });
  
@endsection