<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function studentClassView()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function studentClassAdd()
    {
        return view('backend.setup.student_class.add_class');
    }

    public function studentClassStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:student_classes',
        ]);
        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Class Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.class.view')->with($notification);
    }

    public function studentClassEdit($id)
    {
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('editData'));
    }

    public function studentClassUpdate(Request $request, $id)
    {
        $data = StudentClass::find($id);
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Class Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.class.view')->with($notification);
    }

    public function studentClassDelete($id)
    {
        $data = StudentClass::find($id);
        $data->delete();
        $notification = [
            'message' => 'Class Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.class.view')->with($notification);
    }
}
