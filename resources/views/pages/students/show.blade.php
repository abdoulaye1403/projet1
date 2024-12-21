@extends('layouts.app')

@section('title', 'Detail_etudiant')
@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center">
    <!-- Détails du Cours -->
    <div class="card">
        <div class="card-header">
            {{ $student->user->name }}
        </div>
        <div class="card-body">
            <p><strong>Email : </strong>{{ $student->user->email }}</p>
            <p><strong>Genre : </strong>{{ $student->gender }}</p>
            <p><strong>Date de naissance : </strong>{{ $student->dateofbirth }}</p>
            <p><strong>Adresse : </strong>{{ $student->address }}</p>
            <p><strong>Téléphone : </strong>{{ $student->phone }}</p>
        </div>
    </div>

    <!-- Liste des Cours -->
    <h3>Cours</h3>
    @if ($student->courses->isEmpty())
        <p>Aucun cours trouvé.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nom du cours</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student->courses as $course)
                    <tr>
                        <td class="text-center">{{ $course->id }}</td>
                        <td class="text-center">{{ $course->title }}</td>
                        <td class="text-center">{{ Str::limit($course->description, 150)}}</td>
                        <td class="text-center">
                            <a href="{{ route('courses.show',['course' => $course]) }}" class="btn btn-primary btn-sm m-1">Voir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

     <!-- Boutons d'Action -->
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Retour à la Liste</a>
</div>
@endsection
