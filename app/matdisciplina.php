<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\matricula;
use App\disciplina;

class matdisciplina extends Model
{
    protected $primaryKey = 'cdmatdisciplina';
    
    protected $fillable = [
        'cdmatricula', 'cddisciplina', 'valor'
    ];

    protected $guarded = [
        'cdmatdisciplina', 'created_at', 'updated_at'
    ];

    protected $table = 'matdisciplina';

    public function matricula($cdmatricula)
    {
        return matricula::find($cdmatricula);
    }

    public function disciplina($cddisciplina)
    {
        return disciplina::find($cddisciplina);
    }

    public function get_cddisciplina_by_name ($nomedisciplina)
    {
        $cddisciplina = [];
        $disciplina = disciplina::where('nomedisciplina', 'LIKE', "%$nomedisciplina%")->get();
        foreach ($disciplina as $value){
            $cddisciplina[] = $value->cddisciplina;
        }

        return $cddisciplina;
    }
    

    

}
