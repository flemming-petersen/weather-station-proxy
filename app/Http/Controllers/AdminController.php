<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('templates.admin.index', [
            'stations' => Station::all(),
        ]);
    }

    public function edit(Station $station): View
    {
        return view('templates.admin.edit', [
            'station' => $station,
        ]);
    }

    public function create(): View
    {
        return view('templates.admin.create');
    }

    public function update(Request $request): RedirectResponse
    {
        Station::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        return redirect()->route('admin.index');
    }

    public function store(Request $request): RedirectResponse
    {
        Station::create($request->all());

        return redirect()->route('admin.index');
    }

    public function delete(Station $station): RedirectResponse
    {
        $station->delete();

        return redirect()->route('admin.index');
    }
}
