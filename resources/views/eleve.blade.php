<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des élèves</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Styles personnalisés -->
    <style>
        body {
            background: url('{{ asset('images/b2.avif') }}') no-repeat center center fixed;
            margin: 0;
            padding: 0;
           
            background-size: 400% 400%;
            animation: gradientBG 12s ease infinite;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        @keyframes gradientBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            padding: 50px;
            width: 100%;
            max-width: 500px;
        }

        .header-title {
            font-size: 2rem;
            font-weight: bold;
            color: #212529;
        }

        .btn-lg {
            width: 100%;
            max-width: 300px;
            padding: 14px 24px;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .btn-lg:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .bi {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="glass-card text-center">
            <h1 class="header-title mb-5">📚 Gestion des Élèves</h1>

            <div class="d-flex flex-column align-items-center gap-4">
                <a href="{{ url('/students/create') }}" class="btn btn-success btn-lg">
                    <i class="bi bi-person-plus-fill me-2"></i>Créer un nouvel élève
                </a>
                <a href="{{ url('/students') }}" class="btn btn-primary btn-lg">
                    <i class="bi bi-people-fill me-2"></i>Liste des élèves
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
