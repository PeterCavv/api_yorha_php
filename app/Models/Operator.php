<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operator extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['android_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function android(){
        return $this->belongsTo(Android::class);
    }

    public function assignedAndroid(){
        return $this->hasMany(AssignedAndroids::class);
    }

    public static function create(array $operator): Operator
    {
        $newOperator = new self();
        $newOperator = $newOperator->fill($operator);
        $newOperator->save();
        return $newOperator;
    }
}
