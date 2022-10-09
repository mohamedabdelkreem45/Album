
@extends('layouts.main')
@section('title', 'Update')
@section('container')
<form action="{{route('albums.update', $album->id)}}" method="post" autocomplete="off" class="was-validated" enctype="multipart/form-data">
@csrf
@method('put')
    <div class="form-floating my-3">
        <input type="text" class="form-control" id="album_name" required name="album_name" placeholder=" " value="{{$album->album_name}}">
        <label for="album_name">Album Name</label>
    </div>
        <p class="text-danger">Add more images</p>
        <p class="text-danger">type of images (jpeg ,.jpg , png) </p>
    <div class="form-group">
        <input class="form-control form-control-lg" id="img" type="file" name="img[]" multiple accept=".jpg, .png, image/jpeg, image/png"/>
        <label for="img" class="form-label"></label>
    </div>

    <div class="form-group">
            <a href="{{route('albums.index')}}"><button type="button" class="btn btn-secondary">back</button></a>
            <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection
