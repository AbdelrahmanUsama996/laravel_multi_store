<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicWebsiteController extends Controller
{
    public function index(){
        $stores = Store::with('product')->get();

        foreach(  $stores as $store) {
            $img_link = Storage::url($store->logo);
            $store->logo = $img_link;
        }

        return View('publicWebsite.index')->with('stores',$stores);
    }

    public function index2($id){

        // $stores = Store::with('product')->where('id',$id)->get();
        // // dd($store->product->image);
        // foreach($stores as $store){
        //     $img_link = Storage::url($store->product->image);
        //     $store->product->image = $img_link;
        // }


        $products = Product::with('store')->where('store_id',$id)->get();

        foreach($products as $product){
            $img_link = Storage::url($product->image);
            $product->image = $img_link;
        }
        // dd($products->toArray());

        return view('publicWebsite.indexProduct')->with('products',$products);
    }

    public function index3($id){
        $product = Product::with('store')->where('id',$id)->first();
        $img_link = Storage::url($product->image);
        $product->image = $img_link;
        return View('publicWebsite.buyProduct')->with('product',$product);
    }

    public function store(Request $request){
        // $transaction = Transaction::get();

        return View('publicWebsite.transactionDone');
    }
}
