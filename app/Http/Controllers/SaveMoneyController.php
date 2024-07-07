<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RiceDate;
use App\Models\RicePrice;
use App\Models\SaveMoney;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class SaveMoneyController extends Controller
{
    public function savemoneydata()
    {
        $savemoneys = SaveMoney::all();
        return view('savemoney.savemoney', compact('savemoneys'));
    }
    


    //Edit
    public function editSavemoney($id)
    {
        $editSavemoney = SaveMoney::find($id);
        return view('savemoney.savemoney-edit', compact('editSavemoney'));
    }

    //Update
    function updateSavemoney(Request $request, $id)
    {
        $request->validate([
            'savemoney_bagc' => 'required',
            'savemoney_type' => 'required',
            'savemoney_receive' => 'required',
            'savemoney_change' => 'required'
        ]);
        $data = [
            'savemoney_bagc' => $request->savemoney_bagc,
            'savemoney_type' => $request->savemoney_type,
            'savemoney_receive' => $request->savemoney_receive,
            'savemoney_change' => $request->savemoney_change,
        ];
        SaveMoney::find($id)->update($data);
        return redirect('savemoney/savemoney');
    }




    function deleteSavemoney($id)
    {
        $dataSavemoney = SaveMoney::find($id);
        $dataSavemoney->delete();
        return redirect('savemoney/savemoney');
    }


    //Show view form
    function formSavemoney()
    {
        return view('savemoney-add');
    }


    //Insert
    function insertSavemoney(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'rice_date_id' => 'required',
            'savemoney_bagc' => 'required',
            'savemoney_type' => 'required',
            'savemoney_receive' => 'required',
            'savemoney_change' => 'required'
        ]);
        

        SaveMoney::create($request->post());
        return redirect('savemoney/savemoney');
    }




    //customer,riceprice Pull data
    public function savemoneyAddData()
    {
        $customers = Customer::all();
        $ricedates = RicePrice::all();
        return view('savemoney.savemoney-add', compact('customers', 'ricedates'));
    }

    //Pull data to Bill savemoney
    public function billSavemoney($id)
    {
        $savemoney = SaveMoney::where('id', '=', $id)->first(); 
        return view('savemoney.savemoney-receipt', compact('savemoney'));
    }
}
