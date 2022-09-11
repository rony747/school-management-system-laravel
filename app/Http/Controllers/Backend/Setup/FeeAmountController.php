<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function feeAmountView()
    {
        $data['allData'] = FeeAmount::all();
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    public function feeAmountAdd()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    public function feeAmountStore(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required',
        ]);
        $countClass = count($request->class_id);

        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $data = new FeeAmount();
                $data->fee_category_id = $request->fee_category_id;
                $data->amount = $request->amount[$i];
                $data->class_id = $request->class_id[$i];
                $data->save();

            }
            $notification = [
                'message' => 'Fee Added Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('fee.amount.view')->with($notification);
        } else {
            $notification = [
                'message' => 'Fee Added Failed',
                'alert-type' => 'danger',
            ];
            return redirect()->route('fee.amount.view')->with($notification);
        }


    }

}
