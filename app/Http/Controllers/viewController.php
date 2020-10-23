<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment; 
use App\building; 
use App\Http\Resources\revenuesResource;
use App\Http\Resources\workstageResource;
use App\Http\Resources\moneyResource;
use App\Http\Resources\notificationsResource;

class viewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
         
         
    }

    
    public function revenues()
    {
        if(auth()->user()->permission['revenues']){
        $payment=Payment::where('amount_paid','!=',NULL)->latest()->get();
        return  revenuesResource::collection($payment);}
        else{
            return response('not authorize', 401);
        }
        
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function workstages()
    {
        if(auth()->user()->permission['work_stages']){
        $payment=Payment::where('amount_paid','!=',NULL)->latest()->get();
        return  workstageResource::collection($payment);}
        else{
            return response('not authorize', 401);
        } 
    }

    public function money()
    {
        if(auth()->user()->permission['money']){
        $payment=Payment::where([
            ['payment_date','<',date("Y/m/d")],
            ['amount_paid',NULL]
            ])->latest()->get();
        return  moneyResource::collection($payment); }
        else{
            return response('not authorize', 401);
        }
    }
     

    public function notifications()
    {
        if(auth()->user()->permission['notifications']){
        $payment=Payment::where([
            ['payment_date','<',date("Y/m/d")],
            ['amount_paid',NULL]
            ])->latest()->get();

        return  notificationsResource::collection($payment); }
        else{
            return response('not authorize', 401);
        }
    }
     

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
