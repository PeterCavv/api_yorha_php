<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Android extends Model
{
    protected $fillable = ['name', 'short_name', 'type','number_type', 'model_id', 'appearance_id',
        'state_id', 'description_id', 'assigned_operator'];
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

    public static function create(array $android): Android{
        $newAndroid = new self();
        $newAndroid->name = $android['name'];
        $newAndroid->model = $android['model_id'];
        $newAndroid->type = $android['type_id'];
        $newAndroid->type_number = $android['type_number'];
        $newAndroid->appearance = $android['appearance_id'];
        $newAndroid->status = $android['state_id'];
        $newAndroid->desc = $android['description'];
        $newAndroid->save();
        return $newAndroid;
    }
}
