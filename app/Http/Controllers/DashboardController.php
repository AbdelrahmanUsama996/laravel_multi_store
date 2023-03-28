<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){


        $stores = Store::with('product')->paginate(6);
        // dd($stores->toArray());
        foreach(  $stores as $store) {
            $img_link = Storage::url($store->logo);
            $store->logo = $img_link;
        }

        return View('store.index')->with('stores',$stores);
    }
    public function create(){

        return View('store.create');
    }
    public function store(Request $request){

        $logo = $request->file('logo');
        $path = 'uploads/';
        $nameLogo = time()+rand(1,1000000000).'.' . $logo->getClientOriginalExtension();
        Storage::disk('local')->put($path.$nameLogo , file_get_contents($logo));

        $name = $request['name'];
        $address = $request['address'];

        $store = new Store();
        $store->name = $name;
        $store->address = $address;
        $store->logo = $path.$nameLogo;

        $result = $store->save();

        return redirect()->back();
    }
    public function edit($id){
        $store = Store::where('id',$id)->first();

        return View('store.edit')->with('store',$store);
    }
    public function update(Request $request,$id){
        $name = $request['name'];
        $address = $request['address'];
        $logo = $request['logo'];

        $store = Store::where('id',$id)->first();

        $store->name = $name;
        $store->address = $address;
        $store->logo = $logo;

        $result = $store->save();

        return redirect()->back();
    }
    public function destroy($id){
        $result = Store::where('id',$id)->delete();
        return redirect()->back();
    }
}
