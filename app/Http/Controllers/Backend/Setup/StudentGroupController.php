<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function studentGroupView()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.student_group.view_group', $data);
    }
    public function studentGroupAdd()
    {
        return view('backend.setup.student_group.add_group');
    }

    public function studentGroupStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:student_groups',
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Group Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.group.view')->with($notification);
    }

    public function studentGroupEdit($id)
    {
        $editData = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group', compact('editData'));
    }

    public function studentGroupUpdate(Request $request, $id)
    {
        $data = StudentGroup::find($id);
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Group Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.group.view')->with($notification);
    }

    public function studentGroupDelete($id)
    {
        $data = StudentGroup::find($id);
        $data->delete();
        $notification = [
            'message' => 'Group Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.group.view')->with($notification);
    }
}
