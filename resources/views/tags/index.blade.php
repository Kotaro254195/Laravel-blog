@extends("layouts.app")

@section('content')

<div class="card">
        <div class="card-header">All Tags</div>

        <div class="card-body">
            <table class="table">
                <thead>
                <th>Tag Name</th>
                <th colspan="2"></th>
                </thead>
                <tbody>
                    @if($tags->count()>0)
                    
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->name}}</td>
                                <td>
                                    <a href ="{{route("tags.edit",["id"=>$tag->id])}}"class="btn btn-xs btn-dark">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action ="{{route("tags.delete",['id'=>$tag->id]) }}" method="POST">
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