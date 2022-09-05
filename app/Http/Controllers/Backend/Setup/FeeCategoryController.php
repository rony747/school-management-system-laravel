<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function feeCategoryView()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_feeCat', $data);
    }
    public function feeCategoryAdd()
    {
        return view('backend.setup.fee_category.add_feeCat');
    }

    public function feeCategoryStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:fee_categories',
        ]);
        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Category Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('fee.category.view')->with($notification);
    }

    public function feeCategoryEdit($id)
    {
        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_feeCat', compact('editData'));
    }

    public function feeCategoryUpdate(Request $request, $id)
    {
        $data = FeeCategory::find($id);
        $data->name = $request->name;
        $data->save();
        $notification = [
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('fee.category.view')->with($notification);
    }

    public function feeCategoryDelete($id)
    {
        $data = FeeCategory::find($id);
        $data->delete();
        $notification = [
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('fee.category.view')->with($notification);
    }
}
