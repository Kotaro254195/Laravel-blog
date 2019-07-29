@extends("layouts.app")

@section('content')

<div class="card">
        <div class="card-header">{{isset($post)?'Edit Post':'Create Post'}}</div>

        <div class="card-body">
            @include("inc.errors")
            <form action="{{isset($post)? route("posts.update",$post->id):route("posts.store")}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method("PUT")
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{isset($post)? $post->title:""}}">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control"id="ckeditor" cols="5" rows="5">{{isset($post)? $post->content:""}}
                    </textarea>
                </div>
                @if(isset($post))
                <div class="form-group">
                    <label for="content">Now Picture</label>
                    <img src={{asset($post->featured)}} width="180px" height="100px">
                </div>
                @endif

                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name='category_id' id="" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if(isset($post))
                                    @if($post->category_id==$category->id)
                                        selected
                                    @endif
                                @endif
                                    >{{$category->name}}
                                </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Select Tags</label>
                    @foreach ($tags as $tag)
                    <div class="checkbox">
                        <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->name}}</label>
                    </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="image">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>

                <div calss="form-group text-center">
                    <button class="btn btn-block btn-success" type="submit">
                        {{isset($post)? "Update Post":"Create Post"}}
                    </button>
                </div>
            </form>
        </div>
</div>
    
@endsection