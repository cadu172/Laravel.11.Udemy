@extends('layouts.main_layout')
@section('page_title','Usando componentes')
@section('content')
<h1>Aqui é o conteudo da View</h1>
<x-my-component message="Mensagem passada para dentro do componente" />
<x-admin.admin-card :name="$myName" teste="Conteudo da variável teste" />
<h1>Aqui é o conteudo da View</h1>
@endsection
