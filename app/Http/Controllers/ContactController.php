<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  private LanguagesController $langController;

  public function __construct()
  {
      $this->middleware('auth');
      $this->langController = new LanguagesController();
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contacts = Contact::sortable()->paginate(10);

      $langListAsJSON = $this->langController->get_language_list();

      // $categories = Categories::orderBy('updated_at', request()->sort())->paginate(10);
      //return view('admin.category.index')->with('categories', compact('categories'));
      return view('admin.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $langListAsJSON = $this->langController->get_language_list();

      // $langArrayContent = $langListAsJSON->getContent();
      // $langArray = json_decode($langArrayContent, true);
      //$id = $array['id']
      $langArray = $langListAsJSON;

      return view('admin.contacts.add',compact('langArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $request->validate([
      //     'full_name'=>'required',
      //     'email'=>'required'
      // ]);

      $contact = new Contact([
          'full_name' => $request['full_name'],
          'job_title' => $request['job_title'],
          'email' => $request['email'],
          'telephone' => $request['telephone'],
          'mobile' => $request['mobile'],
          'city' => $request['city'],
          'country' => $request['country'],
          'language'=>$request['lang'],
          'address'=>$request['address']
      ]);
      $contact->save();
      return redirect('/admin/contact')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $contact = Contact::findorfail($id); // fetch the page

      $langListAsJSON = $this->langController->get_language_list();

      $langArray = $langListAsJSON;

      return view('admin.contacts.detail',compact('contact', 'langArray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $contact = Contact::findorfail($id); // fetch the page

      $langListAsJSON = $this->langController->get_language_list();

      $langArray = $langListAsJSON;

      return view('admin.contacts.edit',compact('contact', 'langArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findorfail($id);


        $contact->full_name = $request['full_name'];
        $contact->job_title = $request['job_title'];
        $contact->email = $request['email'];
        $contact->telephone = $request['telephone'];
        $contact->mobile = $request['mobile'];
        $contact->city = $request['city'];
        $contact->country = $request['country'];
        $contact->language = $request['lang'];
        $contact->address = $request['address'];
        $contact->save();
        return redirect('/admin/contact')->with('success', 'Contact saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contact = Contact::findorfail($id); // fetch the category

      $result = $contact->delete(); //delete the fetched category

      if ($result) {

            // return view('admin.category.index',compact('categories'));
            return redirect('/admin/contact/')->with('message', 'Record deleted!');
        } else {

            return redirect('/admin/contact/')->with('message', 'Delete failed!');
        }

        return response($response);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $id_array = explode(",",$ids);
        foreach ($id_array as $id) {
          // code...
          $contact = Contact::findorfail($id); // fetch the category
          $result = $contact->delete(); //delete the fetched category

          if (!$result) {
            return redirect('/admin/contact/')->with('message','Not all records deleted!');
          }
        }
        // $result = Categories::whereIn('id',explode(",",$ids))->delete();
        return redirect('/admin/contact/')->with('message','Records deleted!');
    }
}
