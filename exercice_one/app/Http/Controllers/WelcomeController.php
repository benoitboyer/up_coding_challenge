<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Motorbike;
use App\Owner;

//this is the landing page controller

class WelcomeController extends Controller
{
	// return the view of the landing page with all datas needed
	public function getIndex(Request $request){

		// Get all motorbikes and owners 
		$motorbikes = Motorbike::all();
		$owners = Owner::all();
		

		return view('welcome')->withMotorbikes($motorbikes)->withOwners($owners);

	}
}
