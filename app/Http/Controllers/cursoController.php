<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\curso;
use App\Http\Requests\CursoValidationFormRequest;


class cursoController extends Controller
{
    public function index()
    {
        return view('listarCurso');
    }

    public function create()
    {
        return view('cadastroCurso');
    }

    public function store(CursoValidationFormRequest $request)
    {
        $curso = curso::create($request->all());
        return view('listarCurso', ['listCurso' => curso::orderBy('nomecurso')->get()]);

    }

    public function show($id)
    {
        $listCurso = curso::orderBy('nomecurso')->get();
        return view('listarCurso', compact('listCurso'));
    }

    public function edit($cdcurso)
    {
        $curso = curso::findOrFail($cdcurso);
       
        return view('editCurso', ['curso' => $curso]);

    }

    public function update(CursoValidationFormRequest $request, $cdcurso){
        $curso = curso::findOrFail($cdcurso);
        $curso->update($request->all());
        return redirect()->route('curso.show', $curso->cdcurso);
    }

    public function searchCurso(Request $request)
    {
        $nomecurso = $request->input('nomecurso');
        
        $listCurso = curso::where('nomecurso', 'LIKE', "%$nomecurso%")->get();
        return view('listarCurso', compact('listCurso'));
       

        
    }
}
