<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aluno extends Model
{

    protected $primaryKey = 'cdaluno';
    
    protected $fillable = [
        'nmatricula', 'nome', 'status'
    ];

    protected $guarded = [
        'cdaluno', 'created_at', 'updated_at'
    ];

    protected $table = 'aluno';

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = mb_strtoupper($value);
    }
    
}
