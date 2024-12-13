@extends('layout.app')

@section('content')
<h1 class="text-center">Détails du Cours: {{ $cours->titre }}</h1>
<p class="text-center">Description: {{ $cours->description }}</p>

<h2 class="text-center">Professeur</h2>
<p class="text-center">{{ $cours->professeur->nom }} {{ $cours->professeur->prenom }}</p>

<h2 class="text-center">Chapitres</h2>
@if($cours->chapitres->isNotEmpty())
    <ul class="text-center">
        @foreach($cours->chapitres as $chapitre)
            <li style="list-style-type: none;"><a href="{{ route('chapitre.detail', $chapitre->id) }}">{{ $chapitre->titre }}</a></li>
        @endforeach
    </ul>
@else
    <p class="text-center">Aucun chapitre trouvé.</p>
@endif
@endsection
