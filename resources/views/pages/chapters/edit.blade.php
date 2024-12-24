@extends('layouts.app')

@section('title', 'Editer_chapitre')
@section('content')
    <div class="container">
        <h1>Modifier un Chapitre</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.chapters.update',[$course_id,'chapter'=>$chapter]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $chapter->title }}" placeholder="Entrez le nom du chapitre">
                <span class="text-small text-danger">@error('title') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Description</label>
                <textarea id="content" name="content" class="form-control" rows="5">{{  $chapter->content }}</textarea>
            </div>
            <input type="hidden" name="course_id" value="{{ $course_id }}">
            <div class="mb-5">
                <button class="btn btn-primary" type="submit">Modifier</button>
            </div>
        </form>
    </div>
@endsection
