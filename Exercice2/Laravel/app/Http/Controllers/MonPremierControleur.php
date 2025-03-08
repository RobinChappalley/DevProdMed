<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
class MonPremierControleur extends Controller
{
    public function maMethodeDansControleur()
    {
        return view('welcome');
    }

    public function test($n, $c)
    {
        return $n . " : " . $c;
    }

    public function afficherTableau()
    {
        $artistes = array(
            array(
                "nom" => "Amy",
                "prenom" => "Winehouse",
                "dateNaissance" => new DateTime('14-09-1983')
            ),
            array(
                "nom" => "Janis",
                "prenom" => "Joplin",
                "dateNaissance" => new DateTime('19-01-1943')
            ),
            array(
                "nom" => "Jo",
                "prenom" => "Bar",
                "dateNaissance" => new DateTime('19-01-1943')
            ),
            array(
                "nom" => "Janis",
                "prenom" => "Siegel",
                "dateNaissance" => new DateTime('12-01-1990')
            ),
        );
        return view('maVue2')->with('artistes', $artistes);
    }

    public function afficherImage()
    {
        return view('maVue3');
    }
}
