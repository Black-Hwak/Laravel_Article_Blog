@extends('layouts.app');

@section('content')
    <div class="container">

        
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="card-title">{{$article->title}}</h4>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{$article->created_at->diffForHumans()}}
                    </div>
                    <p class="card-text">{{$article->body}}</p>
                    <div class="w-25 d-flex">
                        <a class="btn btn-warning flex-fill me-2" href="{{url("/articles/edit/$article->id")}}">
                            Edit
                        </a>
                        <a class="btn btn-danger flex-fill" href="{{url("/articles/delete/$article->id")}}">
                            Delete
                        </a>
                    </div>
                    
                    
                    
                </div>
            </div>
        
    </div>
@endsection