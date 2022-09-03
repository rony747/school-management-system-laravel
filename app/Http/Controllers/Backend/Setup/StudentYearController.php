<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function studentYearView()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.student_year.view_year', $data);
    }
    public function studentYearAdd()
    {
        return view('backend.setup.student_year.add_year');
    }

    public function studentYearStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:student_years',
        ]);
        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Year Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.year.view')->with($notification);
    }

    public function studentYearEdit($id)
    {
        $editData = StudentYear::find($id);
        return view('backend.setup.student_year.edit_year', compact('editData'));
    }

    public function studentYearUpdate(Request $request, $id)
    {
        $data = StudentYear::find($id);
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Year Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.year.view')->with($notification);
    }

    public function studentYearDelete($id)
    {
        $data = StudentYear::find($id);
        $data->delete();
        $notification = [
            'message' => 'Year Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('student.year.view')->with($notification);
    }
}
