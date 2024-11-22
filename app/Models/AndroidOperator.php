<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AndroidOperator extends Model
{
    protected $fillable = ['name', 'androids'];

    protected function androids(){
        return $this->hasMany(Android::class);
    }

}
