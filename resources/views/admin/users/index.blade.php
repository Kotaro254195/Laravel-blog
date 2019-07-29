@extends("layouts.app")

@section('content')

<div class="card">
        <div class="card-header">Published Posts</div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <th>Image</th>
                <th>Name</th>
                <th colspan="2"></th>
                </thead>
                <tbody>
                    @if($users->count()>0)
                        @foreach($users as $user)
                            <tr>
                                {{-- @if(Auth::id() !=$user->id) --}}
                                    <td><img src="{{asset($user->profile->avatar) }}" alt="{{$user->name}}" width="90px" height="50px"></td>
                                    <td>{{$user->name}}</td>
                                    <td>                                  
                                        
                                        @if($user->admin)
                                            <a href="{{route("user.not_admin",['id'=>$user->id])}}" class="btn btn-sm btn-danger">Remove Admin</a>
                                        @else
                                            <a href="{{route("user.admin",['id'=>$user->id])}}" class="btn btn-sm btn-success">Make Admin</a>
                                        @endif
                                    </td>

                                    <td>
                                        @if(Auth::id()!=$user->id)
                                        <a href="{{route("user.delete",["id"=>$user->id])}}" class="btn btn-xs btn-danger">Delete</a>
                                        @endif
                                    </td>
                                {{-- @endif --}}
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">No registered users yet.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
            
        </div>
    </div>

@endsection