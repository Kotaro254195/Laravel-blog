@extends("layouts.app")

@section('content')

<div class="card">
        <div class="card-header">Published Posts</div>

        <div class="card-body">
            <table class="table">
                <thead>
                <th>Name</th>
                <th colspan="2"></th>
                </thead>
                <tbody>
                    @if($categories->count()>0)
                    
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href ="{{route("categories.edit",["id"=>$category->id])}}"class="btn btn-xs btn-dark">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action ="{{route("categories.delete",['id'=>$category->id]) }}" method="POST">
                                        @csrf
                                        @Method("DELETE")
                                            <button type="submit" class="btn btn-xs btn-dark"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                                
                                
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">No categories posts yet.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>

@endsection