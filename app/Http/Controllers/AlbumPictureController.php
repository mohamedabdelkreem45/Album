<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Album_picture;
use Illuminate\Http\Request;

class AlbumPictureController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $pictures = Album_picture::where('album_id', $id)->get();
        return  view('album_pictures.index', compact('pictures'));
    }


    public function edit(Album_picture $album_picture)
    {
        //
    }


    public function update(Request $request, Album_picture $album_picture)
    {
        //
    }


    public function destroy(Album_picture $album_picture)
    {
        //
    }


    public function dwonload_picture($picture_name, $album_name)
    {
        $pic = 'pictures';
        $path_to_pic = public_path($pic . '/' . $album_name . '/' . $picture_name);
        return response()->download($path_to_pic);
    }
}