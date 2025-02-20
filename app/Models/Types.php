<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * @return HasMany
     */
    public function android(): HasMany
    {
        return $this->hasMany(Android::class);
    }
}
