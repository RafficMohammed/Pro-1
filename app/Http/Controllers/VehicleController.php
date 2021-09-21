<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Vehicle;
use App\Exceptions\PageNotFoundException;
use App\Notifications\DbNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{


    public function createProduct()
    {
        $user = Auth::user();
        return view('products.createProduct',compact('user'));
    }

    public function submitProduct(Request $request)
    {
        $user = Auth::user();
        $veh = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'tyre' => 'required',
            'speed' => 'required',
            'brands' => 'required',
            'user_id' => 'required'
        ]);

        Vehicle::create($veh);

        $user->notify(new DbNotification($request->name));
        return redirect('products.all')->with("success","Vehicle details are Stored in the Stock");

    }


    public function productShow()
    {
        $user = Auth::user();
        $notify = User::all();
        $veh =Vehicle::orderBy('id', 'asc')->get();

        $all = User::where('role','=',0)
            ->where('email_verified_at',`!=`,null)
            ->get();
        if ($user->role == 1)
        {
            return view('products.allProduct',compact('veh','user','all'));
        }else
        {
            return view('products.uallProduct',compact('veh','user','notify'));
        }

    }


    public function vehicleShow($name)
    {
        $user = Auth::user();
        try{
             $veh=Vehicle::where('id',$name)->firstorfail();
        }
        catch(\Exception $exception)
        {
            throw(new PageNotFoundException());
        }

        return view('products.indProduct',compact('veh','user'));


    }

    public function vehicleDelete($name)
    {
        Vehicle::where('id',$name)->delete();
        return back();
    }
    public function editProduct($name)
    {
        $user = Auth::user();
        $veh =Vehicle::where('id',$name)->first();
        return view('products.updProduct',compact('veh','user'));
    }

    public function update(Request $request,$id)
    {
        $ve = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'tyre' => 'required',
            ]);
        $veh = Vehicle::where('id',$id)->first();
        $veh->name = $request->name;
        $veh->description = $request->description;
        $veh->type = $request->type;
        $veh->tyre=$request->tyre;
        $veh->brands =$request->brands;
        $veh->speed = $request->speed;
        $veh->save();

        return redirect('indVeh/'.$id);
    }
}
