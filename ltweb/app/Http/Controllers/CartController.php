<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function save(Request $request){
        $product = Product::find($request->post('product-hidden'));
        $data['id']=$product->id;
        $data['name']=$product->title;
        if(isset($_POST['qty'])){
            $data['qty']=$request->post('qty');
        } else {
            $data['qty']=1;
        }
        $data['price']=$product->price;
        $data['weight']=$product->category_id;
        $data['options']['avatar']=$product->avatar;
        Cart::add($data);
        return redirect()->back();
    }

    public function update(Request $request){
        foreach (Cart::content() as $cart){
            Cart::update($cart->rowId,$request->post($cart->id));
        }
        return redirect('save-cart');
    }

    public function remove($rowId){
        Cart::remove($rowId);
        return redirect('save-cart');
    }

    public function destroy(){
        Cart::destroy();
        return redirect('save-cart');
    }
}
