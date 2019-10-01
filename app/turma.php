<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class turma extends Model
{
    protected $primaryKey = 'cdturma';
    
    protected $fillable = [
        'nometurma'
    ];

    protected $guarded = [
        'cdturma', 'created_at', 'updated_at'
    ];

    protected $table = 'turma';

    public function setNometurmaAttribute($value)
    {
        $this->attributes['nometurma'] = mb_strtoupper($value);
    }
}
