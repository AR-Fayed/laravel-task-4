<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        $products = Product::all();
        if($user =$request->user()){
            $token = $user['api_token'];
            $name=$user['name'];
        } else {
            $token = 0;
            $name = 0;
        }
        //dd($user);
        //dd($token);
        return view('index')->with(['categories'=>$categories,'products'=>$products,'token'=>$token,'name'=>$name]);
    }

    function detail(Request $request){
        $id = $request->get('id');
        $product = Product::findOrFail($id);
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();

        if($user =$request->user()){
            $token = $user['api_token'];
            $name=$user['name'];
        } else {
            $token = 0;
            $name = 0;
        }

        return view('detail',compact('product','products','colors','sizes','name','token'));
    }

    function shop(Request $request){
        //dd($request->all());
        $query = Product::query();
        $inputs = $request->all();

        if(isset($inputs['keywords'])){
            $query = $query->where('name', 'like', '%' . $inputs['keywords'] . '%');
        }

        if(isset($inputs['color'])){
            if(!in_array('-1',$inputs['color'])){
                $query = $query->whereIn('color_id', $inputs['color']);
            }
        }

        if(isset($inputs['size'])){
            if(!in_array('-1',$inputs['size'])){
                $query = $query->whereIn('size_id', $inputs['size']);
            }
        }

        if($request->has('category_id')){
            $query = $query->where('category_id', $request->get('category_id'));
        }

        if($request->has('price')){
            if(!in_array('-1',$inputs['price'])){
                $query = $query->where(function ($q) use ($inputs) {
                    foreach ($inputs['price'] as $price) {
                        $q = $q->orWhereBetween('price', [$price, $price + 100]);
                    }
                });
            }
        }

        $products = $query->paginate(9);
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();

        if($user =$request->user()){
            $token = $user['api_token'];
            $name=$user['name'];
        } else {
            $token = 0;
            $name = 0;
        }

        return view('shop')->with(compact('categories','products','colors','sizes','name','token'));
    }

    function add_product(Request $request){
        if($request->has('id')){
            $ids = Session::get('ids', []);
            array_push($ids, $request->get('id'));
            Session::put('ids',$ids);
            return response()->json('Data added successfully');
        }
        return abort(404);
    }

    function add_heart(Request $request){
        if($request->has('id')){
            $heart = Session::get('heart', []);
            array_push($heart,$request->get('heart'));
            Session::put('heart', $heart);
            return response()->json('heart added');
        }
        return abort(404);
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
    
}
