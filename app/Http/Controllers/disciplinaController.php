<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\disciplina;
use App\professor;
use App\Http\Requests\DisciplinaValidationFormRequest;


class disciplinaController extends Controller
{
    public function index()
    {
        return view('listarDisciplina');
    }

    public function create()
    {
        $disciplinas_prof = professor::all();
        return view('cadastroDisciplina', compact ('disciplinas_prof'));
    }

    public function store(DisciplinaValidationFormRequest $request)
    {
        $disciplina = disciplina::create($request->all());
        return view('listarDisciplina', ['listDisciplina' => disciplina::orderBy('nomedisciplina')->get()]);

    }

    public function show($id)
    {
        $listDisciplina = disciplina::orderBy('nomedisciplina')->get();
        return view('listarDisciplina', compact('listDisciplina'));
    }

    public function edit($cddisciplina)
    {
        $disciplina = disciplina::findOrFail($cddisciplina);
        $disciplinas_prof = professor::all();
        return view('editDisciplina', ['disciplina' => $disciplina], ['disciplinas_prof' => $disciplinas_prof]);

    }

    public function update(DisciplinaValidationFormRequest $request, $cddisciplina){
        $disciplina = disciplina::findOrFail($cddisciplina);
        $disciplina->update($request->all());
        return redirect()->route('disciplina.show', $disciplina->cddisciplina);
    }

    public function searchDisciplina(Request $request, disciplina $disciplina)
    {
        $nomedisciplina = $request->input('nomedisciplina');
        $data = $request->all();

        $listDisciplina = $disciplina->where(function($query) use ($data, $disciplina) {
                if (isset($data['nomedisciplina']))
                    $query->where('nomedisciplina', 'LIKE', '%' . $data['nomedisciplina'] . '%');

                if (isset($data['nome'])){
                    $cdprofessor = $disciplina->get_cdprofessor_by_name($data['nome']);
                    $query->whereIn('cdprofessor', $cdprofessor);
                }
            }
        )->get();  

       //$listDisciplina = disciplina::where('nomedisciplina', 'LIKE', "%$nomedisciplina%")->get();

        return view('listarDisciplina', compact('listDisciplina'));
        
    }
}
