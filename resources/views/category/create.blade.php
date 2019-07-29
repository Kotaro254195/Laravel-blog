@extends("layouts.app")

@section('content')

<div class="card">
        <div class="card-header">{{isset($category)? 'Update Category':'Create Category'}}</div>

        <div class="card-body">
            @include("inc.errors")
            <form action="{{isset($category)? route("categories.update",['id'=>$category->id]):route("categories.store")}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($category))
                    @method("PUT")
                @endif
                <div class="form-group">
                    <label for="title">Category Name</label>
                    <input type="text" name="name" class="form-control" 
                    value="{{isset($category)? $category->name:""}}">
                </div>                

                <div calss="form-group text-center">
                    <button class="btn btn-block btn-success" type="submit">{{isset($category)? 'Update Category':'Create Category'}}</button>
                </div>
            </form>
        </div>
</div>
    
@endsection