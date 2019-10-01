<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\semestre;
use App\Http\Requests\SemestreValidationFormRequest;


class semestreController extends Controller
{
    public function index()
    {
        return view('listarSemestre');
    }

    public function create()
    {
        return view('cadastroSemestre');
    }

    public function store(SemestreValidationFormRequest $request)
    {
        $semestre = semestre::create($request->all());
        return view('listarSemestre', ['listSemestre' => semestre::orderBy('ano')->get()]);

    }

    public function show($id)
    {
        $listSemestre = semestre::orderBy('ano')->get();
        return view('listarSemestre', compact('listSemestre'));
    }

    public function edit($cdsemestre)
    {
        $semestre = semestre::findOrFail($cdsemestre);
       
        return view('editSemestre', ['semestre' => $semestre]);

    }

    public function update(SemestreValidationFormRequest $request, $cdsemestre){
        $semestre = semestre::findOrFail($cdsemestre);
        $semestre->update($request->all());
        return redirect()->route('semestre.show', $semestre->cdsemestre);
    }

    public function searchSemestre(Request $request)
    {
        $ano = $request->input('ano');
        
        $listSemestre = semestre::where('ano', 'LIKE', "%$ano%")->get();
        return view('listarSemestre', compact('listSemestre'));
       

        
    }
}
