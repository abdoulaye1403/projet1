@extends('layouts.app')

@section('contenu')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Liste des Courss</h1>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">Ajouter un Cours</a>
        </div>

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endsession

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Professeur</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $course->id }}</th>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->teacher?->first_name }} {{ $course->teacher?->last_name }}</td>
                    <td>
                        <a href="" class="btn btn-primary">Voir</a>
                        <a href="{{ route('courses.edit', ['course' => $course]) }}" class="btn btn-warning">Modifier</a>
                        <form id="deleteForm-{{ $course->id }}" action="{{ route('courses.destroy', ['course' => $course]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#" onclick="document.getElementById('deleteForm-{{ $course->id }}').submit()" class="btn btn-danger">Supprimer</a>
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection
