<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::controller(PageController::class)->group(function () {
    Route::get('/', [PageController::class, 'cours'])->name('cours');
    Route::get('/etudiant', [PageController::class, 'etudiant_liste'])->name('etudiant');
    Route::get('/professeur', [PageController::class, 'professeur_liste'])->name('professeur');
    Route::get('/chapitre', [PageController::class, 'chapitre'])->name('chapitre');
    Route::get('/{cours}', [PageController::class, 'detailCours'])->name('cours.detail');
});

