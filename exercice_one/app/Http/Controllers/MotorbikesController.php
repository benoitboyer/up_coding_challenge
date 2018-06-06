<?php

namespace App\Http\Controllers;
use App\Motorbike;
use Validator;
use Illuminate\Http\Request;

class MotorbikesController extends Controller
{
    

    public function createMotorbike(Request $request)
    {

        if($request->ajax()) {

    	//validate the post datas
    	
            $validator = Validator::make($request->all(),[
                'brand'     =>  'required|min:2|max:30',
                'colour'    =>  'required|min:2|max:25',
                'model_year' => 'required|min:4|max:4'
            ]);

        //If validation return validation eror messages as a json Object
        if($validator->fails()) {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }

    	// Create a new Motorbike object and put the validated datas
    	$motorbike= New Motorbike();

    	$motorbike->brand = $request->brand;
    	$motorbike->colour = $request->colour;
    	$motorbike->model_year = $request->model_year;

    	// Save the motorbike in the database
    	$motorbike->save();

    	// Return a json object with sucess msg
        // and the id of the last added motorbike
    	$json_success=[

    		'message' => "The Motorbike is added",
            'motorbike_id' => $motorbike->id

    	];
    	
    	return response()->json($json_success);
        }
    }
}
