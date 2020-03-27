<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App;
use Session;
use DB;

class dasboardController extends Controller
{
	public function index(Request $request) {
		//if(!Session::get('login')) { return redirect('login'); } 

	    Session::put('locale', 'id');
		App::setlocale(Session::get('locale'));
		$data = [];
		$data['router'] = [''];


		return view('dashboard.index')->with('data',$data);
	}
}
