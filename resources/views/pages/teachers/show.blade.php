@extends('layouts.app')

@section('title', 'Detail_professeur')
@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center">
    <h1>Détails du professeur</h1>
    <div class="card">
        <div class="card-header">
            {{ $teacher->user->name }}
        </div>
        <div class="card-body">
            <p><strong>Email : </strong>{{ $teacher->user->email }}</p>
            <p><strong>Genre : </strong>{{ $teacher->gender }}</p>
            <p><strong>Grade : </strong>{{ $teacher->grade }}</p>
            <p><strong>Date de naissance : </strong>{{ $teacher->dateofbirth }}</p>
            <p><strong>Adresse : </strong>{{ $teacher->address }}</p>
            <p><strong>Téléphone : </strong>{{ $teacher->phone }}</p>
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
     <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
