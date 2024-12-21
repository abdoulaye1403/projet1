@extends('layouts.app')

@section('title', 'Etudiants')
@section('content')
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

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->user->email }}</td>
                        <td>{{ $student->grade }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm">Voir</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce etudiant ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
