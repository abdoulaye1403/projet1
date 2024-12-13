@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="text-center">Liste des professeurs</h1>

    @if ($professeurs->isEmpty())
        <p>Aucun professeur disponible pour le moment.</p>
    @else
        <div class="row d-flex justify-content-center">
            @foreach ($professeurs as $professeur)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <p><strong>Nom :</strong> {{ $professeur->nom }}</p>
                            <p><strong>Prenom :</strong> {{ $professeur->prenom }}</p>
                            <p><strong>Grade :</strong> {{ $professeur->grade }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
