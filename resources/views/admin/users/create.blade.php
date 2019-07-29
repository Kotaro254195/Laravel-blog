@extends("layouts.app")
@section("content")

<div class="card">
        <div class="card-header">
            Create a new User
        </div>
        <div class="card-body">
            @include("inc.errors")
            <form action="{{route("user.store")}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group text-center">
                    <button tyoe="submit" class="btn btn-success">Add User</button>
                </div>
            
        </div>
</div>
    
@endsection