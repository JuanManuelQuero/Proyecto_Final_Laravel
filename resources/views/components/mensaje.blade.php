@if ($texto=Session::get('mensaje'))
    <div class="my-3 alert-warning p-2" role="alert">
        {{$texto}}
    </div>
@endif
