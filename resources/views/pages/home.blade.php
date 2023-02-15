@extends('layouts.main-layout')

@section('content')
    <h1 class="text-danger">Movie Categories</h1>

    @foreach ($genres as $genre)
    <div class="card text-center p-5 bg-dark border border-0 ">

        <h2 class="text-white">Genre: {{ $genre -> name }}</h2>

        <div class="card-body d-flex flex-wrap justify-content-start gap-5  border border-1">

            @foreach ($genre -> movies as $movie)
                <div class="card border border-4 border-danger">
                    <div class="card-body text-start" style="width: 300px;">
                        <h2 class="card-title">Title: {{ $movie -> name }}</h2>
                        <p>
                            <strong>DESCRIPTION:</strong> 
                            <span>{{ $genre -> description ? $genre -> description : 'Description not available'}}</span>
                        </p>
                        <span>
                            <strong>Release Date:</strong> 
                            {{ $movie -> release_date }}</span>
                        <br>
                        <span>
                            <strong>Cash Out: </strong>
                            {{ $movie -> cash_out }}$</span>
                    </div>
                </div>   
            @endforeach

        </div>
    </div>
    @endforeach
@endsection