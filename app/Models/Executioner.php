<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Executioner extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['android_id', 'equipment_id'];

    protected $hidden = ['created_at', 'updated_at', 'android_id', 'equipment_id', 'deleted_at'];

    /**
     * An Executioner is an Android, so only can be related to one.
     * @return BelongsTo
     */
    public function android(){
        return $this->belongsTo(Android::class);
    }


    /**
     * An Executioner can only have one weapon.
     * @return BelongsTo
     */
    public function equipment(){
        return $this->belongsTo(Armory::class);
    }

    /**
     * An Executioner can have many histories.
     * @return BelongsToMany
     */
    public function history()
    {
        return $this->belongsToMany(
            History::class,
            'executioner_history',
            'executioner_id',
            'history_id'
        );
    }

    public static function create(array $executioner): Executioner
    {
        $newExecutioner = new self();
        $newExecutioner = $newExecutioner->fill($executioner);
        $newExecutioner->save();
        return $newExecutioner;
    }
}
