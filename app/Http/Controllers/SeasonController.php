<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season;
use App\Models\SeasonImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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

    public function images(Request $request)
    {
        $query = SeasonImage::inRandomOrder();
        if ($season = $request->get('season')) {
            $query = $query->where('season', $season);
        }
        return response()->json($query->first(), options: JSON_UNESCAPED_SLASHES);
    }

    public function get_image(Request $request, int $id)
    {
        $image = SeasonImage::find($id);
        $data = base64_decode($image->image);
        return response($data)
            ->header('Cache-Control', 'no-cache private')
            ->header('Content-Description', 'File Transfer')
            ->header('Content-Type', $image->mime_type)
            ->header('Content-length', strlen($data))
            ->header('Content-Transfer-Encoding', 'binary');
    }

    public function create_images()
    {
        return view('season_images_create');
    }

    public function store_images(Request $request)
    {
        $data = $request->only(['season']);
        $path = $request->file('image_file')->getRealPath();
        $data['filename'] = $request->file('image_file')->getClientOriginalName();
        $data['mime_type'] = mime_content_type($path);
        $data['image'] = base64_encode(file_get_contents($path));
        SeasonImage::create($data);
    }
}