@extends('layouts.app')
@section('title', 'Crear Oferta de Empleo')

@section('content')
<div class="card">
<div class="row">
   @include('layouts/paths/alerts')
            <div class="card-body">
          
              <h5 class="card-title">Formulario de creación de Empleos</h5>

              <!-- Horizontal Form -->
              <form action="{{ url('jobs/insert')}}" method="post">
              @csrf
                <div class="row mb-3">
                  <label for="job_title" class="col-sm-2 col-form-label" >Posicion</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="job_title" name="job_title">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="job_sumary" class="col-sm-2 col-form-label">Descripcion</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="job_sumary" name="job_sumary">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="vacancy" class="col-sm-2 col-form-label">Vacancia</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="vacancy" name="vacancy">
                  </div>
                </div>
               
               <div class="row mb-3">
                  <label for="job_salary" class="col-sm-2 col-form-label">Salario </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="job_salary" name="job_salary">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="offset-2 col-sm-4">
                  @if(auth()->user()->role_id==1)
                    <select class="form-select"  name="entity_id" aria-label="Seleccionar Empresa" data-validation="required">
                        <option selected disabled>Seleccione la empresa</option>
                          @foreach($entities as $entity)
                              <option value="{{ $entity->id }}">{{ $entity->name }}</option>
                          @endforeach
                    </select>
                   @else
                   <input type="text" class="form-control" id="entity_id" name="entity_id" value="{{ auth()->user()->entity->name }}">
                    @endif
                  </div>

                
                  <div class="  col-sm-4 offset-2">
                    <select class="form-select"  name="cat_id" aria-label="Seleccionar categoria" data-validation="required">
                        <option selected disabled>Seleccione la categoria</option>
                          @foreach($cats as $cat)
                              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                          @endforeach
                    </select>
                  </div>

                </div> 
                
                <div class="row mb-3">
               
                <div class="row mb-3">
                      <div class="offset-2 col-md-4">
                          <div class="form-group">
                              <label for="province_id">Seleccione Provincia:</label>
                              <select name="province_id" class="form-control">
                                <option value="">--- Select province ---</option>
                                  @foreach($provinces as $province)
                              <option value="{{ $province->id }}">{{ $province->name }}</option>
                                 @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="offset-2  col-md-4">
                          <div class="form-group">
                              <label>Seleccione Ciudad:</label>
                              <select name="city_id" class="form-control">
                                  <option>--city--</option>
                              </select>
                          </div>
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
        jQuery(document).ready(function () {
            jQuery('select[name="province_id"]').on('change', function () {
                var provinceID = jQuery(this).val();
                if (provinceID) {
                    jQuery.ajax({
                      url:"{{url('jobs/get_city/')}}/"+provinceID,
                       //url: 'get_city/' + provinceID,
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
          </div>
@endsection