
@foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{$error}}</p>
@endforeach

@if (Session::has('info'))
    <p class="alert alert-success">{{Session::get('info')}}</p>
@endif
@if (Session::has('Warning'))
    <p class="alert alert-warning">{{Session::get('Warning')}}</p>
@endif