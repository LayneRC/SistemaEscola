<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matricula;
use App\aluno;
use App\curso;
use App\semestre;
use App\turma;
use App\Http\Requests\MatriculaValidationFormRequest;


class matriculaController extends Controller
{

    public function index()
    {
        return view('listarMatricula');
    }

    
    public function create()
    {

        $data = [
            'aluno' => aluno::all(),
            'curso' => curso::all(),
            'semestre' => semestre::all(),
            'turma' => turma::all(),
            'matricula' => matricula::all()
        ];
        //$data['aluno'];

        return view('cadastroMatricula', compact ('data'));
    }

    public function store(MatriculaValidationFormRequest $request)
    {
        $matricula = matricula::create($request->all());
        return view('listarMatricula', ['listMatricula' => matricula::orderBy('cdmatricula')->get()]);

    }

    public function show($id)
    {
        $listMatricula = matricula::orderBy('cdmatricula')->get();
        return view('listarMatricula', compact('listMatricula'));
    }

    public function edit($cdmatricula)
    {
        $matricula = matricula::findOrFail($cdmatricula);
        $data = [
            'aluno' => aluno::all(),
            'curso' => curso::all(),
            'semestre' => semestre::all(),
            'turma' => turma::all()
        ];

        return view('editMatricula', compact ('data', 'matricula'));

        //return view('editMatricula', ['matricula' => $matricula], ['data']);

    }

    public function update(MatriculaValidationFormRequest $request, $cdmatricula){
        $matricula = matricula::findOrFail($cdmatricula);
        $matricula->update($request->all());
        return redirect()->route('matricula.show', $matricula->cdmatricula);
    }

    public function searchMatricula(Request $request, matricula $matricula)
    {
        $data = $request->all();

        $listMatricula = $matricula->where(function($query) use ($data, $matricula) {

                if (isset($data['nome'])){
                    $cdaluno = $matricula->get_cdaluno_by_name($data['nome']);
                    $query->whereIn('cdaluno', $cdaluno);
                }
            }
        )->get();  

        return view('listarMatricula', compact('listMatricula'));
        
    }
}
