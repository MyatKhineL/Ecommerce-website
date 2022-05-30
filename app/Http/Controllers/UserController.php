<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showLogin(){
        return view('Users.auth.login');
    }
    public function postLogin(Request $request){
        // Check Email Exist
        if (User::where('email', $request->email)->first()){
            // Attempt Login
            if (Auth::attempt($request->only('email', 'password'))){
                return redirect()->route('index');
            }else{
                return redirect()->back();
            }
            // Redirect Page
        }else{
            return redirect()->back();
        }
    }
    public function showRegister(){
        return view('Users.auth.register');
    }
    public function postRegister(Request $request){
        // Image Upload
        $file = $request->file('image');
        $file_name = uniqid(time())."_profile_image_".$file->getClientOriginalName();
        $file_path = 'image/'.$file_name;
        $file->storeAs('image', $file_name);

        // Database Insert
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = $file_path;
        $user->save();

        // Redirect Login
        return redirect()->route('user.login');
    }

    public function profile(){
        $user = Auth::user();
        return view('Users.Profile.info', ['user' => $user]);
    }

    public function changeProfile(Request $request){
        $user = User::where('id', Auth::id())->first();

        // Check Image
        if ($request->file('image')){
            $image_arr = explode('/', $request->image); // remove 'image/' folder , that is [0]
            Storage::disk('image')->delete($image_arr[0]);

            // make new image_name
            $file = $request->file('image');
            $file_name = uniqid(time())."_profile_image_".$file->getClientOriginalName();
            $file_path = 'image/'.$file_name;
            $file->storeAs('image', $file_name);

        }else{
            $file_path = $user->image;
        }

        // Update
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $file_path;
        $user->update();
        return redirect()->back();
    }
}
