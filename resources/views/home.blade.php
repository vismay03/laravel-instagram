@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex">

                <img src="storage/images/{{ Auth::user()->profileImage }}" class="profile-img" alt="" srcset="">

                <div class="mt-5 ml-5">
                    <div class="d-flex">
                        <h3>{{ Auth::user()->username }}</h3>
                        <a class="py-1 px-2" href="/accounts/edit/{{ Auth::user()->id }}">Edit</a>
                    </div>
                    <div class="d-flex font-weight-bold">
                        <div>20 posts</div>
                        <div class="ml-5">102 followers</div>
                        <div class="ml-5">802 follwing</div>
                    </div>
                    <h2 class="mt-3"> {{ Auth::user()->name }} </h2>
                    <h5>{{ Auth::user()->bio }}</h5>
                </div>
            </div>
        </div>
        <div class="row post d-flex justify-content-center">
            <div class="col-md-11 d-flex justify-content-start flex-wrap mt-5">
            @foreach(auth()->user()->posts as $post) 
           
               <img src="storage/images/posts/{{ $post->image }}" class="m-2 border-0" style="width: 293px; height: 293px;" alt="" srcset="">             
            @endforeach
               
            </div>
        </div>
    </div>
    <footer
        class="footer position-fixed bg-white shadow-lg w-100 d-flex justify-content-center align-items-center">
        <form action="home/posts/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
            <input type="file" name="posts" value="Post" id="posts">
            <button type="submit" name="submit">Submit</button>
            @csrf
        </form>
    </footer>

@endsection
