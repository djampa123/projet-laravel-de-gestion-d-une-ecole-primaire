<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionSchool</title>

    <!-- CSS locaux via asset() -->
    <link href="{{ asset('ani/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('ani/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ani/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Conteneur principal centré -->
    <div class="container d-flex justify-content-center" style="margin-top: 20px;">
        <div class="card" style="width: 100%; max-width: 600px;">
            <div class="card-header bg-primary text-white" style="font-size: 18px; font-weight: bold;">
                Gestion Scolaire
            </div>
            <div class="card-body">

                <!-- Messages flash (succès/erreur) -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Contenu des pages -->
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('ani/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
