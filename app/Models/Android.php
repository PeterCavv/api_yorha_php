<?php

namespace App\Models;

use App\Http\Requests\Androids\StoreAndroidRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Android extends Model
{
    use softDeletes;

    protected $fillable = ['name', 'resume_name', 'type_id',
        'type_number', 'model_id', 'appearance_id', 'status_id',
        'description'];

    protected $hidden = ['created_at', 'updated_at', 'model_id',
        'type_id', 'status_id', 'appearance_id',
        'deleted_at'];

    /**
     * Androids can only have one model.
     * @return BelongsTo
     */
    public function model(): BelongsTo
    {
        return $this->belongsTo(Models::class);
    }

    /**
     * Androids can only have one type.
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Types::class);
    }

    /**
     * One Android can be the creator of many reports.
     * @return HasMany
     */
    public function report(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    /**
     * Androids can only have one appearance.
     * @return BelongsTo
     */
    public function appearance(): BelongsTo
    {
        return $this->belongsTo(Appearance::class);
    }

    public function executioner(){
        return $this->hasOne(Executioner::class);
    }

    public function operator(){
        return $this->hasOne(Operator::class);
    }

    public function assignedAndroid()
    {
        return $this->hasOne(AssignedAndroids::class);
    }

    /**
     * Androids can only have one state. The functionality of the Android depends
     * on the state.
     * @return BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * An Android can only be in one History.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function history()
    {
        return $this->hasOne(History::class);
    }

    public static function create(array $android): Android{
        $newAndroid = new self();
        $newAndroid = $newAndroid->fill($android);
        $newAndroid->save();
        return $newAndroid;
    }

    /**
     * Creates a name for the Android.
     * @param StoreAndroidRequest $request
     * @param Android $android
     * @return array
     */
    public static function createName(Android $android): array
    {
        $type = Types::where('id', '=', $android->type_id)->first();
        $typeName = $type->name;

        $charType = substr($typeName, 0, 1);

        $typeNumber = Android::where('type_id', '=', $type->id)->count() ?? 0;
        $typeNumber++;

        return [
            'name'        => "YoRHa No.{$typeNumber} Type {$charType}",
            'resume_name' => "{$typeNumber}{$charType}",
            'type_number' => $typeNumber
        ];
    }
}
