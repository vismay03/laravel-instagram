<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function update(Request $req, User $u, $id) {
        $user = User::find( $id );
    
        $user->email = $req->email;
        $user->name = $req->name;
        $user->bio = $req->bio;
        $user->username = $req->username;
       
        

        if ( $req->profileImage !== null ) {
            $user->profileImage = $req->profileImage->hashName();
             $imgName = $req->profileImage;
        $req->profileImage->store('images', 'public');
        }
       
        $user->save();       
        return redirect('home');
    }

    public function changepassword(Request $req ,$id) {
        $user = User::find( $id );
    
        if ( Hash::check( $req->oldpassword, $user->password )){
            if ($_POST['newpassword'] === $_POST['renewpassword']) {
                $user->password = Hash::make( $req->newpassword);
                $user->save();
                return redirect('home');
            }
            else {
                return redirect('accounts/password/change/'.$user->id);
            }
        }
        else {
            return redirect('changepassword');
        }

        
    }

    public function posts(Request $req, $id) {
        $req->posts->store('images/posts', 'public')  ;
        $post = new Post();
        
        $post->image = $req->posts->hashName();
       
        $post->user_id = $id;
        $post->save();

        return redirect('home');

    }

    

}