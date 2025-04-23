@extends('layouts.main_layout')
@section('content')

{{-- estrutura for --}}
@for ($index=0;$index<10;$index++)

    {{-- continue no indice 5 (pular este indice) --}}
    @if ($index==5)
        @continue
    @endif

    <p>{{$index}}</p>

    {{-- break no indice 7 --}}
    @if ($index==7)
        @break
    @endif

@endfor

<hr />

@foreach ($cities as $city)
    <p>
        {{$loop->index . " - " . $city}}
        @if ($loop->first)
            <strong> (Primeira Cidade)</strong>
        @elseif ($loop->last)
            <strong> (Última Cidade)</strong>
        @endif

    </p>
@endforeach

<hr />

@endsection
