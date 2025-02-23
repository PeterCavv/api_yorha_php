<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Histories\HistoryRequest;
use App\Http\Resources\Histories\HistoryCollection;
use App\Http\Resources\Histories\HistoryResource;
use App\Models\Android;
use App\Models\Executioner;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Get all the histories
     * @return HistoryCollection
     */
    public function index()
    {
        $histories = History::with('executioner', 'android')->paginate(10);

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
