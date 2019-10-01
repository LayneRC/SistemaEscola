<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\turma;
use App\Http\Requests\TurmaValidationFormRequest;


class turmaController extends Controller
{
    public function index()
    {
        return view('listarTurma');
    }

    public function create()
    {
        return view('cadastroTurma');
    }

    public function store(TurmaValidationFormRequest $request)
    {
        $turma = turma::create($request->all());
        return view('listarTurma', ['listTurma' => turma::orderBy('nometurma')->get()]);

    }

    public function show($id)
    {
        $listTurma = turma::orderBy('nometurma')->get();
        return view('listarTurma', compact('listTurma'));
    }

    public function edit($cdturma)
    {
        $turma = turma::findOrFail($cdturma);
       
        return view('editTurma', ['turma' => $turma]);

    }

    public function update(TurmaValidationFormRequest $request, $cdturma){
        $turma = turma::findOrFail($cdturma);
        $turma->update($request->all());
        return redirect()->route('turma.show', $turma->cdturma);
    }

    public function searchTurma(Request $request)
    {
        $nometurma = $request->input('nometurma');
        
        $listTurma = turma::where('nometurma', 'LIKE', "%$nometurma%")->get();
        return view('listarTurma', compact('listTurma'));
       

        
    }
}
