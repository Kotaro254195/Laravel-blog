@extends("layouts.app")

@section('content')

<div class="card">
        <div class="card-header">{{isset($tag)? 'Update Tag':'Create Tag'}}</div>

        <div class="card-body">
            @include("inc.errors")
            <form action="{{isset($tag)? route("tags.update",['id'=>$tag->id]):route("tags.store")}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($tag))
                    @method("PUT")
                @endif
                <div class="form-group">
                    <label for="title">Tags Name</label>
                    <input type="text" name="name" class="form-control" 
                    value="{{isset($tag)? $tag->name:""}}">
                </div>                

                <div calss="form-group text-center">
                    <button class="btn btn-block btn-success" type="submit">{{isset($tag)? 'Update Tags':'Create Tags'}}</button>
                </div>
            </form>
        </div>
</div>
    
@endsection