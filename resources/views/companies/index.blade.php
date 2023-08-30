@extends('layouts.app')
@section('title', 'Ventana de Empresas')

@section('content')
<section class="section">
      <div class="row">
        <div class="col-lg-12">
        @include('layouts/paths/alerts')
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="{{ url('entities/create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Agregar Empresa </a></h5>
              <p></p>

              <!-- Table with stripped rows -->
              <table class="table datatable" id = "entities">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Colaborador</th>
                    <th scope="col">Telefono .</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Ciuadd </th>
                    <th scope="col">pagina web </th>
                    <th scope="col">Correo </th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($entities as $entity)
                  <tr>
                    <th scope="row">{{ $entity->id}}</th>
                    <td>{{ $entity->name}}</td>
                    <td>{{ $entity->owner}}</td>
                    <td>{{ $entity->owner_tel}}</td>
                    <td>{{ $entity->province->name ?? 'unknown'}}</td>
                    <td>{{ $entity->city->name ?? 'unknown' }}
                    <td>{{ $entity->web_url}}</td>
                    <td>{{ $entity->email}}</td>
                  
                    <td>
                    <a href="{{ url('entities/edit', ['id' =>$entity->id])}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                    <a href="{{ url('entities/destroy', ['id'=>$entity->id])}}" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill "></i></a>
                   
                  </td>
                @endforeach
                  </tr>
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    
@endsection