@extends('layouts.app');

@section('content')
    <div class="container">
        @if (session('del_info'))
            <div class="alert alert-info">
                {{session('del_info')}}
            </div>
        @endif

        @if (session('add_info'))
            <div class="alert alert-info">
                {{session('add_info')}}
            </div>
        @endif

        @if (session('update_info'))
        <div class="alert alert-info">
            {{session('update_info')}}
        </div>
    @endif

        {{$articles->links()}}
        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="card-title">{{$article->title}}</h4>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{$article->updated_at->diffForHumans()}}
                    </div>
                    <p class="card-text">{{$article->body}}</p>
                    <a class="card-link" href="{{url("/articles/detail/$article->id")}}">
                        View Detail &raquo;
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
</head>
<body>
    <h1>Article Lists</h1>
    <ul>
        @foreach ($articles as $article)
            <li>{{$article['title']}}</li>
        @endforeach
    </ul>
</body>
</html> --}}