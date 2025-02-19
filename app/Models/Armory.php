<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armory extends Model
{
    use HasFactory;

    protected $table = 'armory';

    protected $fillable = ['name', 'weapon_type_id', 'description'];

    public function weaponType(){
        return $this->belongsTo(WeaponType::class);
    }

    public function executioner(){
        return $this->hasMany(Executioner::class , 'equipment_id');
    }
}
