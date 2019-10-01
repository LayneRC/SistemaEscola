<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aluno;
use App\Http\Requests\AlunoValidationFormRequest;
use App\Http\Requests\EditAlunoValidationFormRequest;

class alunoController extends Controller
{
    public function index()
    {
        $totAluno = aluno::all()->count();
        return view('home', compact('totAluno'));
        
    }

    public function create()
    {
        return view('cadastroAluno');
    }

    public function store(AlunoValidationFormRequest $request)
    {
        $aluno = aluno::create($request->all());
        return view('listarAluno',  ['listAluno' => aluno::orderBy('nome')->get()]);

    }

    public function show($id)
    {
        $listAluno = aluno::orderBy('nome')->get();
        
        return view('listarAluno',  compact('listAluno'));
    }

    public function edit($cdaluno)
    {
        $aluno = aluno::findOrFail($cdaluno);
       
        return view('editAluno', ['aluno' => $aluno]);

    }

    public function update(EditAlunoValidationFormRequest $request, $cdaluno){
        $aluno = aluno::findOrFail($cdaluno);
        $aluno->update($request->all());
        return redirect()->route('aluno.show', $aluno->cdaluno);
    }

    public function searchAluno(Request $request)
    {
        $nmatricula = $request->input('nmatricula');
        $nome = $request->input('nome');
        
        $listAluno = aluno::where('nmatricula', 'LIKE', "%$nmatricula%")
                        ->Where('nome', 'LIKE', "%$nome%")->get();
        return view('listarAluno', compact('listAluno'));
       

        
    }
}
