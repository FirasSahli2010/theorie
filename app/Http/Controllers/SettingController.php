<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingClass {}

class SettingController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $settings= Setting::all();

        $settingObject=new SettingClass();
        foreach ($settings as $settingElement) {
          if ( ($settingElement['title']) && ($settingElement['value']) ) {
            $attributeName = $settingElement['title'];
            $settingObject->$attributeName = $settingElement['value'];
          }

        }
        //return $settings;
        return view('admin.setting.index',compact('settingObject'));
    }
//
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function create(Setting $setting)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request)
    {
      // Header
        if( $request['title_size']) {
          $setting = Setting::where('title', 'titleSize')->first();
          $setting->value = $request['title_size'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'titleSize')->first();
          $setting->value = '';
          $setting->save();
        }

        if( $request['TitleColor']) {
          $setting = Setting::where('title', 'siteTitleColor')->first();
          $setting->value = $request['TitleColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'siteTitleColor')->first();
          $setting->value = '#000000';
          $setting->save();
        }

        if( $request['HeaderTextColor']) {
          $setting = Setting::where('title', 'headerTextColor')->first();
          $setting->value = $request['HeaderTextColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'headerTextColor')->first();
          $setting->value = '#000000';
          $setting->save();
        }

        if( $request['HeaderTextColor']) {
          $setting = Setting::where('title', 'headerTextColor')->first();
          $setting->value = $request['HeaderTextColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'headerTextColor')->first();
          $setting->value = '#000000';
          $setting->save();
        }


        //Main Menu
        if( $request['main_menu_size']) {
          $setting = Setting::where('title', 'MainMenuFontSize')->first();
          $setting->value = $request['main_menu_size'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'MainMenuFontSize')->first();
          $setting->value = '0';
          $setting->save();
        }

        if( $request['MainMenuColor']) {
          $setting = Setting::where('title', 'MainMenuColor')->first();
          $setting->value = $request['MainMenuColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'MainMenuColor')->first();
          $setting->value = '0';
          $setting->save();
        }

        if( $request['MainMenuBackgroundColor']) {
          $setting = Setting::where('title', 'MainMenuBackgroundColor')->first();
          $setting->value = $request['MainMenuBackgroundColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'MainMenuBackgroundColor')->first();
          $setting->value = '#FFFFFF';
          $setting->save();
        }


        //Menu
        if( $request['menu_title_size']) {
          $setting = Setting::where('title', 'MenuTitleFontSize')->first();
          $setting->value = $request['menu_title_size'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'MenuTitleFontSize')->first();
          $setting->value = '0';
          $setting->save();
        }

        if( $request['MenuTitleColor']) {
          $setting = Setting::where('title', 'MenuTitleColor')->first();
          $setting->value = $request['MenuTitleColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'MenuTitleColor')->first();
          $setting->value = '#000000';
          $setting->save();
        }

        if( $request['MenuTitleBackgroundColor']) {
          $setting = Setting::where('title', 'MenuTitleBackgroundColor')->first();
          $setting->value = $request['MenuTitleBackgroundColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'MenuTitleBackgroundColor')->first();
          $setting->value = '#FFFFFF';
          $setting->save();
        }

        if( $request['menu_size']) {
          $setting = Setting::where('title', 'MenuFontSize')->first();
          $setting->value = $request['menu_size'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'MenuFontSize')->first();
          $setting->value = '0';
          $setting->save();
        }

        if( $request['MenuColor']) {
          $setting = Setting::where('title', 'MenuTextColor')->first();
          $setting->value = $request['MenuColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'MenuTextColor')->first();
          $setting->value = '0';
          $setting->save();
        }

        if( $request['MenuTextBackgroundColor']) {
          $setting = Setting::where('title', 'MenuBackgroundColor')->first();
          $setting->value = $request['MenuTextBackgroundColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'MenuBackgroundColor')->first();
          $setting->value = '#FFFFFF';
          $setting->save();
        }

        //Body
        if( $request['body_title_size']) {
          $setting = Setting::where('title', 'paragraphTitleSize')->first();
          $setting->value = $request['body_title_size'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'paragraphTitleSize')->first();
          $setting->value = '0';
          $setting->save();
        }

        if( $request['BodyTitleColor']) {
          $setting = Setting::where('title', 'paragraphTitleColor')->first();
          $setting->value = $request['BodyTitleColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'paragraphTitleColor')->first();
          $setting->value = '#000000';
          $setting->save();
        }

        if( $request['BodyTitleBackgroundColor']) {
          $setting = Setting::where('title', 'paragraphTitleBackgroundColor')->first();
          $setting->value = $request['BodyTitleBackgroundColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'paragraphTitleBackgroundColor')->first();
          $setting->value = '#000000';
          $setting->save();
        }

        if( $request['body_size']) {
          $setting = Setting::where('title', 'paragraphBodySize')->first();
          $setting->value = $request['body_size'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'paragraphBodySize')->first();
          $setting->value = '0';
          $setting->save();
        }

        if( $request['BodyColor']) {
          $setting = Setting::where('title', 'paragraphBodyColor')->first();
          $setting->value = $request['BodyColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'paragraphBodyColor')->first();
          $setting->value = '#000000';
          $setting->save();
        }

        if( $request['BodyTextBackgroundColor']) {
          $setting = Setting::where('title', 'paragraphBodyBackgroudColor')->first();
          $setting->value = $request['BodyTextBackgroundColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'paragraphBodyBackgroudColor')->first();
          $setting->value = '#FFFFFF';
          $setting->save();
        }

        //link
        if( $request['link_size']) {
          $setting = Setting::where('title', 'LinkTextSize')->first();
          $setting->value = $request['link_size'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'LinkTextSize')->first();
          $setting->value = '0';
          $setting->save();
        }

        if( $request['LinkColor']) {
          $setting = Setting::where('title', 'linkColor')->first();
          $setting->value = $request['LinkColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'linkColor')->first();
          $setting->value = '#0000FF';
          $setting->save();
        }

        if( $request['link_hover_size']) {
          $setting = Setting::where('title', 'LinkHoverTextSize')->first();
          $setting->value = $request['link_hover_size'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'LinkHoverTextSize')->first();
          $setting->value = '13';
          $setting->save();
        }

        if( $request['LinkHoverColor']) {
          $setting = Setting::where('title', 'hoverLinkColor')->first();
          $setting->value = $request['LinkHoverColor'];
          $setting->save();
        }
        else {
          $setting = Setting::where('title', 'hoverLinkColor')->first();
          $setting->value = '#0000FF';
          $setting->save();
        }

        return redirect('/admin/setting/')->with('message', 'theme saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
