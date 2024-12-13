@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="text-center">Liste des cours</h1>

    @if ($cours->isEmpty())
        <p>Aucun cours disponible pour le moment.</p>
    @else
        <div class="row d-flex justify-content-center">
            @foreach ($cours as $cour)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cour->titre }}</h5>
                            <p class="card-text">{{ Str::limit($cour->description, 100) }}</p>
                            <p><strong>Enseignant :</strong> {{ $cour->professeur->nom }} {{ $cour->professeur->prenom }}</p>
                            <a href="{{ route('cours.detail', $cour->id) }}" class="btn btn-primary">Voir le cours</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
