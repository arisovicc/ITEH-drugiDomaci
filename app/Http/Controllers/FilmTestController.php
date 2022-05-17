<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //komentar
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
        $films = Film::find($id);
        return $films;
    }
}
