<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bulletin Scolaire de {{ $nomEleve }} {{ $prenomEleve }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 11pt;
            line-height: 1.5;
            color: #333;
            background: #f4f4f4;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .bulletin-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            padding: 40px;
            border: 2px solid #4CAF50; /* Belle bordure verte */
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #4CAF50; /* Titre vert */
        }

        .logo {
            max-width: 100px; /* Ajustez la taille du logo */
            margin-bottom: 15px;
        }

        .student-info {
            margin-bottom: 25px;
            padding: 15px;
            background: #e6ffe9; /* Fond vert clair */
            border-radius: 8px;
            border: 1px solid #c3e6cb;
        }

        .info-line {
            margin-bottom: 8px;
            color: #2e7d32; /* Texte vert foncé */
        }

        .info-line strong {
            font-weight: bold;
            color: #1b5e20; /* Texte encore plus foncé pour l'étiquette */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background: #f9f9f9;
            border-radius: 8px;
            overflow: hidden; /* Pour que la bordure du tableau respecte le radius */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50; /* Entête de tableau verte */
            color: white;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .average {
            font-weight: bold;
            margin-top: 20px;
            padding: 15px;
            background: #dcedc8; /* Fond vert très clair */
            border-radius: 8px;
            text-align: right;
            color: #388e3c; /* Texte vert moyen */
            border: 1px solid #a5d6a7;
        }

        .mention-container {
            margin-top: 20px;
            padding: 15px;
            background: #f0f8ff; /* Bleu très clair */
            border-radius: 8px;
            text-align: center;
            font-size: 1.2em;
            font-weight: bold;
            border: 1px solid #90caf9; /* Bleu clair */
        }

        .mention-text-admis {
            color: #4CAF50; /* Vert pour Passable, Assez Bien, Bien, Très Bien */
        }

        .mention-text-echec {
            color: #f44336; /* Rouge pour Échec */
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 4em;
            color: #e0f2f7; /* Bleu très clair */
            opacity: 0.3;
            font-weight: bold;
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="bulletin-container">
        <div class="watermark">BULLETIN</div>
        <div class="header">
            <img src="1.jpeg" alt="ECOLE DE EXELLENCE" class="logo">
            <h2>Bulletin Scolaire</h2>
        </div>

        <div class="student-info">
            <div class="info-line"><strong>Nom:</strong> {{ $nomEleve }} {{ $prenomEleve }}</div>
            <div class="info-line"><strong>Date de Naissance:</strong> {{ $dateNaissance }}</div>
            <div class="info-line"><strong>Lieu de Naissance:</strong> {{ $lieuNaissance }}</div>
            @if($classe)
                <div class="info-line"><strong>Classe:</strong> {{ $classe->nom_classe ?? 'N/A' }}</div>
            @endif
            @if($salleActuelle)
                <div class="info-line"><strong>Salle:</strong> {{ $salleActuelle->nom_salle ?? 'N/A' }}</div>
            @endif
            <div class="info-line"><strong>Nom du Parent:</strong> {{ $nomParent }}</div>
            <div class="info-line"><strong>Téléphone du Parent:</strong> {{ $telephoneParent }}</div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Matière</th>
                    <th style="text-align: center;">Note</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notes->groupBy('matiere.nom_matiere') as $matiere => $notesMatiere)
                    <tr>
                        <td>{{ $matiere }}</td>
                        <td style="text-align: center;">
                            @foreach($notesMatiere as $note)
                                <span style="font-weight: bold; color: #1976d2;">{{ number_format($note->note, 2) }}</span>
                                @if (!$loop->last), @endif
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="2" style="text-align: center; color: red;">Aucune note trouvée pour cet élève.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="average"><strong>Moyenne Générale:</strong> <span style="color: #d84315;">{{ number_format($moyenneGenerale, 2) }}</span></div>

        @isset($mention)
        <div class="mention-container">
            Mention: <span class="mention-text-{{ $mention === 'Échec' ? 'echec' : 'admis' }}">{{ $mention }}</span>
        </div>
        @endisset
    </div>
</body>
</html>