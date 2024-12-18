@extends('layouts.app')

@section('contenu')
<div class="container d-flex flex-column justify-content-center align-items-center">
    <h1>Détails du professeur</h1>

    <!-- Détails du Cours -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $teacher->first_name }} {{ $teacher->last_name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Grade :</strong> {{ $teacher->grade }}</p>
            <p><strong>Email :</strong> {{ $teacher->email }}</p>
            <p><strong>Adresse :</strong> {{ $teacher->address }}</p>
        </div>
    </div>

    <!-- Liste des cours -->
    <h3>Ses Cours</h3>
    @if($teacher->courses->isNotEmpty())
        <ul class="list-group mb-4">
            @foreach($teacher->courses as $course)
                <li class="list-group-item">
                    <strong>{{ $course->title }}</strong>
                    <p>{{ Str::limit($course->description, 150) }}</p>
                    <a href="{{ route('courses.show',['course'=>$course])}}" class="btn btn-primary btn-sm">Voir le cours</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucun cours disponible pour ce professeurs.</p>
    @endif
     <!-- Boutons d'Action -->
    <a href="{{ route('index') }}" class="btn btn-secondary">Retour à la Liste des Cours</a>
</div>
@endsection
