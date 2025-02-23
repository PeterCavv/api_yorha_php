<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Operators\OperatorCollection;
use App\Http\Resources\Operators\OperatorResource;
use App\Models\Operator;

class OperatorController extends Controller
{
    /**
     * Get all the Operators.
     * @return OperatorCollection
     */
    public function index()
    {
        $operators = Operator::paginate(10);

        return new OperatorCollection($operators);
    }

    /**
     * Get an Android searched by its ID.
     * @param $id
     * @return OperatorResource
     */
    public function show($id){
        return new OperatorResource(Operator::findOrFail($id));
    }
}
