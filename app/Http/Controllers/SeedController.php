<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Seed;
use App\SMS;
class SeedController extends Controller
{
     public function insert(Request $request){
		$seed = new Seed;
		$seed->username=$request->username;
		$seed->email=$request->email;
		$seed->password = bcrypt($request->password);
		$seed->nr_sms_sent = 0;
		$seed->countryCode = $request->countryCode;
		$seed->save();
		echo json_encode(array('username' => $seed->username, 'nr_sms_sent' => $seed->nr_sms_sent));
	}
	
	public function login(Request $request){
		$seed = Seed::where('email', $request->email)->first();
		if(!empty($seed)){
			if(strcmp(bcrypt($request->password), $seed->password)){
				echo json_encode(array('username' => $seed->username,'nr_sms_sent' => $seed->nr_sms_sent));
				if($seed->countryCode! = $request->countryCode){
					$seed->countryCode = $request->countryCode;
					$seed->save();
				}
			}
		}
		else
			echo "failed login";
	}
	
	public function logout(Request $request){
		$request->session()->regenerate();
		return view('welcome');
	}
	
	     public function insert2(Request $request){
		$seed = new Seed;
		$seed->username=$request->name;
		$seed->email = $request->email;
		$seed->password = bcrypt($request->password);
		$seed->nr_sms_sent = 0;
		$seed->save();
		return view('seed',['id' => $seed->id, 'username'=>$seed->username, 'loged'=>true, 'nr_sms_sent'=>$seed->nr_sms_sent]);
	}
	
	public function login2(Request $request){
		$seed = Seed::where('email', $request->email)->first();
		if(!empty($seed)){
			if(strcmp(bcrypt($request->password), $seed->password)){
				$request->session()->put('seed', $seed);
				return $this->statistics();
			}
			else
				return view('seed_login')->withErrors(array('password' => 'Bad credentials'));
		}
		else
			return view('seed_login')->withErrors(array('email' => 'Bad credentials'));
	}
	
	public function statistics(){
		$Days = DB::select(DB::raw('SELECT DATE_FORMAT(updated_at,"%d %b %Y") as date, COUNT(*) as sms from SMS where seed_id= '. session('seed')->id . ' GROUP BY DATE_FORMAT(updated_at,"%d %b %Y")'));
		return view('seed', compact('Days'));
	}
}
