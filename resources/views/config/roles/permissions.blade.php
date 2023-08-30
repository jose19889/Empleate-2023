
@extends('layouts.app')
@section('title', 'Editar permisos de roles')

@section('content')
<section class="section">
<main>
<div class="container-fluid px-4">
<h1 class="mt-4"></h1>

<div class="row">@if(Session::has('danger'))
  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('danger') }}</p>
    @endif
    @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
    @endif
    
</div>
<section class="section">
      <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><a href="#" class="btn btn-primary">Permisos del {{ $role->name }}
                    <span class="text-lowercase"></span>
                </a>
            </h5>
              <!-- Table with stripped rows -->
              <form class="role-permissions" action="{{ url('roles/role_permissions_update') }}"  method="post">
        @csrf
        <input type="hidden" name="role_id" value="{{ $role->id }}">
        <div class="modal-body p-0">
            <div class="accordion" id="kt_accordion_1">
                @foreach($modules as $counter => $module)
                    <div class="accordion-item border-0" style="border-radius: 0;">
                        <h2 class="accordion-header" id="kt_accordion_1_header_{{ $module->id }}">
                            <button class="accordion-button fs-4 fw-bold collapsed"
                                    style="border-radius: 0;" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#kt_accordion_1_body_{{ $module->id }}"
                                    aria-expanded="false"
                                    aria-controls="kt_accordion_1_body_{{ $module->id }}">
                                #{{ $counter + 1 }} {{ $module->name }}</button>
                        </h2>
                        <div id="kt_accordion_1_body_{{ $module->id }}"
                                class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_header_{{ $module->id }}"
                                data-bs-parent="#kt_accordion_1" style="">
                            <div class="accordion-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover m-0">
                                        <tbody>
                                        @foreach($module->accesses as $access)
                                            <tr>
                                                <td class="ps-10">
                                                    <label
                                                        for="switch-{{ $access->id }}">{{ $access->title }}</label>
                                                </td>
                                                <td class="pe-10">
                                                    <div
                                                        class="form-check form-switch form-check-custom form-check-solid float-end">
                                                        @if(isset($access->permission($role->id, $access->id)->granted))
                                                            <input class="form-check-input"
                                                                    type="checkbox"
                                                                    {{ $access->permission($role->id, $access->id)->granted ? 'checked' : null }} name="permissions[{{ $access->id }}]"
                                                                    id="switch-{{ $access->id }}"/>
                                                        @else
                                                            <input class="form-check-input"
                                                                    type="checkbox"
                                                                    name="permissions[{{ $access->id }}]"
                                                                    id="switch-{{ $access->id }}"/>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="modal-footer flex-center">
            <button type="reset" data-bs-dismiss="modal" class="btn btn-light">Cancelar</button>
            <button type="submit" class="btn btn-warning submit-form">
                Guardar
            </button>
        </div>
    </form>

    <script>
        form = document.querySelector('.role-permissions');

        validator = FormValidation.formValidation(
            form, {
                fields: {},

                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    }),
                    // Validate fields when clicking the Submit button
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // Submit the form when all fields are valid
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                },
            }
        ).on('core.form.valid', function () {
            target = document.querySelector('.modal-content');

            blockUI = new KTBlockUI(target, {
                message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Espere por favor...</div>',
                overlayClass: "bg-dark bg-opacity-25",
            });

            blockUI.block();
        });
    </script>


        
            </div>

            </div>
            </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>



@endsection