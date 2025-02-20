<?php

namespace App\Observers;

use App\Models\Android;
use App\Models\Armory;
use App\Models\Executioner;
use App\Models\Models;
use App\Models\Operator;
use App\Models\Status;
use App\Models\Types;
use Illuminate\Validation\ValidationException;

class AndroidObserver
{
    public function creating(Android $android): void
    {
        $model = Models::where('id', $android->model_id)->first();
        $type = Types::where('id', $android->type_id)->first();

        if($model->name === 'Special' && blank($android->name)){
            throw ValidationException::withMessages([
                'name' => 'An Special Android model must have a name.'
            ]);
        }

        if(blank($android->name)){
            $createdName = Android::createName($android);
            $android->fill($createdName);
        }

        if($model->name === 'Special' && $type->name != 'NoType'){
            throw ValidationException::withMessages([
                'name' => 'An Special Android model must be assigned with NoType type.'
            ]);
        }

    }

    /**
     * Check, when an Android is created, if the type selected is Operator.
     * @param Android $android
     * @return void
     */
    public function created(Android $android)
    {
        $typeOperator = Types::where('name', '=', 'Operator')->first();
        $typeExecutioner = Types::where('name', '=', 'Executioner')->first();

        if($android->type_id == optional($typeOperator)->id ){
            Operator::create([
                'android_id' => $android->id,
            ]);
        } else if($android->type_id == optional($typeExecutioner)->id ){
            $weapon = Armory::where('name', '=', 'YoRHa-issue Blade')->first();

            Executioner::create([
                'android_id' => $android->id,
                'equipment_id' => $weapon->id
            ]);
        }
    }

    public function deleting(Android $android): void
    {
        $status = Status::where('name', '=', 'Out Of Service')->first();

        $android->status_id = $status->id;
        $android->save();
    }
}
