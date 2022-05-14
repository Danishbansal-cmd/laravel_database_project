<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userdata;


class userdataController extends Controller
{
    //
    function index()
    {
        // $data = userdata::orderBy('email','asc')->get();
        $data = userdata::all();
        return view('viewuserdatapage',['data' => $data]);
    }

    //
    function delete($id)
    {
        
        $data = userdata::find($id)->delete();
        if($data == 1){
            session('deleteduserdata',$data);
            return redirect('/getuserdata');
        }
        else {
            session('deleteduserdata','Delete function cannot be performed');
        }
    }

    //
    function edit($id) 
    {
        $data = userdata::find($id);
        return view('edituserdatapage', ['edituserdata' => $data]);
    }

    //
    function editaction(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'phoneno' => 'required',
            'address' => 'required',
        ]);
        $data = userdata::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->phoneno = $req->phoneno;
        $data->address = $req->address;
        $data->save();

        return redirect('/getuserdata');
    }

    //
    function adduser(Request $req)
     {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'phoneno' => 'required',
            'address' => 'required',
        ]);
        $data = new userdata;
        $data->name = $req->name;
        $data->email = $req->email;
        $data->dob = $req->dob;
        $data->phoneno = $req->phoneno;
        $data->address = $req->address;
        $data->save();

        return redirect('/getuserdata');
     }

     //
     function deletemultiple(Request $req)
     {
        $userlisting = $req->userlisting;
        $data;
         foreach($userlisting  as $id){
            $data = userdata::where('id',$id)->delete();
         }
         if($data == 1){
            return response()->json(['success'=>$data,'message'=>'Data deleted successfully']);
         }
         return response()->json(['success'=> 0,'message'=>'Some error occured']);
         
     }
}
