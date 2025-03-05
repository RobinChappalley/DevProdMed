<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('1', function () {
    return 'page 1';
});
Route::get('2', function () {
    return 'page 2';
});
Route::get('3', function () {
    return 'page 3';
});
Route::get('4', function () {
    return 'page 5';
});

Route::get(' {n}', function ($n) {
    return "page $n";
})->where('n', '[1-3]');

Route::get('afficheDate', function () {
    $date = now();
    echo 'Voici le détail de la variable date :' . '<BR>';
    var_dump($date);

    echo '<BR>';
    echo "Aujourd'hui nous sommes le " . $date;
});


Route::get('afficheDate2', function () {
    $date = now();
    echo 'Voici le détail de la variable date :' . '<BR>';
    dd($date);

});
Route::get('cff', function () {
    return redirect('https://www.sbb.ch/fr/');
});
Route::get('maison', function () {
    return redirect()->route('home');
});

Route::get(
    'uneRoute/{param1}/{param2}/{param3?}',
    function ($param1, $param2, $param3 = "Laravel") {
        return $param1 . ' ' . $param2 . ' ' . $param3;
    }
);