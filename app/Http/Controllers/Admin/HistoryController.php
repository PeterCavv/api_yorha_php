<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Histories\HistoryCollection;
use App\Models\History;

class HistoryController extends Controller
{
    /**
     * Get all the histories
     * @return HistoryCollection
     */
    public function index()
    {
        return new HistoryCollection(History::all());
    }
}
