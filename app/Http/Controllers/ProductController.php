<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Http\Traits;
use App\Http\Traits\ProductPriceTrait;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use ProductPriceTrait;

    public function index(){
        $products = Product::with('store')->select('*')->paginate(6);

        foreach($products as $product){
            $img_link = Storage::url($product->image);
            $product->image = $img_link;

            $product->final_price =  $this->product_price_after_discount($product);
        }
        // dd($products->toArray());
        return View('product.index')->with('products',$products);
    }
    public function create(){
        $stores = Store::select('*')->get();
        // dd($products);
        return view('product.create')->with('stores',$stores);
    }
    public function store(Request $request){

        $image = $request->file('image');
        $path = 'products/';
        $nameImage = time()+rand(1,1000000000).'.' . $image->getClientOriginalExtension();
        Storage::disk('local')->put($path.$nameImage , file_get_contents($image));



        $name = $request['name'];
        $description = $request['description'];
        $store_id = $request['store_id'];
        $price = $request['price'];
        $discount = $request['discount'];

        $product = new Product();
        $product->name = $name;
        $product->image = $path.$nameImage;
        $product->description =$description;
        $product->store_id = $store_id;
        $product->price = $price;
        $product->discount = $discount;

        $product-> Save();

        return redirect()->back();
    }
    public function edit($id){
        $product = Product::where('id',$id)->first();

        return View('product.edit')->with('product',$product);
    }
    public function update(Request $request,$id){

        $product = Product::where('id',$id)->first();

        $old_img = $product->image;

        // $data = $request->except('image');

        // if($request->hasFile('image')){
        //     $file=$request->file('image');
        //     $path = $file->store('products',[
        //         'disk' => 'public'
        //     ]);

        //     $data['image'] = $path;
        // }

        // $product->update($data);

        // if($old_img && isset($data['image'])){
        //     Storage::disk('public')->delete($old_img);
        // }
        $name = $request['name'];
        $new_img = $request['image'];
        $description = $request['description'];
        $store_id = $request['store_id'];
        $price = $request['price'];
        $discount = $request['discount'];

        $product = Product::where('id',$id)->first();

        $image = $old_img;

        if( $new_img != null){
            $image= $new_img;
        }

        $product = new Product();
        $product->name = $name;
        $product->image = $image;
        $product->description =$description;
        $product->store_id = $store_id;
        $product->price = $price;
        $product->discount = $discount;
            // dd($product);
        $result = $product->save();

        return redirect()->back();
    }
    public function destroy($id){
        $product = Product::findOrFail($id);

        $product->delete();

        if($product->image){
            Storage::disk('public')->delete($product->image);
        }
        return redirect()->back();
    }
}
