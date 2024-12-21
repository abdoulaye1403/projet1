@extends('layouts.app')

@section('title', 'Ajouter_chapitre')
@section('content')
    <div class="container">
        <h1>Ajouter un Chapitre</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('chapters.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Entrez le nom du chapitre">
                <span class="text-small text-danger">@error('title') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Description</label>
                <textarea id="content" name="content" class="form-control" rows="5">{{ old('content') }}</textarea>
            </div>
            <input type="hidden" name="course_id" value="{{ request('course_id') }}">
            <div class="mb-5">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
