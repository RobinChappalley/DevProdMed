<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controleurDeProverbes extends Controller
{
    const NBPROVERBESVOULUS = 10;
    public function afficherProverbes()
    {

        $proverbes = $this->recupererProverbes();
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
        // var_dump($proverbes);
        return $proverbes;

    }
}