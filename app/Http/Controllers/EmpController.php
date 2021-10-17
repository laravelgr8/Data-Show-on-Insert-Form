<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class EmpController extends Controller
{
    public function login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $data=DB::table('emp_profile')->where(["email"=>$email,"password"=>$password])->first();
        if($data)
        {
            $request->session()->put('empid',$data->emp_id);
            return redirect('profile');
        }
        else
        {
            return "faield";
        }
    }

    public function formsubmit(Request $request)
    {
        $empid=Session::get('empid');
        $data=DB::table('emp_detail')->insertGetId([
            "name"=>$request->name,
            "address"=>$request->address,
            "gender"=>$request->gender,
            "profile_id"=>$empid
        ]);

        foreach($request->department as $depart)
        {
            DB::table('alldepart')->insert([
                "depart"=>$depart,
                "empid"=>$data
            ]);
        }
        return redirect('/empform')->with('msg',"Employee Add Success");   
    }

    public function profile()
    {
        $profile_id=Session::get('empid');
        $data=DB::table('emp_detail')->where('profile_id',$profile_id)->get();
        return view('profile',["data"=>$data]);
    }

    public function empform($id='')
    {
        $data=DB::table('emp_detail')->where('eid',$id)->get();
        $mdata=DB::table('alldepart')->where('empid',$id)->get();
        $list=[];
        foreach($mdata as $dep)
        {
            $list[]=$dep->depart;
        }
        $department=DB::table('department')->get();
        return view('empform',["department"=>$department,"data"=>$data,"list"=>$list]);
    }
}
