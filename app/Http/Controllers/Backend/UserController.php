<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function userView()
    {
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    }

    public function userAdd()
    {
        return view('backend.user.add_user');
    }

    public function userStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        $notification = [
            'message' => 'User added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('user.view')->with($notification);
    }

    public function userEdit($id)
    {
        $editData = User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function userUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        $notification = [
            'message' => 'User Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('user.view')->with($notification);
    }

    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = [
            'message' => 'User deleted Successfully',
            'alert-type' => 'error',
        ];
        return redirect()->route('user.view')->with($notification);

    }
}
