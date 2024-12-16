@extends('layouts.app')

@section('contenu')
    <div class="container">
        <h1>Ajouter un Profeeseur</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Entrez le nom du professeur">
                <span class="text-small text-danger">@error('first_name') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Entrez le prenom du professeur">
                <span class="text-small text-danger">@error('last_name') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Entrez l'adresse du professeur">
                <span class="text-small text-danger">@error('last_name') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" placeholder="Entrez la date de naissance du professeur">
                <span class="text-small text-danger">@error('birth_date') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Telephone</label>
                <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Entrez le numero de telephone du professeur">
                <span class="text-small text-danger">@error('phone_number') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Entrez l'email du professeur">
                <span class="text-small text-danger">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="grade" name="grade">
                    <option selected>Choisir grade</option>
                        <option value="Master">Master</option>
                        <option value="Doctorat">Doctorat</option>
                </select>
            </div>

            <div class="mb-5">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection