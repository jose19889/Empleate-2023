@extends('layouts.app')
@section('title', 'Editar Rol')

@section('content')
<div class="card">
<div class="row">
@include('layouts/paths/alerts')
<div class="card-body">
    <h5 class="card-title">Formulario de Edicion Ofertas de Empleo</h5>

    <!-- Horizontal Form -->
    <form action="{{ url('/jobs/update') }}" method="post">
    @csrf
    <input type="hidden" name="job_id" value="{{ $job->id }}">
    <div class="row mb-3">
        <label for="job_title" class="col-sm-2 col-form-label">Nombre de la oferta</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $job->job_title }}">
        </div>
    </div>
  
    <div class="row mb-3">
        <label for="job_sumary" class="col-sm-2 col-form-label">Descripcion</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="job_sumary" name="job_sumary" value="{{ $job->job_sumary }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="job_salary" class="col-sm-2 col-form-label">Salario</label>
        <div class="col-sm-10">
        <input type="job_salary" class="form-control" id="job_salary" name="job_salary" value="{{ $job->job_salary}}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="vacancy" class="col-sm-2 col-form-label">vacancy</label>
        <div class="col-sm-10">
        <input type="vacancy" class="form-control" id="vacancy" name="vacancy" value="{{ $job->vacancy}}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="offset-2  col-sm-4">
        <select class="form-select"  name="entity_id" aria-label="Seleccionar empresa" data-validation="required">
        @foreach($entities as $entity)
            <option {{ $entity->job_id == $entity->id ? 'selected' : null }} value="{{ $entity->id }}">{{ $entity->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="offset-2 col-sm-4">
        <select class="form-select"  name="cat_id" aria-label="Seleccionar Rol" data-validation="required">
        @foreach($cats as $cat)
            <option {{ $cat->cat_id == $cat->id ? 'selected' : null }} 
                value="{{ $cat->id }}">{{ $cat->name }}
            </option>
            @endforeach
        </select>
    </div>
    </div>
    <div class="row mb-3">
            <div class="offset-2 col-md-4">
                <div class="form-group">
                    <label for="province_id">Seleccione Provincia:</label>
                    <select name="province_id" class="form-control" id="load_province">
                    <option value="">--- Select province ---</option>
                        @foreach($provinces as $province)
                        <option {{ $job->province_id == $province->id ? 'selected' : null }} value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
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
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('assets/js/bundle.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('select[name="province_id"]').on('change', function () {
                var provinceID = jQuery(this).val();
                if (provinceID) {
                    jQuery.ajax({
                      // url: 'get_city/' + provinceID,
                       url:"{{url('jobs/get_city/')}}/"+provinceID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('select[name="city_id"]').empty();
                            jQuery.each(data, function (key, value) {
                                $('select[name="city_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="city_id"]').empty();
                }
            });
        });

        // The DOM elements you wish to replace with Tagify
       let input2 = document.querySelector("#kt_tagify_2");

        // Initialize Tagify components on the above inputs
       let tags = new Tagify(input2);
      
    </script>
@endsection