@extends('layouts.app')

@section('contenu')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-3 mt-3">Liste des professeurs</h1>
            <a href="{{ route('teachers.create') }}" class="btn btn-primary">Ajouter un Professeur</a>
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
                <th scope="col" class="text-center">Grade</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teachers as $teacher)
                <tr>
                    <th scope="row" class="text-center">{{ $teacher->id }}</th>
                    <td class="text-center">{{ $teacher->first_name }}</td>
                    <td class="text-center">{{ $teacher->last_name }}</td>
                    <td class="text-center">{{ $teacher->address }}</td>
                    <td class="text-center">{{ $teacher->email }}</td>
                    <td class="text-center">{{ $teacher->phone_number }}</td>
                    <td class="text-center">{{ $teacher->grade }}</td>
                    <td class="text-center">
                        <a href="{{ route('teachers.show', ['teacher' => $teacher]) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('teachers.edit', ['teacher' => $teacher]) }}" class="btn btn-warning">Modifier</a>
                        <form id="deleteForm-{{ $teacher->id }}" action="{{ route('teachers.destroy', ['teacher' => $teacher]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?')">
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
