<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
	
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Tag;

use App\Mail\NewMovie;

class ApiController extends Controller
{
    
    public function getMovieWTagWGenre() {

        $movies = Movie :: with('tags') 
            -> orderBy('created_at', 'desc')
            -> get();
        $genres = Genre :: all();
        $tags = Tag :: all();

        return response() -> json([
            'success' => true,
            'response' => [
                'movies' => $movies,
                'genres' => $genres,
                'tags' => $tags,
            ]
        ]);
    }

}