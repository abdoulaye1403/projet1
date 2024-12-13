<?php

namespace App\Http\Controllers;
use App\Models\Cours;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function cours()
    {
        $cours = Cours::with('professeur','chapitres')->get();
        return view('page/cours',compact('cours'));
    }

    public function etudiant_liste()
    {
        return view('page/etudiant');
    }

    public function professeur_liste()
    {
        return view('page/professeur');
    }

    public function chapitre()
    {
        return view('page/chapitre');
    }

    public function detailCours(Cours $cours)
    {
        $cours->load('professeur','chapitres');
        return view('page/detailCours',compact('cours'));
    }
}
