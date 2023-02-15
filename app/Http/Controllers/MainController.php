<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;
use App\Models\Genre;
use App\Models\Movie;


class MainController extends Controller
{
    // index
    public function home(){
        $genres = Genre :: all();
        return view('pages.home', compact('genres'));
    }

}
