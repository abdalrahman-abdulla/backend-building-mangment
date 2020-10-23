<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\building; 
use App\Http\Resources\buildingResource;

class buildingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('checkUserPermission:buildings');
    }
    
    public function index()
    {
         
        $building=building::latest()->get();
        return  buildingResource::collection($building); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'required|min:3',
            'building_no' => 'required|min:3', 
            'building_price' => 'required|numeric|min:3',
            'client_phone' => 'required|numeric|digits:11',
            'delivery_date' => 'required|Date',
            'loan_date' => 'required|Date',
            'loan_receiving_date' => 'required|Date',
            'loan_price' => 'required|numeric|min:3',
             
            
        ],
        ['required' => 'هذا الحقل مطلوب',
        'min'=>"يجب ان يتجاوز هذا الحقل الثلاث احرف",
        'Date'=>"يجب ادخال تاريخ صالح"]);
         
        $building=building::create([
            'client_name' => $request['client_name'],
            'building_no' => $request['building_no'],
            'building_price' => $request['building_price'],
            'client_phone' => $request['client_phone'],
            'delivery_date' => $request['delivery_date'],
            'loan_date' => $request['loan_date'],
            'loan_receiving_date' => $request['loan_receiving_date'],
            'loan_price' => $request['loan_price'],
            'notice' => $request['notice'],  
        ]);
         
        return response($building->id, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $building=building::where('id',$id)->first();
        return  new buildingResource($building); 
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
        $this->validate($request, [
            'client_name' => 'required|min:3',
            'building_no' => 'required|min:3', 
            'building_price' => 'required|numeric|min:3',
            'client_phone' => 'required|numeric|digits:11',
            'delivery_date' => 'required|Date',
            'loan_date' => 'required|Date',
            'loan_receiving_date' => 'required|Date',
            'loan_price' => 'required|numeric|min:3',
             
            
        ],
        ['required' => 'هذا الحقل مطلوب',
        'min'=>"يجب ان يتجاوز هذا الحقل الثلاث احرف",
        'Date'=>"يجب ادخال تاريخ صالح"]);
        $building=building::where('id',$id)->first();
        $building->update([
            'client_name' => $request['client_name'],
            'building_no' => $request['building_no'],
            'building_price' => $request['building_price'],
            'client_phone' => $request['client_phone'],
            'delivery_date' => $request['delivery_date'],
            'loan_date' => $request['loan_date'],
            'loan_receiving_date' => $request['loan_receiving_date'],
            'loan_price' => $request['loan_price'],
            'notice' => $request['notice'],  
        ]);
         
        return response('done', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building=building::findOrFail($id);
        $building->delete();
        return response(202);
    }
}
