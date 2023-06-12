<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cases extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_id',
        'reg_num',
        'name',
        'department',
        'level',
        'caseDesc',
        'statement',
        'note',
        'status'
    ];

    // public function casefile() {
    //     return $this->belongsTo('App\Models\cases'.'reg_no'.'id');
    // }
}
