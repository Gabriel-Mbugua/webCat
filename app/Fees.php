<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $table = 'fees';

    public function Student(){
        return $this->belongsTo('App\Student', 'student_id');

    }
}
