<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Android extends Model
{
    protected $fillable = ['name', 'short_name', 'type','number_type', 'model_id', 'appearance_id',
        'state_id', 'description_id'];

    /**
     * Androids can only have one model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function model()
    {
        return $this->belongsTo(Models::class);
    }

    /**
     * Androids can only have one type.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Types::class);
    }

    /**
     * One Android can be the creator of many reports.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function report()
    {
        return $this->hasMany(Report::class);
    }

    /**
     * Androids can only have one appearance.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appearance()
    {
        return $this->belongsTo(Appearance::class);
    }

    /**
     * Androids can only have one state. The functionality of the Android depends
     * on the state.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(Status::class);
    }

    public static function create(array $android): Android{
        $newAndroid = new self();
        $newAndroid = $newAndroid->fill($android);
        $newAndroid->save();
        return $newAndroid;
    }
}
