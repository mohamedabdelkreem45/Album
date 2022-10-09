<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_picture extends Model
{
    use HasFactory;

    protected $fillable = ['picture_name', 'album_id'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}