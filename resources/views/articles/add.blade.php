@extends('layouts.app');

@section('content')
    <div class="container bg-white">
        @if ($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form method="post">
            @csrf
            <div class="form-group mb-3">
              <label>Title</label>
              <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="form-group mb-3">
                <label>Body</label>
                <textarea name="body" class="form-control" rows="5" placeholder="Content"></textarea>
              </div>
            <div class="form-group mb-3">
              <label for="">Category</label>
              <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category['id']}}">
                        {{$category['name']}}
                    </option>
                @endforeach
              </select>
            </div>
            <input type="submit" value="Add Article" class="btn btn-primary mb-5">
          </form>
    </div>
@endsection