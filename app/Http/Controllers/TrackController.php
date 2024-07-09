<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::where('display', true)->orderBy('artist')->get();
        return Inertia::render('Tracks/Index', [
            'tracks' => $tracks,
        ]);
    }

    public function create()
    {
        dd('tracks.create');
    }

    public function store(Request $request)
    {
        dd('tracks.store');
    }

    public function show($id)
    {
        dd('tracks.show');
    }

    public function edit($id)
    {
        dd('tracks.edit');
    }

    public function update(Request $request, $id)
    {
        dd('tracks.update');
    }

    public function destroy($id)
    {
        dd('tracks.destroy');
    }
}
