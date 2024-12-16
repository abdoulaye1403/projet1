@extends('layouts.app')

@section('contenu')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-3 mt-3">Liste des Cours</h1>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">Ajouter un Cours</a>
        </div>

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endsession

        <table class="table mb-3 mt-3">
            <thead>
              <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Titre</th>
                <th scope="col" class="text-center">Description</th>
                <th scope="col" class="text-center">Professeur</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($courses as $course)
                <tr>
                    <th scope="row" class="text-center">{{ $course->id }}</th>
                    <td class="text-center">{{ $course->title }}</td>
                    <td class="text-center">{{ $course->description }}</td>
                    <td class="text-center">{{ $course->teacher?->first_name }} {{ $course->teacher?->last_name }}</td>
                    <td class="text-center">
                        <a href="{{ route('courses.show', ['course' => $course]) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('courses.edit', ['course' => $course]) }}" class="btn btn-warning">Modifier</a>
                        <form id="deleteForm-{{ $course->id }}" action="{{ route('courses.destroy', ['course' => $course]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>

                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection
