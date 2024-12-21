@extends('layouts.app')

@section('title', 'Ajouter_etudiants')
@section('content')
    <div class="container">
        <h1>Ajouter un Etudiant</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Nom complet</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="gender">Genre</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="male">Homme</option>
                        <option value="female">Femme</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
            </div>
                <div class="col-md-6">
                    <label for="dateofbirth">Date de naissance</label>
                    <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="address">Adresse</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="phone">Téléphone</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Créer l'etudiant</button>
        </form>
    </div>
@endsection
