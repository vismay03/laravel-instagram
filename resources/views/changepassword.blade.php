@extends('layouts.navbar')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container-fluid d-flex flex-column position-relative">

    <div class="changePassword container-fluid mt-5 flex">
        <div class="row justify-content-center mt-5">
            <div class="col-md-3 d-flex flex-column">
                <a class="text-dark" href="/accounts/edit/{{ Auth::user()->id }}">Edit Profile</a>
                <a href="/accounts/password/change/{{ Auth::user()->id }}">Change Password</a>
            </div>
            <div class="col-md-3">
                <form action="/accounts/password/change/{{ Auth::user()->id }}" method="post"
                    class="d-flex flex-column">
                    <div class="form-group">
                        <label for="password">Old Password</label>
                        <input type="password" class="form-control" name="oldpassword" id="">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" name="newpassword" id="">
                    </div>
                    <div class="form-group">
                        <label for="password">Re-enter Password</label>
                        <input type="password" class="form-control" name="renewpassword" id="">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
