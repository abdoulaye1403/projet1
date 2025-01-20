@extends('layouts.app')

@section('title', 'Detail_cours')
@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center">
    <!-- Détails du Cours -->
    <div class="mb-4 card">
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
    @if (auth()->user()->hasRole('teacher'))
        <a href="{{ route('courses.chapters.create',['course' => $course]) }}" class="m-1 text-right btn btn-secondary btn-sm">Ajouter un chapitre</a> 
    @endif
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
                            <a href="{{ route('courses.chapters.show',['teacher' => $course->teacher_id,$course,'chapter' => $chapitre]) }}" class="m-1 btn btn-primary btn-sm">Voir</a>
                            <a href="{{ route('courses.chapters.edit',[$course,'chapter' => $chapitre]) }}" class="m-1 btn btn-warning btn-sm">Modifier</a>
                            <form id="deleteForm-{{ $chapitre->id }}" action="{{ route('courses.chapters.destroy', [$course,'chapter' => $chapitre->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="m-1 btn btn-danger btn-sm"
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
    <a href="{{ route('teachers.courses.index',$teacher) }}" class="btn btn-secondary">Retour à la Liste</a>
</div>
@endsection
