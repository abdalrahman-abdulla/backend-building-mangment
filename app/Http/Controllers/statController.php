<?php

namespace App\Http\Controllers;
use App\User; 
use Illuminate\Http\Request;
use App\building; 
use App\Payment; 
use App\Http\Resources\notificationsResource;
use App\Http\Resources\revenuesResource;
use App\Http\Resources\buildingResource;
use Carbon\Carbon;
 class statController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api'); 
    }
    public function index()
    {
        if(auth()->user()->permission['statistics']){
            $amount_paid = Payment::sum('amount_paid'); 
            $stat=[
                'usercount' => User::count(),
                'buildingcount' => building::count(),
                //'revenuescount' => Payment::where('amount_paid','!=',NULL)->count(),
                'revenuescount' => $amount_paid,
                'complete_build' => building::where('delivery_date','<',date("Y/m/d"))->count(),
                'allbuildprice' => building::sum('building_price'),
                'allbuildloan' => building::sum('loan_price'),
                'amount_paid' => $amount_paid,
                'remainmoney' => Payment::sum('payment_money') - $amount_paid ,

            ];
            $all=[
                'statistics' =>$stat,
                'notifications' => notificationsResource::collection(Payment::where([ 
                                ['amount_paid',NULL], 

                                ])->whereDate('payment_date', date("Y/m/d"))->latest()->get()),
                'revenues' => revenuesResource::collection(Payment::where([ 
                            ['amount_paid','!=',NULL], 

                            ])->whereDate('paid_date', Carbon::today())->latest()->get()),

                'buildings' => buildingResource::collection(building::whereDate('created_at', Carbon::today())->latest()->get()),       
                
                ];
            return response($all, 202);
        }
        else{
            return response('not authorize', 401);
        }

    }
}
