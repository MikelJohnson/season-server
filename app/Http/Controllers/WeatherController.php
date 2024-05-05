<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{

    public function index(Request $request)
    {
        $uuid = $request->get('uuid');
        return response()->json(Weather::where('uuid', $uuid)->orderByDesc('created_at')->get());
    }

    public function store(Request $request)
    {
        $data = $request->only(['uuid', 'weather', 'city', 'condition_image']);
        $data['weather'] = json_decode($data['weather']);
        Weather::create($data);
    }
}