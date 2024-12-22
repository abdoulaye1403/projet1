@extends('layouts.app')

@section('title', 'Detail_Cours')
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
        @if (auth()->user()->hasRole('teacher')||auth()->user()->hasRole('admin'))
            <a href="{{ route('courses.chapters.create',['course' => $course]) }}" class="btn btn-secondary btn-sm m-1">Ajouter un chapitre</a> 
        @endif
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
                @foreach ($course->chapters as $chapter)
                    <tr>
                        <td class="text-center">{{ $chapter->id }}</td>
                        <td class="text-center">{{$chapter->title}}</td>
                        <td class="text-center">{{ Str::limit($chapter->content, 150) }}</td>
                        <td class="text-center">
                            <a href="{{ route('courses.chapters.show', ['course' => $course->id, 'chapter' => $chapter->id]) }}" class="btn btn-primary btn-sm m-1">Voir</a>
                            @if (auth()->user()->hasRole('teacher'))
                                <a href="{{ route('courses.chapters.edit', ['course' => $course->id, 'chapter' => $chapter->id]) }}" class="btn btn-warning btn-sm m-1">Modifier</a>
                                <a href="{{ route('courses.chapters.create', ['course' => $course->id, 'chapter' => $chapter->id]) }}" class="btn btn-secondary btn-sm m-1">Ajouter</a> 
                                <form id="deleteForm-{{ $chapter->id }}" action="{{ route('courses.chapters.destroy', ['course' => $course->id, 'chapter' => $chapter->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm m-1"
                                        onclick="return confirm('��tes-vous s��r de vouloir supprimer ce chapitre ?')">
                                        Supprimer
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @guest
        <!-- Boutons d'Action -->
        <a href="{{ route('home') }}" class="btn btn-secondary">Retour à la Liste</a>
    @else
        @if (auth()->user()->hasRole('teacher'))
            <a href="{{ route('teachers.courses', $course->teacher->id) }}" class="btn btn-primary mt-3">Retour</a>
        @elseif (auth()->user()->hasRole('student'))
            <a href="{{ route('home') }}" class="btn btn-secondary">Retour à la Liste</a>
        @endif
    @endguest
</div>
@endsection
