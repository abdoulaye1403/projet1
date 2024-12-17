@extends('layouts.app')

@section('contenu')
<div class="container d-flex flex-column justify-content-center align-items-center">
    <h1>Détails de l'etudiant</h1>

    <!-- Détails du Cours -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $student->first_name }} {{ $student->last_name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Email :</strong> {{ $student->email }}</p>
            <p><strong>Adresse :</strong> {{ $student->address }}</p>
        </div>
    </div>

    <!-- Liste des Cours -->

     <!-- Boutons d'Action -->
    <a href="{{ route('index') }}" class="btn btn-secondary">Retour à la Liste des Cours</a>
</div>
@endsection
