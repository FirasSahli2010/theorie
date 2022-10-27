<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\exam;

use App\Models\Posts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($locale = null)
    {
      if (isset($locale) && in_array($locale, config('app.available_locales'))) {
          app()->setLocale($locale);
      }

      $examList = exam::where(
        [
          ['language', app()->getLocale()],
          ['shw', 'Y'],
        ]
      )
      ->orderByDesc('updated_at')
      ->limit(3)
      ->get();

      $postList = Posts::where(
        [
          ['language', app()->getLocale()],
          ['shw', 'Y'],
        ]
      )
      ->orderByDesc('updated_at')
      ->limit(3)
      ->get();

      $today = \Carbon\Carbon::now()
          ->settings(
              [
                  'locale' => app()->getLocale(),
              ]
          );
      // LL is macro placeholder for MMMM D, YYYY (you could write same as dddd, MMMM D, YYYY)
      $dateMessage = $today->isoFormat('dddd, LL');


      return view('home', [
        'examList' => $examList,
        'postList' => $postList,
          'date_message' => $dateMessage,

      ]);
        return view('home', compact('examList', 'postList', 'dateMessage'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }
}
