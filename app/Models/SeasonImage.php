<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SeasonImage extends Model
{
    use HasFactory;

    protected $fillable = ['season', 'image', 'mime_type', 'filename'];

    protected $hidden = ['mime_type', 'filename'];

    protected $appends = ['image_url'];

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn () => route('seasons.get_image', ['id' => $this->id]));
    }
}