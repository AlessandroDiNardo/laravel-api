@extends('layouts.main-layout')

@section('content')
    <h1 class="text-danger mb-3">List Movie</h1>

    
    <a href="{{ route('home') }}" class="btn btn-danger my-3">
        <i class="fa-solid fa-igloo"></i>
        Home
    </a>
    <div class="d-flex flex-wrap justify-content-center gap-5">

        @foreach ($movies as $movie)
                <div class="card border border-3 border-danger" style="width: 300px;">
                    <div class="card-body text-start">
                        <h5 class="card-title">{{ $movie -> name }}</h5>
                        <span>Release Date: {{ $movie -> release_date }}</span>
                        <br>
                        <span>Cash Out: {{ $movie -> cash_out }}</span>
                    </div>
                </div>   
            @endforeach

    </div>
@endsection