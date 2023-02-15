@extends('layouts.main-layout')

@section('content')

<div class="container-fluid p-5">
    <h1 class="text-danger">Create New Movie</h1>

    <a href="{{ route('movies') }}" class="btn btn-danger my-3">
        <i class="fa-solid fa-clipboard-list"></i>
        Movie List
    </a>

    {{-- messaggi di errore --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{route('store.movie')}}" class="p-3">
        
        @csrf

        <div class="input-group my-2">
            <label for="name" class="input-group-text" id="basic-addon1">Name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="input-group my-2">
            <label for="release_date" class="input-group-text" id="basic-addon1">Release Date</label>
            <input type="date" class="form-control" name="release_date">
        </div>

        <div class="input-group my-2">
            <label for="cash_out" class="input-group-text" id="basic-addon1">Cash Out</label>
            <input type="number" class="form-control" name="cash_out">
        </div>

        <select name="genre_id" class="form-select form-select-sm" aria-label="form-select-sm example">
            <option selected>Select Genre</option>
            @foreach ($genres as $genre)
                <option value="{{$genre -> id}}">{{$genre -> name}}</option>
            @endforeach
        </select>

        <div class="card text-center my-5">
            <div class="card-header">
                <h4>Select Category</h4>
            </div>
            <div class="card-body d-flex flex-wrap gap-3">
                @foreach ($tags as $tag)
                <div class="form-check">
                    <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag -> id }}">
                    <label class="form-check-label" for="tags">
                        {{ $tag -> name }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>

        <button class="btn btn-danger my-2" type="submit">
            <i class="fa-solid fa-square-plus"></i>
            Create
        </button>
        
    </form>

</div>
@endsection