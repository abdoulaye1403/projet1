@extends('layouts.app')

@section('contenu')
<div class="container d-flex flex-column justify-content-center align-items-center">
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
