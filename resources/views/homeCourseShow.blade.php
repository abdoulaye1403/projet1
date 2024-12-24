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
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nom du chapitre</th>
                    <th class="text-center">Contenu</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->chapters as $chapter)
                    <tr>
                        <td class="text-center">{{ $chapter->id }}</td>
                        <td class="text-center">{{$chapter->title}}</td>
                        <td class="text-center">{{ Str::limit($chapter->content, 150) }}</td>
                        <td class="text-center">
                            <a href="{{ route('courses.chapters.show',['teacher' => $course->teacher_id,$course,'chapter' => $chapter]) }}" class="btn btn-primary btn-sm m-1">Voir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
        <!-- Boutons d'Action -->
        <a href="{{ route('home') }}" class="btn btn-secondary">Retour à la Liste</a>
</div>
@endsection
