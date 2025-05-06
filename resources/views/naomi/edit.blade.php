@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0 text-center">
                        ✏️ Modifier l’étudiant : <strong>{{ $student->nom }} {{ $student->prenom }}</strong>
                    </h4>
                </div>

                <div class="card-body bg-light">
                    <!-- Affichage des erreurs de validation -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.update', $student->id_eleve) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom', $student->nom) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom', $student->prenom) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date_naissance" class="form-label">Date de naissance</label>
                                <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{ old('date_naissance', $student->date_naissance) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lieu_naissance" class="form-label">Lieu de naissance</label>
                                <input type="text" id="lieu_naissance" name="lieu_naissance" class="form-control" value="{{ old('lieu_naissance', $student->lieu_naissance) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="section" class="form-label">Section</label>
                                <input type="text" id="section" name="section" class="form-control" value="{{ old('section', $student->section) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="nom_parent" class="form-label">Nom du parent</label>
                                <input type="text" id="nom_parent" name="nom_parent" class="form-control" value="{{ old('nom_parent', $student->nom_parent) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tel_parent" class="form-label">Téléphone du parent</label>
                                <input type="text" id="tel_parent" name="tel_parent" class="form-control" value="{{ old('tel_parent', $student->tel_parent) }}">
                            </div>

                            <!-- Image actuelle -->
                            @if($student->image)
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Image actuelle</label><br>
                                    <img src="{{ asset('storage/images/' . $student->image) }}" alt="Image de l'élève" class="img-thumbnail rounded-3 shadow-sm" width="150">
                                </div>
                            @endif

                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Nouvelle image</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="id_classe" class="form-label">Classe</label>
                                <select id="id_classe" name="id_classe" class="form-select">
                                    @foreach($classes as $classe)
                                        <option value="{{ $classe->id_classe }}" {{ $classe->id_classe == $student->id_classe ? 'selected' : '' }}>
                                            {{ $classe->nom_classe }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="id_salle" class="form-label">Salle</label>
                                <select id="id_salle" name="id_salle" class="form-select">
                                    @foreach($salles as $salle)
                                        <option value="{{ $salle->id_salle }}" {{ $salle->id_salle == $student->id_salle ? 'selected' : '' }}>
                                            {{ $salle->nom_salle }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success btn-lg me-2">
                                💾 Mettre à jour
                            </button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary btn-lg">
                                ⬅️ Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
