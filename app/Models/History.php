<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    /**
     * A History can only have one Android.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function android()
    {
        return $this->belongsTo(Android::class);
    }


    public function executioner()
    {
        return $this->belongsToMany(Executioner::class);
    }

    public static function create(array $history): History{
        $newHistory = new self();
        $newHistory = $newHistory->fill($history);
        $newHistory->save();
        return $newHistory;
    }
}
