<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment; 
use App\building; 
use App\Http\Resources\paymentResource;


class paymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('checkUserPermission:buildings');

    }
    public function index($id)
    {
        
        $payment=Payment::where('building_id',$id)->get();
        return  paymentResource::collection($payment); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request=$request['data'];
        $building=building::findOrFail($id);
        $payment=Payment::create([
            'payment_name' => $request['payment_name'],
            'work_stage' => $request['work_stage'],
            'payment_money' => $request['payment_money'],
            'payment_date' => $request['payment_date'],
            'completion_payment_date' => $request['completion_payment_date'],
            'penultimate_payment_date' => $request['penultimate_payment_date'],
            'building_id' => $building->id,
        ]);
         
        return $payment->id;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add_repayment(Request $request, $id , $payment_id)
    {
        $request=$request['data'];
        $payment=Payment::where('id',$payment_id)->first();
        $payment->amount_paid=$request['amount_paid'];
        $payment->paid_date=$request['paid_date'];
        $payment->save();
         return $payment;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$payment_id)
    {
        $request=$request['data'];
        $payment=Payment::where('id',$payment_id)->first();
        $payment->update([
            'payment_name' => $request['payment_name'],
            'work_stage' => $request['work_stage'],
            'payment_money' => $request['payment_money'],
            'payment_date' => $request['payment_date'],
            'completion_payment_date' => $request['completion_payment_date'],
            'penultimate_payment_date' => $request['penultimate_payment_date'],
        ]);
            return $this->index($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment=Payment::findOrFail($id);
        $payment->delete();
        return response(202);
    }
}
