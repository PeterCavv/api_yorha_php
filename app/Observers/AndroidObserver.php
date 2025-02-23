<?php

namespace App\Observers;

use App\Models\Android;
use App\Models\Armory;
use App\Models\AssignedAndroids;
use App\Models\Executioner;
use App\Models\Models;
use App\Models\Operator;
use App\Models\Status;
use App\Models\Types;
use Illuminate\Validation\ValidationException;

class AndroidObserver
{
    /**
     * Check if everything is okay before the android is created.
     * @param Android $android
     * @return void
     */
    public function creating(Android $android): void
    {
        $model = Models::findOrFail($android->model_id);
        $type = Types::findOrFail($android->type_id);

        if($model->name === 'Special' && blank($android->name)){
            throw ValidationException::withMessages([
                'name' => 'An Special Android model must have a name.'
            ]);
        }

        if($model->name !== 'Special' && !blank($android->name)){
            throw ValidationException::withMessages([
                'name' => 'You cannot create a YoRHa model with a name. The name will
                    be created based on its data.'
            ]);
        }

        if($model->name === 'Special' && $type->name != 'NoType'){
            throw ValidationException::withMessages([
                'name' => 'An Special Android model must be assigned with NoType type.'
            ]);
        }

        if($type->name === 'NoType' && (blank($android->name) || $model->name !== 'Special')){
            throw ValidationException::withMessages([
                'name' => 'Several validations are violated in this petition.'
            ]);
        }

        if(blank($android->name)){
            $createdName = Android::createName($android);
            $android->fill($createdName);
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

    /**
     * Check if the android can be deleted. Change the status of the android before
     * the android is deleted.
     * @param Android $android
     * @return void
     */
    public function deleting(Android $android): void
    {
        $operator = Operator::withTrashed()->where('android_id', $android->id)->first();
        $assignedAndroid = AssignedAndroids::where('android_id', $android->id)->first();

        if($operator){
            $operator->assignedAndroid()->each(function($assignedAndroid){
                $assignedAndroid->delete();
            });

        } else $assignedAndroid?->delete();

        $status = Status::where('name', '=', 'Out Of Service')->first();

        $android->status_id = $status->id;
        $android->save();

    }

}
