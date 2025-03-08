<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\cffController;
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get(' {n}', function ($n) {
    return view('article')->with('n', $n);
})->where('n', '[1-3]');


Route::get('1', function () {
    return 'page 1';
});
Route::get('2', function () {
    return 'page 2';
});
Route::get('3', function () {
    return 'page 3';
});



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


Route::get('livret/{n}', function ($n) {
    return view('livret')->with('n', $n);
})->where('n', '[2-9]|1[0-2]');

Route::get('page1', function () {
    return view('article');
})->name('page1');
Route::get('Page1', function () {
    return redirect()->route('page1');
});

Route::get(
    'cff/{villeDepart}/{heureDepart}/{villeArrivee}/{dateDepart?}',
    [cffController::class, 'redirect']
);