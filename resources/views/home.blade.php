@extends('layouts.app')

@section('title', 'Accueil')
@section('content')
    <div class="container">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
                {{ session('status') }}
            </div>
        @endsession
        <h1 class="text-center">Liste des cours</h1>

        @if ($courses->isEmpty())
            <p>Aucun cours disponible pour le moment.</p>
        @else
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                                <p><strong>Professeur :</strong> {{ $course->teacher?->user->name }}</p>
                                <a href="{{ route('show_course', $course->id) }}" class="btn btn-primary">Voir le cours</a>
                                @auth
                                    @if (auth()->user()->hasRole('student'))
                                        <a href="" class="btn btn-success">S'inscrire</a>
                                    @endif
                                @endauth
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>  
@endsection
