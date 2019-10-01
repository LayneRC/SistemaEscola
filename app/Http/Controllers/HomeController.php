<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aluno;
use App\curso;
use App\professor;
use App\matricula;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totAluno = aluno::all()->count();
        $totProfessor = professor::all()->count();
        $totCurso = curso::all()->count();
        $totMat = matricula::all()->count();

        return view('home', compact('totAluno', 'totProfessor', 'totCurso', 'totMat'));
        
    }
}
