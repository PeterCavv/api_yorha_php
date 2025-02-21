<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    public function android(){
        return $this->belongsTo(Android::class);
    }

    public function assignedAndroid(){
        return $this->hasMany(AssignedAndroids::class);
    }

    public function create(array $operator): Operator
    {
        $newOperator = new self();
        $newOperator = $newOperator->fill($operator);
        $newOperator->save();
        return $newOperator;
    }
}
