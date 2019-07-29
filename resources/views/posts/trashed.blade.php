@extends("layouts.app")

@section('content')

<div class="card">
        <div class="card-header">Trashed Posts</div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th></th>
                </thead>
                <tbody>
                    @if($posts->count()>0)
                        @foreach($posts as $post)
                            <tr>   
                                    <td><img src="{{asset($post->featured)}}" alt="{{$post->title}}" width="90px" height="50px"></td>
                                    <td>{{$post->title}}</td>
                                <td>                                    
                                    <a href="{{route("posts.restore",["id"=>$post->id])}}" class="btn btn-xs btn-dark">
                                        <i class="fas fa-trash-restore"></i>
                                    </a>
                                </td>
                                <td>                                    
                                    <a href="{{route("posts.kill",["id"=>$post->id])}}" class="btn btn-xs btn-dark">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">No published posts yet.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>

@endsection