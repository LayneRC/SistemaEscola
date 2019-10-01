<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\aluno;
use App\curso;
use App\semestre;
use App\turma;

class matricula extends Model
{
    protected $primaryKey = 'cdmatricula';
    
    protected $fillable = [
        'cdcurso', 'cdaluno', 'cdsemestre', 'valor', 'cdturma'
    ];

    protected $guarded = [
        'cdmatricula', 'created_at', 'updated_at'
    ];

    protected $table = 'matricula';

    public function aluno($cdaluno)
    {
        return aluno::find($cdaluno);
    }

    public function curso($cdcurso)
    {
        return curso::find($cdcurso);
    }

    public function semestre($cdsemestre)
    {
        return semestre::find($cdsemestre);
    }

    public function turma($cdturma)
    {
        return turma::find($cdturma);
    }

    public function get_cdaluno_by_name ($nome)
    {
        $cdaluno = [];
        $aluno = aluno::where('nome', 'LIKE', "%$nome%")->get();
        foreach ($aluno as $value){
            $cdaluno[] = $value->cdaluno;
        }

        return $cdaluno;
    }



}
