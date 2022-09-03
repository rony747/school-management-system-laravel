<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileView()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.profile.view_profile', compact('user'));
    }

    public function profileEdit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.profile.edit_profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $data = User::find(Auth::user()->id);

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->gender = $request->gender;
        $data->address = $request->address;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            $data->image = $filename;
        }
        if ($request->file('profile_photo_path')) {
            $coverfile = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data['profile_photo_path']));
            $coverfilename = date('YmdHi') . $coverfile->getClientOriginalName();
            $coverfile->move(public_path('upload/user_images/'), $coverfilename);
            $data->profile_photo_path = $coverfilename;
        }
        $data->save();
        $notification = [
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('profile.view')->with($notification);
    }

    public function passwordView()
    {
        return view('backend.profile.edit_password');
    }

    public function passwordUpdate(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = [
                'message' => 'Password updted Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('login')->with($notification);
        } else {
            return redirect()->back()->with('message', 'password does not match');
        }

    }


}
