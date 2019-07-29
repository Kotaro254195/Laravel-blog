@extends("layouts.app")

@section('content')

<div class="card">
        <div class="card-header">Published Posts</div>

        <div class="card-body">
            <form action="/search/posts"method="GET">
                {{-- @csrf --}}
                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name='category_id' id="category" class="form-control">
                        @foreach($categories as $category)
                             <option value="{{$category->id}}">                                
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-xs btn-primary" class="form-control" value="search">
                </div>                
            </form>
            <table class="table table-striped">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th colspan="2"></th>
                </thead>
                <tbody>
                    @if($posts->count()>0)
                        @foreach($posts as $post)
                            <tr>
                                <td><img src="{{asset($post->featured)}}" alt="{{$post->title}}" width="90px" height="50px"></td>
                                <td>{{$post->title}}</td>
                                <td>
                                    <a href ="{{route("posts.show",['id'=>$post->id]) }}"class="btn btn-xs btn-dark">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>

                                <td>
                                    <a href ="{{route("posts.edit",['id'=>$post->id]) }}"class="btn btn-xs btn-dark">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                
                                <td>
                                    <form action ="{{route("posts.destroy",['id'=>$post->id]) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                            <input type="submit" class="{{$post->trashed()?"btn btn-danger":"btn btn-warning"}}" value="{{$post->trashed()? "Delete":"Trash"}}">
                                    </form>
                                </td>
                                @if($post->trashed())
                                <td>
                                    <a href="{{route("posts.restore",["id"=>$post->id])}}" class="btn btn-xs btn-dark">
                                        Restore
                                    </a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">No published posts yet.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
            {{-- {{$posts->links()}} --}}
        </div>
    </div>

@endsection