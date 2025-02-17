<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executioner extends Model
{
    use HasFactory;

    /**
     * An Executioner is an Android, so only can be related to one.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function android(){
        return $this->belongsTo(Android::class);
    }


    /**
     * An Executioner can only have one weapon.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipment(){
        return $this->belongsTo(Armory::class);
    }

    /**
     * An Executioner can have many histories.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function create(array $executioner): Executioner
    {
        $newExecutioner = new self();
        $newExecutioner = $newExecutioner->fill($executioner);
        $newExecutioner->save();
        return $newExecutioner;
    }
}
