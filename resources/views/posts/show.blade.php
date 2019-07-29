@extends("layouts.app")

@section('content')

<div class="card">
        <div class="card-header">Post: {{$post->title}}</div>
        <img src="{{ asset($post->featured)}}" class="card-img-top" alt="{{$post->title}}" 
        width="100px" height="200px">
        <div class="card-body">
            <div>Created By:{{$post->user->name}}</div>
            <div>Category:{{$post->category->name}}</div>
            <div>Tags:
                @foreach ($post->tag as $tag)
                    <li>{{$tag->name}}</li>
                @endforeach
            </div>
            <div class="text-center">
                <p>{!! $post->content!!}</p>
            </div>
        </div>
    </div>

@endsection