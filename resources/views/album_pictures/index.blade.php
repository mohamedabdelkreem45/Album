
@extends('layouts.main')
@section('title', 'Pictures')
@section('container')
<br>
<h1>
<a href="{{route('albums.index')}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-arrow-left"></i></a>
Pictures
</h1>

    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">picture Name</th>
            <th scope="col">dwonload</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @foreach ($pictures as $picture )
            <tr>
                <th scope="row">{{++$i}}</th>
                <th>{{$picture->picture_name}}</td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" role="button" href="{{route('dwonload_picture', ['picture_name' => $picture->picture_name, 'album_name' => $picture->album->album_name])}}" ><i class='fa fa-pen'> dwonload</i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
