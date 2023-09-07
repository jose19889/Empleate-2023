
<div class="pagetitle">

  <nav>
  <ol class="breadcrumb">
  @if($user->role_id=='3')
    <li class="breadcrumb-item"><a href="{{ url('jobs/fronted') }}">Home</a></li>
  @else
    <li class="breadcrumb-item"><a href="{{ url('dashboard/index') }}">Home</a></li>
@endif
  <li class="breadcrumb-item active">@yield('title')</li>
</ol>
  </nav>
</div><!-- End Page Title -->
        