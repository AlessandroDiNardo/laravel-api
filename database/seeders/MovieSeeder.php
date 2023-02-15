<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie :: factory() -> count(100) -> make() -> each(function($p){

            $genre = Genre :: inRandomOrder() -> first();
            $p -> genre() -> associate($genre);

            $p -> save();

            $tags = Tag :: inRandomOrder() -> limit(rand(1, 3)) -> get();
            $p -> tags() -> attach($tags);
        }); 
    }
}
