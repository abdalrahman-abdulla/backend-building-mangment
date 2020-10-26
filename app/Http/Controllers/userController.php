<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Http\Resources\userResource;
use App\permission; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('checkUserPermission:users');
    }
    
    public function index()
    {
         
        $user=User::where('id','!=',auth()->user()->id)->latest()->get();
        return  userResource::collection($user); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $this->validate($request, [
            'username' => 'required|min:3|without_spaces|unique:users', 
            'name'=>'required|min:3', 
            "password"=>"required|string|min:8",
            "permission.permission_name"=>"required|string|min:3"
        ],
        ['required' => 'هذا الحقل مطلوب',
        'min'=>"يجب ان يتجاوز هذا الحقل الثلاث احرف",
        'Date'=>"يجب ادخال تاريخ صالح",
        'without_spaces' => 'يجب ان يخلو من الفواصل',
        'permission.permission_name.required'=>'هذا الحقل مطلوب']);
         
        $user=User::create([
            'username' => $request['username'],
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
        ]);
        $permission=$request['permission'];
        permission::create([
            'name' => $permission['permission_name'],
            'statistics' => $permission['statistics'],
            'buildings' => $permission['buildings'],
            'revenues' => $permission['revenues'],
            'money' => $permission['money'],
            'work_stages' => $permission['work_stages'],
            'notifications' => $permission['notifications'],
            'user_id' => $user->id,
        ]);
         
        return response('user added success', 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user=User::where('id',$id)->first();
        
        $user->update([
            'username' => $request['username'],
            'name' => $request['name'],
            'password' => Hash::make($request['password']),
        ]);


        $permission=$request['permission'];
        permission::where('user_id',$id)->update([
            'name' => $permission['permission_name'],
            'statistics' => $permission['statistics'],
            'Buildings' => $permission['buildings'],
            'Revenues' => $permission['revenues'],
            'money' => $permission['money'],
            'work_stages' => $permission['work_stages'],
            'notifications' => $permission['notifications'],
            'user_id' => $user->id,
        ]);
         
        return response(json_encode($user), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return response(202);
    }
}
