<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controleurDeProverbes extends Controller
{
    public function afficherProverbes()
    {

        $proverbes = [
            "fol est qui se coupe de son propre couteau",
            "fol est qui se couvre d’un sac mouillé",
            "fol est qui se fait brebis entre les loups",
            "fol est qui se fie en eau endormie",
            "fol est qui se marie à femme étourdie",
            "fol est qui son bien ne pourchasse",
            "fol est qui s’enivre de sa propre bouteille",
            "fol est qui s’oublie",
            "fol est tenu par tout l’empire, qui a le choix et prend le pire",
            "fol et félon ne peuvent avoir paix",
            "fol ne croit jusques à tant qu’il reçoit",
            "fol ne croit jusqu’à tant qu’il reçoit",
            "fol ne croit s’il ne reçoit"
        ];

        $n°deProverbe = rand(0, count($proverbes) - 1);
        return view('proverbes')->with('proverbe', $proverbes[$n°deProverbe]);
    }
}
