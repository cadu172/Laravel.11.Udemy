@extends('layouts.main_layout')
@section('content')

{{-- empty --}}
@empty($value)
    <p>[test-empty] Variável value não existe</p>
@else
    <p>[test-empty] Variável value existem seu valor é {{$value}}</p>
@endempty

{{-- isset --}}
@isset($value)
    <p>[test-isset] Variável value existem seu valor é {{$value}}</p>
@else
    <p>[test-isset] Variável value não existe</p>
@endisset

{{-- unless --}}
@unless($value===100)
    <p>[test-unless] A variável value não é igual a 100, seu valor atual é {{$value}}</p>
@endunless

@endsection
