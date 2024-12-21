@extends('layouts.app')

@section('title', 'Ajouter_cours_etudiant')
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

        <form action="{{ route('studentscourses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <select class="form-select" aria-label="course" name="course_id">
                    <option selected>Choisir un cours</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="student_id" value="{{ request('student') }}">
            <div class="mb-5">
                <button class="btn btn-primary" type="submit">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
