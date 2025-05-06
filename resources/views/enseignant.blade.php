<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Sections</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Gestion Système</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('enseignants.index') }}">Gestion des Enseignants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('administrations.index') }}">Gestion de l'Administration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('personnel.index') }}">Gestion du Personnel</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="my-4 text-center">Choisissez une section à gérer</h2>

        <div class="row text-center">
            <div class="col-md-4">
                <a href="{{ route('enseignants.index') }}" class="btn btn-primary btn-lg w-100">Gestion des Enseignants</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('administrations.index') }}" class="btn btn-success btn-lg w-100">Gestion de l'Administration</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('personnel.index') }}" class="btn btn-warning btn-lg w-100">Gestion du Personnel</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
