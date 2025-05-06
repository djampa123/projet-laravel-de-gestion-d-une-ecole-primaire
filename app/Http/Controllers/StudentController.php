<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classe;
use App\Models\Salle;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['classe', 'salle'])->get();
        return view('naomi/index', compact('students'));
    }

    public function create()
    {
        $classes = Classe::all();
        $salles = Salle::all();
        return view('naomi/create', compact('classes', 'salles'));
    }

    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'nom' => 'required|max:255',
                'prenom' => 'required|max:255',
                'date_naissance' => 'required|date',
                'lieu_naissance' => 'required|max:255',
                'section' => 'required|max:255',
                'nom_parent' => 'required|max:255',
                'tel_parent' => 'required|numeric',
                'id_salle' => 'required|integer|exists:salles,id_salle',
                'id_classe' => 'required|integer|exists:classes,id_classe',
                'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
                $validateData['image'] = $imageName;
            }

            Student::create($validateData);

            return redirect()->route('students.index')->with('success', 'L\'étudiant a été ajouté avec succès.');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function show($id_eleve)
    {
        $student = Student::findOrFail($id_eleve);
        return view('naomi/show', compact('student'));
    }

    public function edit($id_eleve)
    {
        $student = Student::findOrFail($id_eleve);
        $classes = Classe::all();
        $salles = Salle::all(); 
    
        return view('naomi/edit', compact('student', 'classes', 'salles'));
    }

    public function update(Request $request, $id_eleve)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required',
            'section' => 'required',
            'nom_parent' => 'required',
            'tel_parent' => 'required|numeric',
            'id_salle' => 'required|exists:salles,id_salle',
            'id_classe' => 'required|exists:classes,id_classe',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $student = Student::findOrFail($id_eleve);

        $data = $request->only([
            'nom', 'prenom', 'date_naissance', 'lieu_naissance',
            'section', 'nom_parent', 'tel_parent', 'id_salle', 'id_classe'
        ]);

        if ($request->hasFile('image')) {
            if ($student->image && File::exists(public_path('storage/images/' . $student->image))) {
                File::delete(public_path('storage/images/' . $student->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'L\'élève a été mis à jour avec succès.');
    }

    public function destroy($id_eleve)
    {
        $student = Student::findOrFail($id_eleve);

        if ($student->image && File::exists(public_path('storage/images/' . $student->image))) {
            File::delete(public_path('storage/images/' . $student->image));
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'L\'étudiant a été supprimé avec succès.');
    }
}
