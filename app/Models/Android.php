<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Android extends Model
{
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
}
