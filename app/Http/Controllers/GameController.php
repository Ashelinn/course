<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('games.index',[
            'page' => 'Game'
        ]);
    }

    public function logicaGame()
    {
        return view('games.logica',[
            'page' => 'Game Logica'
        ]);
    }

    public function arcanoidGame()
    {
        return view('games.arcanoid',[
            'page' => 'Game Arcanoid'
        ]);
    }

    public function clickGame()
    {
        return view('games.clickgame',[
            'page' => 'Game clickGame'
        ]);
    }
}
