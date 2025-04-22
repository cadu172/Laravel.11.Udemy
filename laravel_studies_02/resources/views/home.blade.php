@extends('layouts.main_layout')
@section('content')

{{-- estrutura for --}}
@for ($index=0;$index<5;$index++)
    <h1>{{$index}}</h1>
@endfor

<hr />

{{-- Estrutura Foreach --}}
@foreach ($cities as $citie)
    <h1>{{$citie}}</h1>
@endforeach

<hr />

{{-- Estrutura Forelse --}}
@forelse ($names as $name)
    <h1>{{$name}}</h1>
@empty
    <h1>$names não encontrado ou vazio</h1>
@endforelse

<hr />

{{--  Estrutura while --}}
@while ($indice < 10)
    <h1>{{$indice++}}</h1>
@endwhile

@endsection
