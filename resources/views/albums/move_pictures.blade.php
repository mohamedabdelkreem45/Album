@extends('layouts.main')
@section('title', 'Delete')
@section('container')
<p class="alert alert-danger"> if you want to move pictures of the album to another album please select the album from the select box if not press delete</p>
<form action="album_pictures/update" method="post" autocomplete="off" class="was-validated">
    @csrf
    @method('put')
    <div class="form-floating my-3">
        <select required class="form-select" id="album_name" name="id">
            @if ($albums)
                @foreach ($albums as $album)
            <option value="{{ $album->id }}">
                        {{ $album->album_name }}</option>
                @endforeach
            @endif
        </select>
        <label for="album_name">Album Name</label>
    </div>
    <div class="form-group">
            <a href="{{route('albums.index')}}"><button type="button" class="btn btn-secondary">back</button></a>
            <button type="submit" class="btn btn-primary">move</button>
    </div>
</form>
<br>

<form action="{{route('albums.destroy', $album->id)}}" method="post" autocomplete="off" class="was-validated">
    @csrf
    @method('delete')
    <div class="form-group">
        <input type="hidden" name="id" value="{{$album->id}}">
        <button type="submit" class="btn btn-danger">delete</button>
    </div>
</form>
@endsection
