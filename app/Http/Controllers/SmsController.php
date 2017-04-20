<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sms;
use App\Seed;
use App\Contact;
use Illuminate\Support\Facades\Auth;
class SmsController extends Controller
{
    public function insert(Request $request){
		$sms = new Sms;
		$sms->user_id = Auth::id();
		$phone_number = $request->phone_number;
        $phone_number = str_replace(' ', '', $phone_number);
		
		if($phone_number[0] == '+'){
			$pieces = explode('+', $phone_number);
			$phone_number = '00'.$pieces[1];
		}
		
        if(strlen( $phone_number) != 13 || !is_numeric( $phone_number))
			return back();
		
		$sms->phone_number = $phone_number;
		$sms->sms_content = $request->content;
		
		if( !empty($request->pp_date)){
			$sms->send_at = $request->pp_date . " " . $request->pp_time;
			$sms->state = "PP";
		}
		else{
			$sms->state = "NS";
		}
		
		$sms->save();
		return back();
	}
       
    public static function display(){
		$SMSs = Sms::where('user_id', Auth::id())->get()->reverse();
		$Contacts = Contact::where('user_id', Auth::id())->get();
		return view('sms', compact('SMSs','Contacts'));
	}
    public static function delete($id){
      Sms::destroy($id);
    }

	public static function sendSms(Request $request){
		$posponed_SMSs = Sms::where('state', 'PP')->get();
		$today = date("Y-m-d H:i:s");
		foreach($posponed_SMSs as $sms){
			if($sms->send_at < $today){
				$sms->state = "NS";
				$sms->save();
			}
		}
		
		$SMS = Sms::where('state', 'NS')->first();
		$seed = Seed::where('username', $request->username)->first();
		
		if(!empty($SMS)){
			if($seed->countryCode == substr($SMS->phone_number, 2, strlen($seed->countryCode))){
				echo $SMS;
				SMS::where('id',$SMS->id)->update(['state'=>"S", 'seed_id'=>$seed->id]);
				$SMS->state = 'S';
				$SMS->seed_id = $seed->id;
				$SMS->save();
				$seed->increment('nr_sms_sent');
			}
		}
		else{
		 echo "empty";
		}

    }
}
