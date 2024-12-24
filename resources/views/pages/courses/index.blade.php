@extends('layouts.app')

@section('title', 'Cours')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-3 mt-3">Liste des Cours</h1>
            <a href="{{ route('teachers.courses.create',$teacher) }}" class="btn btn-primary">Ajouter un Cours</a>
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
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($courses as $course)
                <tr>
                    <th scope="row" class="text-center">{{ $course->id }}</th>
                    <td class="text-center">{{ $course->title }}</td>
                    <td class="text-center">{{ $course->description }}</td>
                    <td class="text-center">
                        <a href="{{ route('teachers.courses.show', [$teacher, 'course' => $course->id]) }}" class="btn btn-primary btn-sm rounded">Voir</a>
                        <a href="{{ route('teachers.courses.edit', [$teacher, 'course' => $course->id]) }}" class="btn btn-warning btn-sm rounded">Modifier</a>
                        <form id="deleteForm-{{ $course->id }}" action="{{ route('teachers.courses.destroy',[$teacher,'course' => $course->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded"
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
