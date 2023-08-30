@extends('layouts.auth')

@section('title', 'Inicio de sesión')

@section('body')
 <!-- Template Main CSS File -->
 <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    @if(\Session::has('error'))
                    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
              <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Empleate</span>
                </a>
              
              </div><!-- End Logo -->

              <div class="card mb-3">

            <div class="card-body">
             @if(Session::has('danger'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
              {{ Session::get('danger') }}</p>
              @endif

              @if(Session::has('alert'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
              {{ Session::get('alert') }}</p>
              @endif

              @if(Session::has('token_danger'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
              {{ Session::get('token_danger') }}</p>
              @endif

              @if(Session::has('token_success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
              {{ Session::get('token_success') }}</p>
              @endif
              
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Plataforma de Empleo publico y privado</h5>
                    <!-- <p class="text-center small">Inicie sesión con sus credenciales</p> -->
                  </div>
                 
                  <form class="row g-3 "  method="POST" action="{{ route('login.authenticate') }}">
                  @csrf
                    <div class="col-12">
                      <label for="email" class="form-label">Correo </label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}.</div>
                        @endif
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}.</div>
                        @endif
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                   
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Iniciar sesíon</button>
                    </div>
                    <div class="col-12">
          
                    <a href="{{ route('forget.password.get') }}" class="btn btn-secondary  w-100" > Cambiar contraseña</a>

                    </div>
                 
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{ url('register') }}">Crear Cuenta </a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">Ademy-groups</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  @endsection