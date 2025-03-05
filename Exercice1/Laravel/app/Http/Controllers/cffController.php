<?php

namespace App\Http\Controllers;

class cffController extends Controller
{
    public function redirect($villeDepart, $heureDepart, $villeArrivee)
    {
        $date = now()->format('d.m.Y');
        $url = "https://www.sbb.ch/fr/acheter/pages/fahrplan/fahrplan.xhtml?von=$villeDepart&nach=$villeArrivee&datum=$date&zeit=$heureDepart&suche=true";
        return redirect($url);
    }
}