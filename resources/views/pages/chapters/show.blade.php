@extends('layouts.app')

@section('title', 'Detail_chapitre')
@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-center">Détails du Chapitre</h1>

    <!-- Détails du Cours -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $chapter->title }}</h2>
        </div>
        <div class="card-body">
            <p class="text-center"><strong>Description :</strong> {{ $chapter->content }}</p>
        </div>
    </div>
     <!-- Boutons d'Action -->
    <a href="{{ route('teachers.courses.index') }}" class="btn btn-secondary">Retour à la Liste des Cours</a>
</div>
@endsection
