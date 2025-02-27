@extends('layouts.app')

@section('title', 'Editer_cours')
@section('content')
    <div class="container">
        <h1>Modifier un Cours</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teachers.courses.update',[$teacher_id,'course' => $course]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Nom</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}" placeholder="Entrez le nom du cours">
                <span class="text-small text-danger">@error('title') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $course->description }}" placeholder="Entrez une description">
            </div>

            <input type="hidden" name="teacher_id" value="{{ $teacher_id }}">
            <div class="mb-5">
                <button class="btn btn-primary" type="submit">Modifier</button>
            </div>
        </form>
    </div>
@endsection
