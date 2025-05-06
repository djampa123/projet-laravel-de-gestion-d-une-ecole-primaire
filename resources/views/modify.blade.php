<!DOCTYPE html>
<html>
<head>
    <title>Modifier une matière</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            width: 400px;
            margin: 20px auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select[multiple] {
            height: 150px; /* Ajustez la hauteur selon vos besoins */
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
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

    <h1>Modifier une matière</h1>

    <form action="{{ route('matiere.update', $matiere->id_matiere) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nom_matiere">Nom de la matière :</label>
        <input type="text" name="nom_matiere" value="{{ $matiere->nom_matiere }}" required>

        <label for="classes">Classes associées :</label>
        <select name="classes[]" multiple>
            @foreach ($classes as $classe)
                <option value="{{ $classe->id_classe }}" {{ $matiere->classes->contains($classe->id_classe) ? 'selected' : '' }}>
                    {{ $classe->nom_classe }}
                </option>
            @endforeach
        </select>

        <label for="id_section">Section:</label>
        <select id="id_section" name="id_section" required>
            @foreach($sections as $section)
                <option value="{{ $section->id }}" {{ $matiere->classes->first()->section->id == $section->id ? 'selected' : '' }}>
                    {{ $section->nom_section }}
                </option>
            @endforeach
        </select>

        <button type="submit">Mettre à jour</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>