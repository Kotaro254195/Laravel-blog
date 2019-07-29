<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel ="stylesheet" href="{{ asset("css/toastr.min.css")}}">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
</head>
<body>
    <div id="app">
        @include("inc.navbar")

        <div class="container py-4">
            <div class="row justify-content-center">
                @if(Auth::check())
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="/home">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.index')}}">All Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.create')}}">New Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('categories')}}">All Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('categories.create')}}">New Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts.trashed')}}">All Trached Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('tags.index')}}">Tags</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('tags.create')}}">New Tag</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('admin.settings')}}">Settings</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('admin.users')}}">Users</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('new_user')}}">New Users</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('user.profile')}}">My Profile</a>
                            </li>
                        </ul>
                    </div>
                @endif
                <div class="col-lg-8">
                    @yield("content")
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset("js/toastr.min.js")}}"></script>
    <script>
        @if(Session::has("success"))
            toastr.success("{{Session::get("success") }}")
        @endif    
        @if(Session::has("info"))
            toastr.info("{{Session::get("info") }}")
        @endif  
    </script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>

</body>
</html>
