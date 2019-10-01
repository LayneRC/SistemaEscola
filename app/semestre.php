<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semestre extends Model
{
    protected $primaryKey = 'cdsemestre';
    
    protected $fillable = [
        'ano'
    ];

    protected $guarded = [
        'cdsemestre', 'created_at', 'updated_at'
    ];

    protected $table = 'semestre';

    
}
