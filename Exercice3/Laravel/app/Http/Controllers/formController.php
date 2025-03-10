<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    public function afficheFormulaire()
    {
        return view("view_form");
    }

    public function traiteFormulaire(Request $request)
    {
        return view("view_reception", ["nom" => $request->nom]);
    }
}
