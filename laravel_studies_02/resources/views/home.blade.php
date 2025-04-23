@extends('layouts.main_layout')
@section('content')


<div class="container col-md-4 mt-5">
    <form action="{{route('submit')}}" method="POST">
        @csrf
        <div class="form-group mb-2">
          <label for="username">User Name (E-Mail)</label>
          <input type="email" class="form-control" id="username" />
        </div>
        <div class="form-group mb-2">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

@php
    $valor = 100;
    $html = '<strong><span class="text-info">' . $valor . '</span></strong>';
    $name = "Carlos Eduardo dos Santos";
@endphp

<p>{{$valor}}</p>
<p>{{$html}}</p>
<p>{!! $html !!}</p>
<p>{{$valor}} x 1000 é igual à: {{$valor*1000}}</p>
<p>$name contem {{strlen($name)}} caracteres, seu valor é: {{$name}}</p>


@endsection
