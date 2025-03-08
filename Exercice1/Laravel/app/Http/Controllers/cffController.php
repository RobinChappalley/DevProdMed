<?php

namespace App\Http\Controllers;

class cffController extends Controller
{
    public function redirect(
        $villeDepart,
        $heureDepart,
        $villeArrivee,
        $dateDepart = null
    ) {
        // Vérifie si dateDepart est null OU si le format ne correspond pas à dd.mm.yyyy
        if ($dateDepart === null || !preg_match('/^[0-9]{2}\.[0-9]{2}\.[0-9]{4}$/', $dateDepart)) {
            $dateDepart = now()->format('d.m.Y');
        }

        $url = "https://www.sbb.ch/fr/acheter/pages/fahrplan/fahrplan.xhtml?von=$villeDepart&nach=$villeArrivee&datum=$dateDepart&zeit=$heureDepart&suche=true";
        return redirect($url);
    }
}