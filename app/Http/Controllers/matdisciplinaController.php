<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matdisciplina;
use App\matricula;
use App\disciplina;
use App\Http\Requests\MatdisciplinaValidationFormRequest;

class matdisciplinaController extends Controller
{
    public function create()
    {

        $data = [
            'matricula' => matricula::all(),
            'disciplina' => disciplina::all(),
            'matdisciplina' => matdisciplina::all()
        ];
        //$data['aluno'];

        return view('cadastroMatdisciplina', compact ('data'));
    }

    public function store(MatdisciplinaValidationFormRequest $request)
    {
        $matdisciplina = matdisciplina::create($request->all());
        return view('listarMatdisciplina', ['listMatdisciplina' => matdisciplina::orderBy('cdmatdisciplina')->get()]);

    }

    public function show($id)
    {
        $listMatdisciplina = matdisciplina::groupBy('cdmatdisciplina')->get();
        //dd($listMatdisciplina->toArray());
        return view('listarMatdisciplina', compact('listMatdisciplina'));
    }

    public function edit($cdmatdisciplina)
    {
        $matdisciplina = matdisciplina::findOrFail($cdmatdisciplina);
        $data = [
            'matricula' => matricula::all(),
            'disciplina' => disciplina::all(),
            'matdisciplina' => matdisciplina::all()
        ];

        return view('editMatdisciplina', compact ('data', 'matdisciplina'));

        //return view('editMatricula', ['matricula' => $matricula], ['data']);

    }

    public function update(MatdisciplinaValidationFormRequest $request, $cdmatdisciplina){
        $matdisciplina = matdisciplina::findOrFail($cdmatdisciplina);
        $matdisciplina->update($request->all());
        return redirect()->route('matdisciplina.show', $matdisciplina->cdmatdisciplina);
    }

    public function searchMatdisciplina(Request $request, matdisciplina $matdisciplina)
    {
        $data = $request->all();

        $listMatdisciplina = $matdisciplina->where(function($query) use ($data, $matdisciplina) {

                if (isset($data['nomedisciplina'])){
                    $cddisciplina = $matdisciplina->get_cddisciplina_by_name($data['nomedisciplina']);
                    $query->whereIn('cddisciplina', $cddisciplina);
                }

                if (isset($data['cdmatricula']))
                    $query->where('cdmatricula', 'LIKE', '%' . $data['cdmatricula'] . '%');
            }
        )->get();  

        return view('listarMatdisciplina', compact('listMatdisciplina'));
        
    }
}
