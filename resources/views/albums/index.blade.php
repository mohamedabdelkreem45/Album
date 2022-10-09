@extends('layouts.main')
@section('title', 'albums')
@section('container')
@if (session()->has('add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session()->get('add')}}</strong>
        </div>
@endif
@if (session()->has('update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session()->get('update')}}</strong>
        </div>
@endif
@if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session()->get('delete')}}</strong>
        </div>
@endif
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
    <h1>
        <span>
            <a href="#addModal" class="modal-effect btn btn-outline-success" data-bs-toggle="modal">
                <i class="fa fa-plus"></i>
                Add Album
            </a>
        </span>
    </h1>

    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Album Name</th>
            <th scope="col">Album pictures</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @if ($albums)
        @foreach ($albums as $album)
            <tr>
                <th scope="row">{{++$i}}</th>
                <th>{{$album->album_name}}</td>
                <td><a class="btn btn-outline-warning btn-sm" role="button" href="{{route('album_pictures.show', $album->id)}}" ><i class='fas fa-images'> Album Pictures</i></a>
                </td>
                <td>
                    <a class="btn btn-sm btn-primary"
                    href="{{route('albums.edit', $album->id)}}" title="Edit"><i class="fa fa-pen"></i></a>

                    <a class="btn btn-sm btn-danger"
                    href="{{route('albums.show', $album->id)}}" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Album</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('albums.store')}}" method="post" autocomplete="off" class="was-validated" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="form-floating my-3">
                <input type="text" class="form-control" id="album_name" required name="album_name" placeholder=" ">
                <label for="album_name">Album Name</label>
            </div>

            <p class="text-danger">type of images (jpeg ,.jpg , png) </p>

            <div class="form-floating my-3">
                <input type="file" name="img[]" multiple class="dropify" id="img" required name="img" accept=".jpg, .png, image/jpeg, image/png">

            </div><br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal add album-->


@endsection

