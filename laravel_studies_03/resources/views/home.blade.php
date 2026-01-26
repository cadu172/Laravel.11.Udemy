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
        {{--<x-other-card>
            <h1 class="text-danger">Aqui estou passando o conteúdo do Slot</h1>
        </x-other-card>--}}


        <x-multi-slot>
            <x-slot:title>Título passado ao Slot</x-slot:title>
            <x-slot:content>Conteúdo do Slot</x-slot:content>
            <x-slot:footer>
                <p>Footer do Slot</p>
                <hr />
                <ul>                
                    <li>Linha 1</li>
                    <li>Linha 2</li>
                    <li>Linha 3</li>
                </ul>
            </x-slot:footer>
        </x-multi-slot>
    </div>
</div>
@endsection
