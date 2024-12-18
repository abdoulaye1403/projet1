@extends('layouts.app')

@section('contenu')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-3 mt-3">Liste des etudiants</h1>
            <a href="{{ route('students.create') }}" class="btn btn-primary">Ajouter un Etudiant</a>
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
                <th scope="col" class="text-center">Nom</th>
                <th scope="col" class="text-center">Prenom</th>
                <th scope="col" class="text-center">Adresse</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Telephone</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
                <tr>
                    <th scope="row" class="text-center">{{ $student->id }}</th>
                    <td class="text-center">{{ $student->first_name }}</td>
                    <td class="text-center">{{ $student->last_name }}</td>
                    <td class="text-center">{{ $student->address }}</td>
                    <td class="text-center">{{ $student->email }}</td>
                    <td class="text-center">{{ $student->phone_number }}</td>
                    <td class="text-center">
                        <a href="{{ route('students.show', ['student' => $student]) }}" class="btn btn-primary btn-sm rounded">Voir</a>
                        <a href="{{ route('students.edit', ['student' => $student]) }}" class="btn btn-warning btn-sm rounded">Modifier</a>
                        <a href="{{ route('studentscourses.create',['student' => $student->id]) }}" class="btn btn-secondary btn-sm rounded">Ajouter cours</a>
                        <form id="deleteForm-{{ $student->id }}" action="{{ route('students.destroy', ['student' => $student]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce etudiant?')">
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
