<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Histories\HistoryRequest;
use App\Http\Resources\Histories\HistoryCollection;
use App\Http\Resources\Histories\HistoryResource;
use App\Models\History;

class HistoryController extends Controller
{
    /**
     * Get all the histories
     * @return HistoryCollection
     */
    public function index()
    {
        $histories = History::with('executioners', 'android')->paginate(5);

        return new HistoryCollection(History::all());
    }

    public function store(HistoryRequest $request)
    {
        $validatedData = $request->validated();

        $history = History::create([
            'summary' => $validatedData['summary'],
            'android_id' => $validatedData['android_id'],
        ]);

        $history->executioner()->attach($request['executioner_ids']);

        return new HistoryResource($history);
    }
}
