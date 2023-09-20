@extends('layouts.app');

@section('content')
    <div class="container">

        
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="card-title">{{$article->title}}</h4>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{$article->created_at->diffForHumans()}}
                        Category: <b>{{$article->category->name}}</b>
                    </div>
                    <p class="card-text">{{$article->body}}</p>
                    <div class="w-25 d-flex mb-3">
                        <a class="btn btn-warning flex-fill me-2" href="{{url("/articles/edit/$article->id")}}">
                            Edit
                        </a>
                        <a class="btn btn-danger flex-fill" href="{{url("/articles/delete/$article->id")}}">
                            Delete
                        </a>
                    </div>
                    
                    {{-- Showing Comments --}}
                    <ul class="list-group">
                        <li class="list-group-item active">
                            <b>Comments {{count($article->comments)}}</b>
                        </li>
                        @foreach ($article->comments as $comment)
                            <li class="list-group-item mt-3">
                                <a href="{{url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>
                                {{$comment->content}}
                                <div class="small mt-2">
                                    By <b>{{$comment->user->name}}</b>
                                    {{$comment->created_at->diffForHumans()}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    
                    {{-- Add Comments --}}
                  @auth
                  <form action="{{url('/comments/add')}}" method="post">
                    @csrf
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                    <textarea name="content" class="form-control my-3" id="" cols="30" rows="10" placeholder="New Comment"></textarea>
                    <input type="submit" class="btn btn-secondary" value="Add Comment">
                </form>
                
                  @endauth
                </div>
            </div>
        
    </div>
@endsection