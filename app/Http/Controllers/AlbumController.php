<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Album_picture;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    public function index()
    {
        $album_pictures = Album_picture::all();
        $albums = Album::all();
        return view('albums.index', compact('album_pictures', 'albums'));
    }


    public function create()
    {
    }


    public function store(request $request)
    {

        $request->validate([
            'album_name' => 'required',
            'img.*' => 'image|mimes:jpeg,jpg,png,gif|max:2048|unique:album_pictures,picture_name'
        ]);

        Album::create([
            'album_name' => $request->album_name
        ]);

        $album_id = Album::latest()->first()->id;
        $album_name = Album::latest()->first()->album_name;

        foreach ($request->img as $image) {
            $picture_name = $image->getClientOriginalName();
            $image->move(public_path() . '/pictures' . "/" . $album_name, $picture_name);

            Album_picture::create([
                'picture_name' => $picture_name,
                'album_id'     => $album_id
            ]);
        }
        session()->flash('add', 'albume added successfylly');

        return redirect()->route('albums.index');
    }


    public function show($id)
    {
        $albums = Album::all();
        $album = Album::where('id', $id)->first();
        return view('albums.move_pictures', compact('album', 'albums'));
    }


    public function edit($id)
    {
        $album = Album::where('id', $id)->first();
        return view('albums.edit', compact('album'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'album_name' => 'required',

            'img.*' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        Album::where('id', $id)->update([
            'album_name' => $request->album_name
        ]);
        if ($request->hasFile('img')) {
            foreach ($request->img as $image) {
                $picture_name = $image->getClientOriginalName();
                $image->move(public_path() . '/pictures' . "/" . $request->album_name, $picture_name);

                Album_picture::create([
                    'picture_name' => $picture_name,
                    'album_id'     => $id
                ]);
            }
        }
        session()->flash('update', 'album updated successfylly');

        return redirect()->route('albums.index');
    }


    public function destroy(request $request)
    {
        Album::where('id', $request->id)->delete();
        session()->flash('delete', 'album deleted');
        return redirect()->route('albums.index');
    }

    public function move_img($id)
    {
        return $id;
    }
}