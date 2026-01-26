@extends('layouts.main_layout')
@section('page_title','Usando componentes')
@section('content')
<div class="container">
    <div class="row">
        {{-- 
        @foreach ($pessoas as $pessoa=>$idiomas)
            <x-card-pessoa :$pessoa :$idiomas  />
        @endforeach
        --}}
        <x-other-card>
            <h1 class="text-danger">Aqui estou passando o conteúdo do Slot</h1>
        </x-other-card>
    </div>
</div>
@endsection
