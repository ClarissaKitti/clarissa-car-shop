<?php

namespace App\Http\Controllers;

use App\Models\Cust;
use Illuminate\Http\Request;
use Auth;
class CustController extends Controller
{
    public function index()
    {
        $cust = Cust::where('status',1)->get();
        return view('cust.index',compact('cust'));
    }

    public function store(Request $request){
        // dd($request->all());

        $request->validate([
            'nama_cust' =>'required',
            'alamat' =>'required',
            'email' =>'required',
            'no_hp' =>'required'
        ]);
        $status = 1;
        Cust::insert([
            'nama_cust' => $request->get('nama_cust'),
            'alamat' => $request->get('alamat'),
            'email' => $request->get('email'),
            'no_hp' => $request->get('no_hp'),
            'status' => $status
        ]);
        return redirect('/cust')->with('success','Add Data Success');
    }

    public function edit(Cust $cust,$id){
        $data = Cust::where('id',$id)->get();
       // dd($data);
        return view('cust.edit',compact('data'));
    }

    public function Update(Request $request){
        
        $id = $request->get('id');

        $cust = Cust::find($id);
        $cust->nama_cust = $request->get('nama_cust');
        $cust->alamat = $request->get('alamat');
        $cust->email = $request->get('email');
        $cust->no_hp = $request->get('no_hp');
        $cust->update();

        return redirect('/cust')->with('success','Update Data Success');
    }

    public function Delete(Request $request, $id){
        
        $status = 0;
        $cust = Cust::find($id);
        $cust->status = $status;
        $cust->update();
        
        return redirect('/cust')->with('danger','Delete Data Success');
    }
}
