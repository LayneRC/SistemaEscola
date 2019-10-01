<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\professor;

class disciplina extends Model
{
    protected $primaryKey = 'cddisciplina';
    
    protected $fillable = [
        'nomedisciplina', 'cdprofessor', 'valor'
    ];

    protected $guarded = [
        'cddisciplina', 'created_at', 'updated_at'
    ];

    protected $table = 'disciplina';

    public function setNomedisciplinaAttribute($value)
    {
        $this->attributes['nomedisciplina'] = mb_strtoupper($value);
    }

    public function professor($cdprofessor)
    {
        //return $this->hasOne('App\Professor', 'cdprofessor');
        return professor::find($cdprofessor);
    }

    public function get_cdprofessor_by_name ($nome)
    {
        $cdprofessor = [];
        $professor = professor::where('nome', 'LIKE', "%$nome%")->get();
        foreach ($professor as $value){
            $cdprofessor[] = $value->cdprofessor;
        }

        return $cdprofessor;
    }
}
