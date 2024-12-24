@extends('layouts.app')

@section('title', 'Ajouter_cours')
@section('content')
    <div class="container">
        <h1>Ajouter un Cours</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teachers.courses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nom</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Entrez le nom du cours">
                <span class="text-small text-danger">@error('title') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Entrez une description">
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="teacher" name="teacher_id">
                    <option selected>Choisir un professeur</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
