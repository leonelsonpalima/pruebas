<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    
    protected $fillable = [
        'PER_CED', 'PER_CLA', 'PER_HIS',
    ];
}
