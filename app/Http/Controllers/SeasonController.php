<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function descriptions(Request $request)
    {
        $query = Season::inRandomOrder();
        if ($season = $request->get('season')) {
            $query = $query->where('season', $season);
        }
        return response()->json($query->first());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_descriptions()
    {
        return view('season_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_descriptions(Request $request)
    {
        $data = $request->only(['description', 'season']);
        Season::create($data);
    }
}
