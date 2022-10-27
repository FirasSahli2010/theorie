<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
  public function cartList()
  {
      $cartItems = \Cart::getContent();
      //return $cartItems;
      // dd($cartItems);
      // return view('cart', compact('cartItems'));
      return view('/cart/cart', compact('cartItems'));

  }


  public function addToCart(Request $request)
  {
      \Cart::add([
          'id' => $request->id,
          'name' => $request->name,
          'price' => $request->price,
          'quantity' => 1 ,//$request->quantity,
          'image' => $request->image,
          'attributes' => array(
              'image' => $request->image,
          )
      ]);


      session()->flash('success', 'Product is Added to Cart Successfully !');

      //return redirect()->route('cart.list');
      return redirect('/cart');
  }

  public function updateCart(Request $request)
  {
      \Cart::update(
          $request->id,
          [
              'quantity' => [
                  'relative' => false,
                  'value' => $request->quantity,
                ],
          ]
      );

      session()->flash('success', 'Item Cart is Updated Successfully !');

      return redirect()->route('cart');
  }

  public function removeFromCart(Request $request)
  {
      \Cart::remove($request->id);
      session()->flash('success', 'Item Cart Remove Successfully !');

      return redirect()->route('cart');
  }

  public function clearAllCart()
  {
      \Cart::clear();

      session()->flash('success', 'All Item Cart Clear Successfully !');

      return redirect()->route('cart');
  }

  public function createOrder(Request $request)
  {
      $cartItems = \Cart::getContent();

      return view('/cart/confirm', compact('cartItems'));
  }
}
