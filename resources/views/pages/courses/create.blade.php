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

        <form action="{{ route('teachers.courses.store',$teacher_id) }}" method="POST">
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

            <input type="hidden" name="teacher_id" value="{{ $teacher_id }}">
            <div class="mb-5">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
