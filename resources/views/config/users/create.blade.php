@extends('layouts.app')
@section('title', 'Crear Usuario')

@section('content')
<div class="card">
<div class="row">
   @include('layouts/paths/alerts')
            <div class="card-body">
          
              <h5 class="card-title">Formulario de creación de Usuarios</h5>

              <!-- Horizontal Form -->
              <form action="{{ url('users/insert')}}" method="post">
              @csrf
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label" >Nombre </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="second_name" class="col-sm-2 col-form-label">Apellidos</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="second_name" name="second_name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="phone" class="col-sm-2 col-form-label">Telefono.</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Correo </label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                </div>

                <div class="row mb-3">
                   
                  <div class=" offset-2 col-sm-3 offset-1">
                    <select class="form-select"  name="role_id" aria-label="Seleccionar Rol" data-validation="required">
                        <option selected disabled>Seleccione el role</option>
                          @foreach($roles as $role)
                              <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach
                    </select>
                  </div>

                  <div class=" offset-2 col-sm-3 offset-1 ">
                    <select class="form-select"  name="entity_id" aria-label="Seleccionar Empresa" data-validation="required">
                        <option selected disabled>Seleccione el Empresa</option>
                          @foreach($entities as $entity)
                              <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                          @endforeach
                    </select>
                  </div>
                  
                </div> 
                

                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                 
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>
@endsection