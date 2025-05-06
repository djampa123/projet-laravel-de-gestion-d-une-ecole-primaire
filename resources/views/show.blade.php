@extends('layout')
@section('content')
<h3>Détails de l'Élève</h3>

<table style="border: 0px;">
    <tr>
        <td>
            <p>
                <b class="lbl">Nom: </b> {{$student->nom}}
            </p>
            <p>
                <b class="lbl">Prénom: </b> {{$student->prenom}}
            </p>
            <p>
                <b class="lbl">Date de naissance: </b> {{$student->date_naissance}} <!-- Correction ici -->
            </p>
            <p>
                <b class="lbl">Lieu de naissance: </b> {{$student->lieu_naissance}} <!-- Ajout ici -->
            </p>
          
            <p>
                <b class="lbl">Section: </b> {{$student->section}} <!-- Ajout ici -->
            </p>
            <p>
                <b class="lbl">Nom du parent: </b> {{$student->nom_parent}} <!-- Ajout ici -->
            </p>
            <p>
                <b class="lbl">N°Tel Parent: </b> {{$student->tel_parent}} <!-- Ajout ici -->
            </p>
        </td>

        <td style="padding-left: 150px;"> <!-- Correction ici -->
            <img src="/images/{{$student->image}}" width="500" height="200"> <!-- Image affichée ici si souhaité -->
        </td>
    </tr>
</table>

<a href="{{ route('students.index') }}" class="btn btn-primary">Retour à la liste</a> <!-- Lien pour revenir -->
@endsection