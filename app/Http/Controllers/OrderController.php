<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cars;
use App\Models\Cust;

use Auth;
use DB;

class OrderController extends Controller
{
    public function index()
    {
      
        $status = 1;
        $order = DB::table('tbl_order')
        ->join('tbl_cars', 'tbl_order.cars_id','=' ,'tbl_cars.id')
        ->join('tbl_custs', 'tbl_order.custs_id','=' ,'tbl_custs.id')
        ->select(
            'tbl_cars.type_car',
            'tbl_cars.year_car',
            'tbl_cars.colour_car',
            'tbl_custs.nama_cust',
            'tbl_custs.alamat',
            'tbl_order.date',
            'tbl_order.price',
            'tbl_order.id',
            'tbl_order.type_payment',
            'tbl_order.order_desc',
        )
        ->where('tbl_order.status','=', $status)
        ->get();
        $cars = Cars::where('status', 1)->get();
        $cust = Cust::where('status', 1)->get();
        return view('order.index',compact('order','cars','cust'));
    }

    public function store(Request $request){
       // dd($request->all());
        $request->validate([
            'cars_id' =>'required',
            'custs_id' =>'required',
            'date' =>'required',
            'price' =>'required',
            'type_payment' => 'required'
        ]);
        $status = 1;
        Order::insert([
            'cars_id' => $request->get('cars_id'),
            'custs_id' => $request->get('custs_id'),
            'date' => $request->get('date'),
            'price' => $request->get('price'),
            'type_payment' => $request->get('type_payment'),
            'order_desc' => $request->get('order_desc'),
            'status' => $status
        ]);
        return redirect('/order')->with('success','Add Data Success');
    }
}
