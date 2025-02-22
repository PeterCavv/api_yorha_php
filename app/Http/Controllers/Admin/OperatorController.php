<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Operator;
use Illuminate\Http\JsonResponse;

class OperatorController extends Controller
{
    /**
     * Get all the Operators.
     * @return JsonResponse
     */
    public function index()
    {
        $operators = Operator::with([
            'android:id,name'
        ])->paginate(10);

        return response()->json($operators, 200);
    }

    /**
     * Get an Android searched by its ID.
     * @param $id
     * @return JsonResponse
     */
    public function show($id){
        $operator = Operator::findOrFail($id);

        return response()->json($operator, 200);
    }
}
