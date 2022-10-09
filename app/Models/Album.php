<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    use HasFactory;

    protected $fillable = ['album_name'];

    public function album_picture()
    {
        return $this->hasMany(Album_picture::class, 'album_id');
    }
}