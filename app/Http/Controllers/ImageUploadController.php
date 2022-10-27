<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
  /**

   * Display a listing of the resource.

   *

   * @return \Illuminate\Http\Response

   */

  public function imageUpload()

  {

      return view('imageUpload');

  }



  /**

   * Display a listing of the resource.

   *

   * @return \Illuminate\Http\Response

   */

  public function imageUploadPost(Request $request, $id)

  {

      // $request->validate([
      //
      //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      //
      // ]);


      $image_file_name = 'image_'.$id;
      $image_name = $request["$image_file_name"]->getClientOriginalName().'.'.$request["$image_file_name"]->extension(); //->extension();
      // $imageName = time().'.'.$image_ext;

      //$imageName = $image_ext;

      //$request->image->move(public_path('images_'.$id), $imageName);



      /* Store $imageName name in DATABASE from HERE */

      $request[$image_file_name]->storeAs('images', $image_name);

      $request["$image_file_name"]->move(public_path('images'), $image_name);

      return back()

          ->with('success','You have successfully upload image.')

          ->with('image',$image_name);

  }
}
