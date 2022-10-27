<?php

namespace App\Http\Controllers;

use App\Models\Currency;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index() {
    $currencies = Currency::sortable()->paginate(10);

    return view('admin.currency.index',compact('currencies'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Posts  $posts
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $currency = Currency::findorfail($id); // fetch the posr
    return view('admin.currency.edit',compact('currency'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Posts  $posts
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $currency = Currency::findorfail($id);
    $currency->price = $request['price'];

    $currency->save();
    return redirect('/admin/currency/')->with('message', 'Record updated!');
  }

}
