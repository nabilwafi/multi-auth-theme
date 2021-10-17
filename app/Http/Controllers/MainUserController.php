<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainUserController extends Controller
{
    
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile() {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('user.profile.view_profile', compact('user'));
    }

    public function editProfile() {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('user.profile.edit_profile', compact('userData'));
    }

    public function updateProfile(Request $request) {

        $userData = User::find(Auth::user()->id);
        $userData->name = $request->name;
        $userData->email = $request->email;

        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/user_images/'.$userData->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalExtension();
            $file->move(public_path('uploads/user_images'),$filename);
            $userData['profile_photo_path'] = $filename;
        }

        $userData->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.profile')->with($notification);

    }

    public function changePassword() {
        
        return view('user.password.change_password');
    }

    public function updatePassword(Request $request) {

        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else {
            return redirect()->back();
        }

    }

}
