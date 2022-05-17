<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmTestController extends Controller
{
    public function index() 
    {
        $films = Film::all();
        return $films;
    }

    public function show($id) 
    {
        $film = Film::find($id);
        return $film;
    }
}
