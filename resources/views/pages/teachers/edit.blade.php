@extends('layouts.app')

@section('title', 'Editer_professeur')
@section('content')
    <div class="container">
        <h1>Modifier un Profeeseur</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label">Nom</label>
                <div class="col-md-6">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $teacher->user->name) }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-6">
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $teacher->user->email) }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="gender" class="col-md-4 col-form-label">Genre</label>
                <div class="col-md-6">
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="male" {{ old('gender', $teacher->gender) == 'male' ? 'selected' : '' }}>Homme</option>
                        <option value="female" {{ old('gender', $teacher->gender) == 'female' ? 'selected' : '' }}>Femme</option>
                        <option value="other" {{ old('gender', $teacher->gender) == 'other' ? 'selected' : '' }}>Autre</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="grade" class="col-md-4 col-form-label">Grade</label>
                <div class="col-md-6">
                    <select name="grade" id="grade" class="form-control" required>
                        <option value="Master" {{ old('grade', $teacher->grade) == 'Master' ? 'selected' : '' }}>Master</option>
                        <option value="Doctorat" {{ old('grade', $teacher->grade) == 'Doctorat' ? 'selected' : '' }}>Doctorat</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="dateofbirth" class="col-md-4 col-form-label">Date de naissance</label>
                <div class="col-md-6">
                    <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" value="{{ old('dateofbirth', $teacher->dateofbirth) }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-md-4 col-form-label">Adresse</label>
                <div class="col-md-6">
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $teacher->address) }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label">Téléphone</label>
                <div class="col-md-6">
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $teacher->phone) }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
