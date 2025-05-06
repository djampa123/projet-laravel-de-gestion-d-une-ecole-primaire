<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\VotreController;
use App\Http\Controllers\ObtenirController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EntretienController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AvertissementController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PaiementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

/*  pour definir la methode a utilise genre get est pour envoyer un lien et post est pour inserer dans la bd*/ 

Route::get('/matieres', function () {
    return view('matieres');
});


Route::get('create', [MatiereController::class, 'create'])->name('matieres.create');
Route::post('create', [MatiereController::class, 'store'])->name('matieres.store');


Route::get('/list', [MatiereController::class, 'index'])->name('matieres.index');



Route::get('modify/{matiere}/edit', [MatiereController::class, 'edit'])->name('matieres.edit');
Route::put('/list/{matiere}', [MatiereController::class, 'update'])->name('matiere.update');
Route::delete('/list/{matiere}', [MatiereController::class, 'destroy'])->name('matieres.destroy');
// Route pour afficher le formulaire d'ajout de notes
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');

// Route pour enregistrer les notes

Route::get('/obtenir', [ObtenirController::class, 'index'])->name('obtenir.index');
Route::get('/obtenir/create', [ObtenirController::class, 'create'])->name('obtenir.create');
Route::post('/obtenir', [ObtenirController::class, 'store'])->name('obtenir.store');
Route::get('/obtenir/{id_matiere}/{id_trimestre}/{id_eleve}/{id_classe}/edit', [ObtenirController::class, 'edit'])->name('obtenir.edit');
Route::put('/obtenir/{id_matiere}/{id_trimestre}/{id_eleve}/{id_classe}', [ObtenirController::class, 'update'])->name('obtenir.update');
Route::delete('/obtenir/{id_matiere}/{id_trimestre}/{id_eleve}/{id_classe}', [ObtenirController::class, 'destroy'])->name('obtenir.destroy');
Route::get('/notes/classe/{classe}', [App\Http\Controllers\ObtenirController::class, 'afficherParClasse'])->name('obtenir.parClasse');


Route::get('/bulletin/{eleve}', [ObtenirController::class, 'afficherBulletin'])->name('obtenir.bulletin');
Route::get('/personnel', function () {
    return view('personnel.index');
})->name('personnel.index');
Route::get('/eleve', function () {
    return view('eleve');
});

// Routes REST
Route::resource('enseignants', EnseignantController::class)->only(['index', 'create', 'store','edit','destroy','update']);

Route::resource('administrations', AdministrationController::class)->only(['index', 'create', 'store','edit','destroy','update']);
Route::resource('entretien', EntretienController::class)->only(['index', 'create', 'store','edit','destroy','update']); // à créer plus tard*/ 


// Route vers la page pour gérer le personnel

Route::get('/home', function () {
    return view('home'); // Page d'accueil
})->middleware(['auth', 'verified'])->name('home'); // Ajout de cette route

Route::resource('students', StudentController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('avertissements', AvertissementController::class)->only([
    'index', 'create', 'store','edit','destroy','update'
]);
Route::prefix('paiements')->group(function () {
    Route::get('/', [PaiementController::class, 'index'])->name('paiements.index');
    Route::get('/create', [PaiementController::class, 'create'])->name('paiements.create');
    Route::post('/', [PaiementController::class, 'store'])->name('paiements.store');
    Route::get('/{id}/edit', [PaiementController::class, 'edit'])->name('paiements.edit');
    Route::put('/{id}', [PaiementController::class, 'update'])->name('paiements.update');
    Route::delete('/{id}', [PaiementController::class, 'destroy'])->name('paiements.destroy');
});
Route::get('/blames', function () {
    return view('avertissements/index');
});
Route::get('/paie', function () {
    return view('paiements/index');
});

