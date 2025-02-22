<?php

namespace App\Observers;

use App\Models\AssignedAndroids;
use Illuminate\Validation\ValidationException;

class AssignedAndroidObserver
{
    /**
     * Check if the relation can be made before the assigment is created.
     * @param AssignedAndroids $assignedAndroid
     * @return void
     */
    public function creating(AssignedAndroids $assignedAndroid){
        if($assignedAndroid->android->type->name === 'Operator'){
            throw ValidationException::withMessages([
                'name' => 'An Operator cannot be assigned to another Operator.'
            ]);
        }

        $checkAssign = AssignedAndroids::where(
            'android_id', '=', $assignedAndroid->android_id
        )->get();

        if($checkAssign->count() > 0){
            throw ValidationException::withMessages([
                'name' => 'This android already have an Operator assigned.'
            ]);
        }
    }
}
