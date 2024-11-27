<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Android extends Model
{
    protected $fillable = ['name', 'short_name', 'type','number_type', 'model', 'appearance',
        'status', 'desc', 'assigned_operator'];
    public function model()
    {
        return $this->belongsTo(Models::class);
    }

    public function type()
    {
        return $this->belongsTo(Types::class);
    }

    public function appearance()
    {
        return $this->belongsTo(Appearance::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function androidOperator()
    {
        return $this->belongsTo(Android::class, 'assigned_operator');
    }

    public function androidsAssigned()
    {
        return $this->hasMany(Android::class, 'assigned_operator');
    }

    public static function create(array $android): Android{
        $newAndroid = new self();
        $newAndroid->name = $android['name'];
        $newAndroid->model = $android['model'];
        $newAndroid->type = $android['type'];
        $newAndroid->type_number = $android['type_number'];
        $newAndroid->appearance = $android['appearance'];
        $newAndroid->status = $android['status'];
        $newAndroid->desc = $android['desc'];
        $newAndroid->save();
        return $newAndroid;
    }
}
