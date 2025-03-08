<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonPremierControleur extends Controller
{
    public function maMethodeDansControleur()
    {
        return view('welcome');
    }
}
