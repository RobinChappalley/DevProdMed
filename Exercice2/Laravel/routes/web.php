<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonPremierControleur;
use App\Http\Controllers\controleurDeProverbes;

Route::get('/', [MonPremierControleur::class, 'maMethodeDansControleur']);

Route::get('article/{n}/couleur/{c}', function ($n, $c) {
    return view('maVue')->with('numero', $n)->with('couleur', $c);
})->where(['n' => '[0-9]+', 'c' => 'rouge|vert|bleu']);

Route::get('test/{n}/{c}', [MonPremierControleur::class, 'test'])
    ->where(['n' => '[0-9]+', 'c' => 'rouge|vert|bleu']);

Route::get('artistes/{l?}', [MonPremierControleur::class, 'afficherTableau']);

Route::get('afficherImage', [MonPremierControleur::class, 'afficherImage']);

Route::get('proverbes', [controleurDeProverbes::class, 'afficherProverbes']);