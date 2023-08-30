<!-- @extends('layouts.app') -->
@section('title', 'Editar Rol')

@section('content')
<div class="card">
<div class="row">
    @if(Session::has('danger'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('danger') }}</p>
    @endif
<div class="card-body">
    <h5 class="card-title">Formulario de creación de Roles</h5>

    <!-- Horizontal Form -->
    <form action="{{ url('/roles/update') }}" method="post">
    @csrf
    <input type="hidden" name="role_id" value="{{ $role->id }}">
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre del Rol</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputText" name="name" value="{{ $role->name }}">
        </div>
    </div>
  
    <div class="row mb-3">
        <label for="desc" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="desc" name="desc" value="{{ $role->desc }}">
        </div>
    </div>

    
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form><!-- End Horizontal Form -->

</div>
</div>
@endsection