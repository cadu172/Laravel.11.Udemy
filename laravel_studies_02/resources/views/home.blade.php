@extends('layouts.main_layout')
@section('content')

@switch($value)
    @case(100)
        <h1>O valor de Value é {{ $value }}</h1>
        @break
    @case(200)
        <h1>O valor de Value é {{ $value }}</h1>
        @break
    @case(300)
        <h1>O valor de Value é {{ $value }}</h1>
        @break
    @case(400)
        <h1>O valor de Value é {{ $value }}</h1>
        @break
    @case(500)
        <h1>O valor de Value é {{ $value }}</h1>
        @break
    @default
        <h1>O valor de Value não foi encontrado no switch mas é {{ $value }}</h1>
@endswitch

@endsection
