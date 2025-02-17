<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executioner extends Model
{
    use HasFactory;

    public function android(){
        return $this->belongsTo(Android::class);
    }

    public function equipment(){
        return $this->belongsTo(Armory::class);
    }

    public function create(array $executioner): Executioner
    {
        $newExecutioner = new self();
        $newExecutioner = $newExecutioner->fill($executioner);
        $newExecutioner->save();
        return $newExecutioner;
    }
}
