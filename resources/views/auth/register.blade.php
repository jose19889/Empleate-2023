@extends('layouts.auth')

@section('title', 'Inicio de sesión')

@section('body')
 <!-- Template Main CSS File -->
 <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
 
 <main>
 @if (count($errors) > 0)
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              @if ($message = Session::get('danger'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
              </div>
              @endif
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Empleate</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Crea una cuenta de usuario</h5>
                    <p class="text-center small">introduce tus datos personales </p>
                  </div>
                  

                  <form  action="{{ url('register/signup') }}" method="post" class="row g-3">
                  @csrf <!-- {{ csrf_field() }} -->
                    <div class="col-12">
                      <label for="name" class="form-label">Nombre</label>
                      <input type="text" name="name" class="form-control" id="name" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                  
                    <div class="col-12">
                      <label for="second_name" class="form-label">Apellidos</label>
                      <input type="text" name="second_name" class="form-control" id="second_name" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                    <div class="col-12">
                      <label for="email" class="form-label">Correo</label>
                      <input type="text" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                  
                    <div class="col-12">
                      <label for="phone" class="form-label">Contacto</label>
                      <input type="text" name="phone" class="form-control" id="phone" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Crear Cuenta</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->


  @endsection