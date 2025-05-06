<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Matière</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 400px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            height: 40px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/list">
                                <i class="fas fa-list"></i> Liste des Matières
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('matieres.create') }}">
                                <i class="fas fa-plus"></i> Ajouter une matière
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Gestion des Matières</h1>
                </div>

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <h1>Ajouter une Matière</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('matieres.store') }}" method="POST">
        @csrf

        <label for="nom_matiere">Nom de la matière:</label>
        <input type="text" id="nom_matiere" name="nom_matiere" required maxlength="50">

        <label for="id_classe">Classe:</label>
        <select id="id_classe" name="id_classe" required>
            @foreach($classes as $classe)
                <option value="{{ $classe->id_classe }}">{{ $classe->nom_classe }}</option>
            @endforeach
        </select>

        <label for="id_section">Section:</label>
        <select id="id_section" name="id_section" required>
            @foreach($sections as $section)
                <option value="{{ $section->id }}">{{ $section->nom_section }}</option>
            @endforeach
        </select>

        <button type="submit">Ajouter la Matière</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>