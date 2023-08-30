<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.html">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


  </li><!-- End Forms Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person"></i><span>Lista de Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('users.index') }}">
          <i class="bi bi-circle"></i><span>Usuarios</span>
        </a>
      </li>
      
      <li>
      <a href="{{ url('users/create') }}">
          <i class="bi bi-circle"></i><span>Crear usuario</span>
        </a>
      </li>
      <li>
      <a href="{{ route('roles.index') }}">
          <i class="bi bi-circle"></i><span>Roles</span>
        </a>
      </li>
      <li>
     
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#companies-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Empresas</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="companies-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
      <a href="{{ url('entities') }}">
          <i class="bi bi-circle"></i><span>Empresas</span>
        </a>
      </li>
      <li>
       
       
      </li>
     
    </ul>
  </li><!-- End Tables Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#jobs-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Ofertas de Emppleo</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="jobs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ url('cats') }}">
          <i class="bi bi-circle"></i><span>Categorías</span>
        </a>  
    <li>
       
      </li>
       <a href="{{ url('jobs') }}">
          <i class="bi bi-circle"></i><span>Ofertas de Empleo</span>
        </a>
      <li>
      
     
    </ul>
  </li><!-- End Forms Nav -->


  <li class="nav-heading">Pages</li>

  
  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-faq.html">
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-register.html">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-login.html">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-error-404.html">
      <i class="bi bi-dash-circle"></i>
      <span>Error 404</span>
    </a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-blank.html">
      <i class="bi bi-file-earmark"></i>
      <span>Blank</span>
    </a>
  </li><!-- End Blank Page Nav -->

</ul>

</aside>