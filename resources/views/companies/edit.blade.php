
@extends('layouts.app')
@section('title', 'Editar Empresa')

@section('content')
<div class="card">
<div class="row">
@include('layouts/paths/alerts')
<div class="card-body">
    <h5 class="card-title">Formulario de Edicion de Empresas</h5>

    <!-- Horizontal Form -->
    <form action="{{ url('/entities/update') }}" method="post">
    @csrf
    <input type="hidden" name="entity_id" value="{{ $entity->id }}">
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre la Empresa</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{ $entity->name }}">
        </div>
    </div>
  
    <div class="row mb-3">
        <label for="owner" class="col-sm-2 col-form-label">Colaborador</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="owner" name="owner" value="{{ $entity->owner }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="owner_tel" class="col-sm-2 col-form-label">Telefono Colaboardor</label>
        <div class="col-sm-10">
        <input type="owner_tel" class="form-control" id="owner_tel" name="owner_tel" value="{{ $entity->owner_tel}}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="web_url" class="col-sm-2 col-form-label">Páginas webs</label>
        <div class="col-sm-10">
        <input type="web_url" class="form-control" id="web_url" name="web_url" value="{{ $entity->web_url}}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Correo Electronico</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" value="{{ $entity->email}}">
        </div>
    </div>

    <div class="row mb-3">
    <div class="offset-2 col-sm-4">
            <div class="form-group">
              <label class="control-label"> Provincias:</label>
              <select id="provincy" class="form-control select2bs4" data-placeholder="Choose provincy" tabindex="1" name="province_id" style="width: 100%;">
                <option value="" selected disabled>Select provincy</option>
                   @if($provinces->count() > 0 )
                     @foreach($provinces as $provincy)
                       <option {{ $entity->province_id == $provincy->id ? 'selected' : null }} value="{{ $provincy->id }}">{{ $provincy->name }}</option>
                     @endforeach
                   @endif
              </select>
            </div>
            <!-- /.form-group -->
          </div>  
            <!-- /.col -->
            <div class="offset-2  col-md-4">
                <div class="form-group">
                    <label>Seleccione Ciudad:</label>
                    <select name="city_id" class="form-control" id="laod_city">
                        @foreach($cities as $city)
                        <option value="{{  $city->id }}" >{{  $city->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
      
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form><!-- End Horizontal Form -->

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('assets/js/bundle.js') }}"></script>
    <script type="text/javascript">
    $('#provincy').change(function(){
    var provinceID = $(this).val();    
    if(provinceID){
        $.ajax({
           type:"GET",
           url:"{{url('entities/getcity')}}?province_id="+provinceID,
           //url: 'getcityList/' + provincyID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $("#city").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }      
   });
      
</script>
</div>
@endsection