@extends('layouts.app')
@section('title', 'Editar Usuario')

@section('content')
<div class="card">
<div class="row">
@include('layouts/paths/alerts')
<div class="card-body">
    <h5 class="card-title">Formulario de Edicion de usuarios</h5>

    <!-- Horizontal Form -->
    <form action="{{ url('/users/update') }}" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre del Rol</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
    </div>
  
    <div class="row mb-3">
        <label for="second_name" class="col-sm-2 col-form-label">Apellidos</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="second_name" name="second_name" value="{{ $user->second_name }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="phone" class="col-sm-2 col-form-label">Contacto</label>
        <div class="col-sm-10">
        <input type="phone" class="form-control" id="phone" name="phone" value="{{ $user->phone}}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Correo Electronico</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email}}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2 "></div> 
            <div class="col-sm-4">
            <select class="form-select"  name="role_id" aria-label="Seleccionar Rol" data-validation="required">
            @foreach($roles as $role)
                <option {{ $user->role_id == $role->id ? 'selected' : null }} value="{{ $role->id }}">{{ $role->name }}</option>
             @endforeach
            </select>
        </div> 

            <div class="col-sm-4">
            <select class="form-select"  name="entity_id" aria-label="Seleccionar Entidad" data-validation="required">
            @foreach($entities as $entity)
                <option {{ $user->entity_id == $entity->id ? 'selected' : null }} value="{{ $entity->id }}">{{ $entity->name }}</option>
             @endforeach
            </select>
        </div> 
       
    </div>


   
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form><!-- End Horizontal Form -->

</div>
@endsection