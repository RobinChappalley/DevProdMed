<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PhpParser\Node\Stmt\For_;
use function Laravel\Prompts\form;

class formController extends Controller
{
    // public function afficheFormulaire()
    // {
    //     return view("view_form");
    // }

    // public function traiteFormulaire(Request $request)
    // {
    //     return view("view_reception", ["nom" => $request->nom]);
    // }


    public function traiteListe(Request $request)
    {
        $info = [];
        if ($request->has('classList')) {
            $info['classList'] = $request->classList;
            $info['times'] = $request->times;
            $timedata = $this->calculerHeures($info);
            $data = $this->mettreEnFormeHeures($timedata);
        }

        $elevesMelanges = $this->melangeEleves($info['classList']);
        return view(
            "view_reception",
            [
                "eleves" => $elevesMelanges,
                "tableauheures" => $data
            ]
        );
    }

    private function recupererListe()
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
        return view("view_liste", ["classList" => $this->recupererListe()]);
    }

    private function calculerHeures($info)
    {
        $heureDebut = new Carbon($info['times'][0]);
        $heureFin = new Carbon($info['times'][1]);
        $dureeIntervalle = -(Carbon::parse($info['times'][2])->diffInMinutes(Carbon::parse('00:00')));
        $tempsRdvDispo = $heureDebut->diffInMinutes($heureFin);
        $nombrerdv = count($info['classList']);
        $nombreintervalles = $nombrerdv - 1;
        $tempsRdvEffectif = $tempsRdvDispo - $dureeIntervalle * $nombreintervalles;

        if ($tempsRdvDispo < 0) {
            throw new \Exception("L'heure de fin est avant l'heure de début");
        }
        if ($dureeIntervalle < 0) {
            throw new \Exception("Prenez quand même une pause de temps en temps !");
        }
        if ($tempsRdvEffectif < 0) {
            throw new \Exception("Le temps de rdv effectif est négatif");
        }

        $dureerdv = $tempsRdvEffectif / $nombrerdv;
        $timeinfos = [
            "temps_de_rdv_dispo" => $tempsRdvDispo,
            "temps_de rdv_effectif" => $tempsRdvEffectif,
            "duree_d_un_intervalle" => $dureeIntervalle,
            "duree_d_un_rdv" => $dureerdv,
            "nombre_de_rdvs" => $nombrerdv,
            "nombre_d_intervalles" => $nombreintervalles,
            "heure_debut" => $heureDebut
        ];
        return $timeinfos;
    }

    private function mettreEnFormeHeures($timeinfos)
    {
        $retour = [];
        $heuredebut = $timeinfos["heure_debut"];
        $heurefin = 0;
        for ($i = 0; $i < $timeinfos["nombre_de_rdvs"]; $i++) {
            $heurefin = new Carbon($heuredebut)->addMinutes($timeinfos["duree_d_un_rdv"]);
            $retour[$i] = [
                new Carbon($heuredebut)->format('H:i:s'),
                new Carbon($heurefin)->format('H:i:s')
            ];
            $heuredebut = new Carbon($heurefin)->addMinutes($timeinfos["duree_d_un_intervalle"]);
        }
        return $retour;
    }

    private function melangeEleves($eleves)
    {
        return Arr::shuffle($eleves);
    }
}
