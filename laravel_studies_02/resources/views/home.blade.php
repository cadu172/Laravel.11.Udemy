@extends('layouts.main_layout')
@section('content')

@session('name')
    <h1>Welcome, {{ session('name') }}</h1>
@endsession

@endsection
