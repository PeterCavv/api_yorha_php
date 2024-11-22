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

    public function androidOperator()
    {
        return $this->belongsTo(AndroidOperator::class);
    }
}
