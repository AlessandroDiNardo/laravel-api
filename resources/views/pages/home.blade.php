@extends('layouts.main-layout')

@section('content')
    <h1 class="text-danger">Movie Categories</h1>

    @foreach ($genres as $genre)
    <div class="card text-center my-5">

        <h2>Genre: {{ $genre -> name }}</h2>

        <div class="card-body d-flex flex-wrap gap-5">

            @foreach ($genre -> movies as $movie)
                <div class="card" style="width: 18rem;">
                    <div class="card-body text-start">
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