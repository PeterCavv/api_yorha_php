<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignedAndroids extends Model
{
    protected $table = 'assigned_androids';

    protected $fillable = ['operator_id', 'android_id'];

    public function operator(){
        return $this->belongsTo('App\Models\Operator');
    }

    public function android(){
        return $this->belongsTo('App\Models\Android');
    }
}
