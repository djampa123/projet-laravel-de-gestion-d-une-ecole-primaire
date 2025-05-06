<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VotreController extends Controller
{
    //public function create()
    public function teacher()
    {
        return view("teacher"); // Assurez-vous que la vue "employees.create" existe
    }
    public function contact()
    {
        return view("contact"); // Assurez-vous que la vue "employees.create" existe
    }
    public function matieres()
    {
        return view("matieres"); // Assurez-vous que la vue "employees.create" existe
    }
    
    

}
