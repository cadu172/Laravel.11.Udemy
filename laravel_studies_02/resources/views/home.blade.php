@extends('layouts.main_layout')
@section('content')

@production
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to the Home Page</h1>
                <p>This is the home page of our application.</p>
            </div>
        </div>
    </div>
@else
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to the Development Environment</h1>
                <p>This is the development version of our application.</p>
            </div>
        </div>
    </div>
@endproduction


@env(['local','production','development'])
    <p>Estou no ambiente {{env('APP_ENV')}}</p>
@endenv

<form action="{{route("submit")}}" method="post">

    @csrf

    <div class="container sm">

        <div class="row">
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Enter your name">
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="row">
            <label for="country">Country:</label>
            <input type="text" name="country" placeholder="Enter your country">
            @error('country')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <button type="submit">Submit</button>

    </div>


</form>

@endsection
