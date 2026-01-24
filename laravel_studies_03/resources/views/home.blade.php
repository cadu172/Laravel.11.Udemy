@extends('layouts.main_layout')
@section('page_title','Usando componentes')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($pessoas as $pessoa=>$idiomas)
            <x-card-pessoa :$pessoa :$idiomas  />
        @endforeach
    </div>
</div>
@endsection
