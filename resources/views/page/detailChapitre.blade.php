@extends('layout.app')

@section('content')
    <h1 class="text-center">chapitre {{ $chapitre->id }}: {{ $chapitre->titre }}</h1>
    <p class="text-center">{{ $chapitre->contenu }}</p>
@endsection
