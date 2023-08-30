@extends('layouts.app')
@section('title', 'Crear Empresa')

@section('content')
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulario de creación de Empresa</h5>

              <!-- Horizontal Form -->
              <form action="{{ url('entities/insert') }}" method="post">
              @csrf
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Nombre empresa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="iowner" class="col-sm-2 col-form-label">Colaborador</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="owner"  name="owner">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="oener_tel" class="col-sm-2 col-form-label">Tel. Colaborador</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="owner_tel" name="owner_tel">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Correo </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email">
                  </div>
                </div>
               
                <div class="row mb-3">
                  <label for="web_url" class="col-sm-2 col-form-label">Pagina web</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="web_url" name="web_url">
                  </div>
                </div>
              
                <!-- <div class="row mb-3">
              
                   <label class="col-sm-2 col-form-label"></label> 
                  <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Selecciona Provincia</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>

                
                  <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Selecciona Ciudad</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div> -->

                  <div class="row mb-3">
                      <div class="col-md-6">
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
                      <div class="col-md-6">
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
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
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
        s
        //tags 1

        // The DOM elements you wish to replace with Tagify
       let input2 = document.querySelector("#kt_tagify_2");

        // Initialize Tagify components on the above inputs
       let tags = new Tagify(input2);
      
    </script>
@endsection