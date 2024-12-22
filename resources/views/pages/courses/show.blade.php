@extends('layouts.app')

@section('title', 'Detail_cours')
@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center">
    <!-- Détails du Cours -->
    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $course->title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Description :</strong> {{ $course->description }}</p>
            <p><strong>Professeur :</strong> {{ $course->teacher?->user->name }}</p>
            <p><strong>Date de Création :</strong> {{ $course->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
    <!-- Liste des Chapitres -->
    <h3>Chapitres</h3>
    @if ($course->chapters->isEmpty())
        <p>Aucun chapitre trouvé.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nom du chapitre</th>
                    <th class="text-center">Contenu</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->chapters as $chapitre)
                    <tr>
                        <td class="text-center">{{ $chapitre->id }}</td>
                        <td class="text-center">{{$chapitre->title}}</td>
                        <td class="text-center">{{ Str::limit($chapitre->content, 150) }}</td>
                        <td class="text-center">
                            <a href="{{ route('chapters.show',['chapter' => $chapitre]) }}" class="btn btn-primary btn-sm m-1">Voir</a>
                            <a href="{{ route('chapters.edit',['chapter' => $chapitre]) }}" class="btn btn-warning btn-sm m-1">Modifier</a>
                            <form id="deleteForm-{{ $chapitre->id }}" action="{{ route('chapters.destroy', ['chapter' => $chapitre]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-1 btn-sm"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chapitre?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

     <!-- Boutons d'Action -->
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Retour à la Liste</a>
</div>
@endsection
