<?php

namespace App\Http\Controllers;

use App\Models\site_settings;
use App\Models\Languages;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Controllers\LanguagesController;

use App\Http\Controllers\ImageUploadController;

class SiteSettingsController extends Controller
{

  private LanguagesController $langController;
  private ImageUploadController $image_upload;

  public function __construct()
  {
      $this->middleware('auth');
      $this->langController = new LanguagesController();

      $this->image_upload = new ImageUploadController();
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $site_language_settings = [];
      $languages = Languages::where('shw', 'Y')->get();
      foreach ($languages as $lang) {

        $setting_items = site_settings::where('language', $lang->id)->get();
        // return Response($setting_items);
        foreach ($setting_items as $setting_item) {
          array_push($site_language_settings, $setting_item);
        }

      }

      return view('admin.site_settings.index', compact('site_language_settings'));
      //return Response(compact('site_language_settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\site_settings  $site_settings
     * @return \Illuminate\Http\Response
     */
    public function show(site_settings $site_settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\site_settings  $site_settings
     * @return \Illuminate\Http\Response
     */
    public function edit(site_settings $site_settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\site_settings  $site_settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting_item = site_settings::where('id', $id)->first();

        $setting_item->site_title = $request["site_title_$id"];
        $setting_item->site_name = $request["site_name_$id"];
        $setting_item->site_meta_desc = $request["site_meta_desc_$id"];
        $setting_item->site_meta_keywords = $request["site_meta_keywords_$id"];

        //$this->image_upload->imageUploadPost($request, $id);

        $image_file_name = 'image_'.$id;
        if ($request["$image_file_name"]) {
          $image_name = $request["$image_file_name"]->getClientOriginalName().'.'.$request["$image_file_name"]->extension(); //->extension();

          $request[$image_file_name]->storeAs('images', $image_name);

          $request["$image_file_name"]->move(public_path('images'), $image_name);

          $setting_item->site_logo = $image_name;
        }


        $setting_item->save();
        return redirect('/admin/site_settings/')->with('message', 'Item Saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\site_settings  $site_settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(site_settings $site_settings)
    {
        //
    }
}
