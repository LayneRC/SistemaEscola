<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    protected $primaryKey = 'cdprofessor';
    
    protected $fillable = [
        'nome'
    ];

    protected $guarded = [
        'cdprofessor', 'created_at', 'updated_at'
    ];

    protected $table = 'professor';

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = mb_strtoupper($value);
    }
}
