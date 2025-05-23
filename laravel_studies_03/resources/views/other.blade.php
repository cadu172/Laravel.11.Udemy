@extends('layouts.other_layout')
@section('page_title', 'Other Page')
@section('top_bar')
    <div>Conteudo Adicional do TOP-BAR</div>
    @parent
@endsection
@section('content')
    <div>Conteudo da Pagina</div>
@endsection
@section('bottom_bar')
    <div>Conteudo Adicional do BOTTOM-BAR</div>
@endsection
