<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours_ligne</title>
    <style>
        .titre{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="titre">Bonjour Bienvenue sur votre plateforme de cours en ligne</h1>
    <a href="">Acceuil</a>
    <a href="{{ route('cours') }}">Cours</a>
    <a href="{{ route('chapitre') }}">Chapitre</a>
    <a href="{{ route('etudiant') }}">Etudiants</a>
    <a href="{{ route('professeur') }}">Professeurs</a>
</body>
</html>