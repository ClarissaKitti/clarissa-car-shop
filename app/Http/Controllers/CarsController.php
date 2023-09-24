<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Image_Car;
use Illuminate\Http\Request;
use Auth;
class CarsController extends Controller
{
    public function index()
    {
        $cars = Cars::where('status',1)->get();
        return view('cars.index',compact('cars'));
    }

    public function store(Request $request){
        //dd($request->all());
        
        $request->validate([
            'colour_car' =>'required',
            'type_car' =>'required',
            'remarks' =>'required',
            'year_car' =>'required',
            'file' => 'required|image|mimes:jpeg,jpg,JPG,png,gif|max:2048'
        ]);
        $randomId = rand(5,99999);
        $status = 1;
        if($files = $request->file('file')){
            $destinationpath = 'image/';
            $carsimage = $randomId . "." . $files->getClientOriginalExtension();
            $files->move($destinationpath, $carsimage);
        }
        Cars::insert([
            'colour_car' => $request->get('colour_car'),
            'type_car' => $request->get('type_car'),
            'remarks' => $request->get('remarks'),
            'year_car' => $request->get('year_car'),
            'status' => $status
        ]);
        $carsid = Cars::orderby('id','desc')->first()->id;
        
        //dd($carsid);
        Image_Car::insert([
            'cars_id' => $carsid,
            'file' => $carsimage
        ]);

        return redirect('/cars')->with('success','Add Data Success');
    }

    public function edit(Cars $cars,$id){
        $data = Cars::where('id',$id)->get();
       // dd($data);
        return view('cars.edit',compact('data'));
    }

    public function Update(Request $request){
        
        $id = $request->get('id');

        $cars = Cars::find($id);
        $cars->type_car = $request->get('type_car');
        $cars->year_car = $request->get('year_car');
        $cars->colour_car = $request->get('colour_car');
        $cars->remarks = $request->get('remarks');
        $cars->update();

        return redirect('/cars')->with('info','Update Data Success');
    }

    public function detail(Cars $cars,$id){
        $data = Cars::where('id',$id)->get();
        $image = Image_Car::where('cars_id',$id)->get();
        $id = Cars::select('id')->where('id',$id)->get();
        return view('cars.detail',compact('data','image','id'));
    }

    public function Delete(Request $request, $id){
        
        $status = 0;
        $cars = Cars::find($id);
        $cars->status = $status;
        $cars->update();
        
        return redirect('/cars')->with('danger','Delete Data Success');
    }
}
