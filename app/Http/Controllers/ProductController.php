<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        $product=Product::count();
        if($product==0){
            foreach(range(1,10) as $index)
            {
                Product::create([
                    'name'=>'Product name',
                    'title'=>'Product title',
                    'unit_price'=>rand(100,500),
                    'slug'=>'product-name',
                    'image'=>'1627747247.jpg'
                ]);
            }
        }
        $products=Product::orderBy('id', 'desc')
                         ->paginate(2);
        return view('pagination',compact('products'));
    }
}
