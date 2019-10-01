<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $primaryKey = 'cdcurso';
    
    protected $fillable = [
        'nomecurso', 'valorcurso'
    ];

    protected $guarded = [
        'cdcurso', 'created_at', 'updated_at'
    ];

    protected $table = 'curso';

    public function setNomecursoAttribute($value)
    {
        $this->attributes['nomecurso'] = mb_strtoupper($value);
    }
}
