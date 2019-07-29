@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Edit your profile</div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
        </div> 
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" class="form-control" value="{{$user->email}}">
        </div> 
        <div class="form-group">
            <label for="name">New Password</label>
             <input type="password" name="password" class="form-control">
        </div> 
        <div class="form-group">
            <label for="name">Upload new avatar</label>
            <input type="file" name="avatar" class="form-control">
        </div> 
        <div class="form-group">
            <label for="name">Facebook profile</label>
            <input type="text" name="facebook" class="form-control" value={{$user->profile->facebook}}>
        </div> 
        <div class="form-group">
            <label for="name">About You</label>
            <textarea name="about" id="ckeditor" cols="30" rows="10" class="form-control">{{$user->profile->about}}</textarea>
        </div> 
        <div class="form-group text-center">
            <button class="btn btn-success" type="submit">Update Profile</button>
        </div>
        </form>
    </div>
</div>

@endsection