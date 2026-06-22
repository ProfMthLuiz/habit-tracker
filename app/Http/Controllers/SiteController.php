<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $name = "Matheus";
        $habits = ["Estudar Programação", "Ficar em Familia", "Ver Jogos"];

        // return view('home', [
        //     'name' => $name,
        //     'habits' => $habits
        // ]);

        return view('home', compact('name', 'habits'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
