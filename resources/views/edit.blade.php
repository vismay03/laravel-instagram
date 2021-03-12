<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container-fluid d-flex flex-column">


@extends('layouts.navbar')

<div class="edit container-fluid mt-5">

    <div class="row d-flex justify-content-center w-auto">
        <div class="col-md-3 pt-5 d-flex flex-column">
            
            <a href="/accounts/edit/{{ Auth::user()->id }}">Edit Profile</a>
            <a class="text-dark" href="/accounts/password/change/{{ Auth::user()->id }}">Change Password</a>
        </div>
        <div class="col-md-3 pt-5">
            <div class="">
                <h3 class="text-center">Profile</h3>
                <a href="#">Change Profile Photo</a>
              <form action="/home/{{ Auth::user()->id }}" method="POST" class="d-flex flex-column mt-2" enctype="multipart/form-data">
                    <input type="file" name="profileImage" value="chaoose" id="image">
                    <div class="d-flex flex-column form-group"><label for="name">Name</label> <input class="form-control" type="text" name="name" value={{ Auth::user()->name }}>
                    </div>
                    <div class="d-flex flex-column form-group"><label for="name">Username</label> <input class="form-control" type="text" name="username"
                            value={{ Auth::user()->username }}></div>
                    <div class="d-flex flex-column form-group"><label for="name">Email</label> <input class="form-control" type="text" name="email"
                            value={{ Auth::user()->email }}></div>
                            <div class="d-flex flex-column form-group"><label for="bio">Bio</label> <textarea class="form-control" type="textarea" name="bio"
                                >{{ Auth::user()->bio }}</textarea></div>


                    <button type="submit" class="btn btn-primary">Update</button>



                    @csrf
                </form>
            </div>
        </div>

    </div>
</div>


