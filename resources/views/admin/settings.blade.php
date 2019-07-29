@extends("layouts.app")

@section("content")

<div class="card">
    <div class="card-header">Edit Blog Settings</div>
    <div class="card-body">
        <form action="{{route("settings.update")}}" method="post">
            {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Site Name</label>
            <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
        </div> 
        <div class="form-group">
            <label for="name">Author</label>
            <input type="text" name="author" class="form-control" value="{{$settings->author}}">
        </div> 
        <div class="form-group">
            <label for="name">Author Bio</label>
             <input type="text" name="author_bio" class="form-control" value="{{$settings->author_bio}}">
        </div> 
        <div class="form-group">
            <label for="name">Contact Number</label>
            <input type="text" name="contact_number" class="form-control" value="{{$settings->contact_number}}">
        </div> 
        <div class="form-group">
            <label for="name">Contact Email</label>
            <input type="text" name="contact_email" class="form-control" value="{{$settings->contact_email}}">
        </div> 
        <div class="form-group">
            <label for="name">Address</label>
            <input type="text" name="address" class="form-control" value="{{$settings->address}}">
        </div> 
        <div class="form-group text-center">
            <button class="btn btn-success" type="submit">Update Site Settings</button>
        </div>
        </form>
    </div>
</div>



@endsection