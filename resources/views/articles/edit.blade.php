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
        <form action="" method="post">
          @method('PUT')
            @csrf
            <div class="form-group mb-3">
              <label>Title</label>
              <input type="text" value="{{$article->title}}" name="title" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Body</label>
                <textarea name="body" class="form-control" rows="5">{{$article->body}}</textarea>
              </div>
            {{-- <div class="form-group mb-3">
              <label for="">Category</label>
              <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{$article->category_id}}">
                        {{$category['name']}}
                    </option>
                @endforeach
              </select>
            </div> --}}
            <div class="form-group mb-3">
              <label for="category_id">Category</label>
              <select class="form-select" name="category_id" id="category_id">
                  @foreach ($categories as $category)
                      <option value="{{ $category['id'] }}" {{ $article->category_id == $category['id'] ? 'selected' : '' }}>
                          {{ $category['name'] }}
                      </option>
                  @endforeach
              </select>
          </div>
          
            <input type="submit" value="Update Article" class="btn btn-primary mb-5">
          </form>
    </div>
@endsection