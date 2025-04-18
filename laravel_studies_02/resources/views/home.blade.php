@extends('layouts.main_layout')
@section('content')

    @if ($value === 100)
        <h1>Value é igual a 100</h1>
    @endif


    @if ($value < 100)
        <h1>Value é menor que 100</h1>
    @else
        <h1>Value é maior ou igual a 100</h1>
    @endif

    @if ($value < 10)
        <h1>Value é menor que 10</h1>
    @elseif($value < 20)
        <h1>Value é menor que 20</h1>
    @elseif($value < 30)
        <h1>Value é menor que 30</h1>
    @elseif($value < 40)
        <h1>Value é menor que 40</h1>
    @elseif($value < 50)
        <h1>Value é menor que 50</h1>
    @elseif($value < 60)
        <h1>Value é menor que 60</h1>
    @elseif($value < 70)
        <h1>Value é menor que 70</h1>
    @else
        <h1>Value é indefinido</h1>
    @endif

@endsection
