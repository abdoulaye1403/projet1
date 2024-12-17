@extends('layouts.app')

@section('contenu')
<div class="container d-flex flex-column justify-content-center align-items-center">
    <h1>Détails du Cours</h1>

    <!-- Détails du Cours -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $course->title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Description :</strong> {{ $course->description }}</p>
            <p><strong>Professeur :</strong> {{ $course->teacher?->first_name }} {{ $course->teacher?->last_name }}</p>
            <p><strong>Date de Création :</strong> {{ $course->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <!-- Liste des Chapitres -->
    <h3>Chapitres</h3>
    @if($course->chapters->isNotEmpty())
        <ul class="list-group mb-4">
            @foreach($course->chapters as $chapitre)
                <li class="list-group-item">
                    <strong>{{ $chapitre->title }}</strong>
                    <p>{{ Str::limit($chapitre->content, 150) }}</p>
                    <a href="{{ route('chapters.show',['chapter' => $chapitre]) }}" class="btn btn-primary btn-sm">Voir le Chapitre</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucun chapitre disponible pour ce cours.</p>
    @endif
     <!-- Boutons d'Action -->
    <a href="{{ route('index') }}" class="btn btn-secondary">Retour à la Liste des Cours</a>
</div>
@endsection
