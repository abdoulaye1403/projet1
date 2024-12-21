@extends('layouts.app')

@section('title', 'Professeurs')
@section('content')
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

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Grade</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->user->name }}</td>
                        <td>{{ $teacher->user->email }}</td>
                        <td>{{ $teacher->grade }}</td>
                        <td>{{ $teacher->gender }}</td>
                        <td>
                            <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-primary btn-sm">Voir</a>
                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
