<div class="alerts.block">
@if(Session::has('danger'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('danger') }}</p>
    @endif

    @if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
    @endif
</div>