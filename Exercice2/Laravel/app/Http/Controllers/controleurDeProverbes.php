<?php

namespace App\Http\Controllers;

use Dom\HTMLDocument;
use DOMDocument;
use Illuminate\Http\Request;

class controleurDeProverbes extends Controller
{
    const NBPROVERBESVOULUS = 10;
    public function afficherProverbes()
    {

        $proverbes = $this->recupererProverbesDepuisLeWeb();
        for ($i = 0; $i < self::NBPROVERBESVOULUS; $i++) {
            $nProverbe = rand(0, count($proverbes) - 1);
            $dixProverbes[] = $proverbes[$nProverbe];
        }
        return view('proverbes', ['proverbes' => $dixProverbes]);


    }
    public function recupererProverbes()
    {
        $proverbes = [];
        $file = fopen(storage_path('app/public/proverbes.txt'), 'r');
        while (!feof($file)) {
            $proverbes[] = fgets($file);
        }
        fclose($file);
        return $proverbes;

    }

    public function recupererProverbesDepuisLeWeb()
    {

        //Cela fonction car on masque les erreurs HTML !
        $file = new DOMDocument();
        $html = file_get_contents("https://fr.wiktionary.org/wiki/Annexe:Liste_de_proverbes_fran%C3%A7ais");
        $file->loadHTML($html, LIBXML_NOERROR);
        $proverbes = [];
        $elements = $file->getElementsByTagName("li");
        foreach ($elements as $element) {
            $proverbes[] = $element->textContent;
        }

        return $proverbes;
    }
}