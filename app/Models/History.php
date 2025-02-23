<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;

    protected $fillable = ['android_id', 'summary'];

    /**
     * A History can only have one Android.
     * @return BelongsTo
     */
    public function android()
    {
        return $this->belongsTo(Android::class)->withTrashed();
    }


    public function executioner()
    {
        return $this->belongsToMany(
            Executioner::class,
            'executioner_history',
            'history_id',
            'executioner_id'
        )->withTrashed();
    }

    public static function create(array $history): History{
        $newHistory = new self();
        $newHistory = $newHistory->fill($history);
        $newHistory->save();
        return $newHistory;
    }
}
