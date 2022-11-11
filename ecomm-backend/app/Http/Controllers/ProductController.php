<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function addProduct(Request $request){

        $product= new Product;
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        $product->file_path= $request->file('file')->store('products');
        $product->save();
        return $product;
    }
    function list(){
        return Product::all();
    }
    function delete($id){
        $result= Product::where('id', $id)->delete();
        if($result){
            return ["result" =>"Deleted"];
        }
  
    }
    function getProduct($id){
        return Product::find($id);
        
    }
    function updateProduct( Request $request, $id){
        $product= Product::find($id);
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        $product->file_path= $request->file('file')->store('products');
        $product->save();
        return $product;
        
    }
    function search($key){
      return Product::where('name','LIKE', "%$key%")->get();
    }
}