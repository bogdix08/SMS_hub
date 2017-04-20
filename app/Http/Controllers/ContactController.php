<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contact;
use Auth;
class ContactController extends Controller
{
        public function insert(Request $request){
		$contact = new Contact;
		$contact->user_id = Auth::id();
		$contact->phone_number = $request->phone_number;
		$contact->name = $request->name;
		$contact->save();
		return back();
	}
	
	public static function display(){
		$Contacts = Contact::where('user_id', Auth::id())->get();
		 return view('contacts', compact('Contacts'));
	}
    public static function delete($id){
      Contact::destroy($id);
    }
}
