<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\professor;
use App\Http\Requests\ProfessorValidationFormRequest;


class professorController extends Controller
{
    public function index()
    {
        return view('listarProfessor');
    }

    public function create()
    {
        return view('cadastroProfessor');
    }

    public function store(ProfessorValidationFormRequest $request)
    {
        $professor = professor::create($request->all());
        return view('listarProfessor', ['listProfessor' => professor::orderBy('nome')->get()]);

    }

    public function show($id)
    {
        $listProfessor = professor::orderBy('nome')->get();
        return view('listarProfessor', compact('listProfessor'));
    }

    public function edit($cdprofessor)
    {
        $professor = professor::findOrFail($cdprofessor);
       
        return view('editProfessor', ['professor' => $professor]);

    }

    public function update(ProfessorValidationFormRequest $request, $cdprofessor){
        $professor = professor::findOrFail($cdprofessor);
        $professor->update($request->all());
        return redirect()->route('professor.show', $professor->cdprofessor);
    }

    public function searchProfessor(Request $request)
    {
        $nome = $request->input('nome');
        
        $listProfessor = professor::where('nome', 'LIKE', "%$nome%")->get();
        return view('listarProfessor', compact('listProfessor'));
       

        
    }
}
