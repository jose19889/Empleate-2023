@extends('layouts.app')
@section('title', 'Crear Usuario')

@section('content')
<div class="card">
<div class="row">
   @include('layouts/paths/alerts')
<div class="card-body">
    <h5 class="card-title">Formulario de creación de Roles</h5>

    <!-- Horizontal Form -->
    <form action="{{ url('/roles/insert') }}" method="post">
    @csrf
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre del Rol</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputText" name="name">
        </div>
    </div>
  
    <div class="row mb-3">
        <label for="desc" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail" name="desc">
        </div>
    </div>

    
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form><!-- End Horizontal Form -->

</div>
</div>
@endsection