<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // function cart()
    // {
    //     $ids = Session::get('ids', []);
    //     $idQuantity = [];
    //     foreach ($ids as $id) {
    //         if (isset($idQuantity[$id])) {
    //             $idQuantity[$id] += 1;
    //         } else {
    //             $idQuantity[$id] = 1;
    //         }
    //     }
        
    //     $products = [];
    //     foreach ($ids as $id) {
    //         $i = Product::findOrFail($id);
    //         array_push($products, $i);
    //     }

    //     dd($ids, $idQuantity,$products);

    //     return view('cart', compact('products'));
    // }

    ///////////////  function cart()
    //  {
    //      $ids = Session::get('ids', []);
    //      $productQuantity = [];
    //      foreach ($ids as $id) {
    //          if (!isset($productQuantity[$id]))
    //              $productQuantity[$id] = ['quantity' => 0, 'product' => null];
    //          $productQuantity[$id]['quantity'] += 1;
    //      }
    //      $products = Product::whereIn('id', $ids)->get();
    //      foreach ($products as $product) {
    //          $productQuantity[$id]['product'] = $product;
    //      }
    //      dd($ids,$products, $productQuantity);
    //      return view('cart', compact('productQuantity'));
    //  }
    //     /**
    //      * [
    //      * 1=>[quantity:5,product:{id:1,name:product1}],
    //      * 8=>[]
    //      * ]
    //      */
    // }
    function cart(Request $request)
    {
        $ids = Session::get('ids', []);
        $productQuantity = [];
        foreach ($ids as $id) {
            if (!isset($productQuantity[$id]))
                $productQuantity[$id] = ['quantity' => 0, 'product' => null];
            $productQuantity[$id]['quantity'] += 1;
        }
        $products = Product::whereIn('id', $ids)->get();
        foreach ($products as $product) {
            $productQuantity[$product['id']]['product'] = $product;
        }
        //dd($ids,$id,$products,$product,$productQuantity);
        $sub = $this->subtotal($productQuantity);
        $ship = $this->shipping($productQuantity);
        $total = $this->total($productQuantity);
       
        if($user =$request->user()){
            $token = $user['api_token'];
            $name=$user['name'];
        } else {
            $token = 0;
            $name = 0;
        }
        return view('cart', compact('productQuantity','sub','ship','total','token','name'));
    }

    function subtotal($productQuantity){
        $subPrice=0;
        foreach($productQuantity as $product){
            $subPrice += $product['quantity'] * ($product['product']['price']-($product['product']['price']*$product['product']['discount']));
        }
        return $subPrice;
    }

    function shipping($productQuantity){
       $ship=0;
       foreach($productQuantity as $product){
        $ship += $product['quantity'] * 10;
       }
        
        return $ship;
    }

    function total($productQuantity){
        $total = $this->shipping($productQuantity) + $this->subtotal($productQuantity);
        return $total;
    }

    function incQuantity(Request $request){
        $ids = Session::get('ids', []);
        array_push($ids, $request->get('id'));
        Session::put('ids', $ids);
        return response()->json($ids);
    }

    function decQuantity(Request $request){
        $ids = Session::get('ids', []);
        $i = array_search($request->get('id'), $ids);
        array_splice($ids,$i,1);
        Session::put('ids', $ids);
        return response()->json($ids);
    }

    function deleteProduct(Request $request){
        $ids = Session::get('ids', []);
        $newIds = [];
        foreach($ids as $id){
            if ($id != $request->get('id')){
                array_push($newIds, $id);
            }
        }
        Session::put('ids', $newIds);
        return response()->json($newIds);
    }

    function checkout(Request $request)
    {
        $ids = Session::get('ids', []);
        $productQuantity = [];
        foreach ($ids as $id) {
            if (!isset($productQuantity[$id]))
                $productQuantity[$id] = ['quantity' => 0, 'product' => null];
            $productQuantity[$id]['quantity'] += 1;
        }
        $products = Product::whereIn('id', $ids)->get();
        foreach ($products as $product) {
            $productQuantity[$product['id']]['product'] = $product;
        }
        //dd($ids,$id,$products,$product,$productQuantity);
        $sub = $this->subtotal($productQuantity);
        $ship = $this->shipping($productQuantity);
        $total = $this->total($productQuantity);

         Session::put('productQuantity', $productQuantity);
        
         $totalPrice = [];
         array_push($totalPrice, ['total' => $total,'sub'=>$sub,'ship'=>$ship]);
         Session::put('totalPrice', $totalPrice);
         $test = Session::get('totalPrice');
       
        if($user =$request->user()){
            $token = $user['api_token'];
            $name=$user['name'];
        } else {
            $token = 0;
            $name = 0;
        }
        
        return view('checkout', compact('productQuantity','sub','ship','total','token','name'));
    }
    
    
}