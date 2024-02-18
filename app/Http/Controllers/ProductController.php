<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('products.index',[
            'products' => Product::get()
        ]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){

        // Validate the request...
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        // upload the image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
       
        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('Product created successfully.');
    }

    // edit method
    public function edit($id){
       $product = Product::where('id', $id)->first();
       return view('products.edit', [
           'product' => $product]);
    }

    // update method
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $product =Product::where('id', $id)->first();


        if(isset($request->image)){
            // upload the image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }
                   
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product updated successfully.');
    }

    // delete method

    public function destroy($id){
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product deleted successfully.');
    }

    // show method
    public function show($id){
        $product = Product::where('id', $id)->first();
        return view('products.show', ['product' => $product]);
    }

}