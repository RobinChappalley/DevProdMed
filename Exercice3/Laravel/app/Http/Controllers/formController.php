<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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




    public function traiteListe(Request $request)
    {
        $info = [];
        if ($request->has('classList')) {
            $info['classList'] = $request->classList;
            $info['times'] = $request->times;
            $this->calculerHeures($info);
        }
        // return view("view_reception", ["classList" => $request->classList]);
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

    public function calculerHeures($info)
    {
        $heureDebut = new Carbon($info['times'][0]);
        $heureFin = new Carbon($info['times'][1]);
        $dureeIntervalle = Carbon::parse($info['times'][2])->diffInMinutes(Carbon::parse('00:00'));
        $tempsRdvDispo = $heureDebut->diffInMinutes($heureFin);
        if ($tempsRdvDispo < 0) {
            throw new \Exception("L'heure de fin est avant l'heure de début");
        }



        $tempsRdvEffectif = $tempsRdvDispo ;
        // - $dureeIntervalle->diffInMinutes();
        if ($tempsRdvEffectif < 0) {
            throw new \Exception("Le temps de rdv effectif est négatif");
        }
        $tempsRdvEffectif = $tempsRdvEffectif / count($info['classList']);
        
        

        // $duree = $duree / count($info['classList']);
        dd($dureeIntervalle);
    }
}
