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

    public function recupererListe()
    {
        $classList = [];
        $file = fopen(storage_path('app/public/classList.txt'), 'r');

        while (!feof($file)) {
            $classList[] = fgets($file);
        }
        fclose($file);

        return $classList;
    }

    public function afficheListe()
    {
        $classList = $this->recupererListe();
        return view("view_liste", ["classList" => $classList]);
    }
}
