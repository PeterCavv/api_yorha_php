<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'resume', 'desc'];


    public static function create(array $type): Types{
        $newType = new self();
        $newType->name = $type['name'];
        $newType->resume = $type['resume'];
        $newType->desc = $type['desc'];
        $newType->save();
        return $newType;
    }
}
