<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use Illuminate\View\View;

class StationController extends Controller
{
    public function index(): View
    {
        return view('templates.station.index', [
            'stations' => Station::all(),
        ]);
    }
}
