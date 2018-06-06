<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\GpsLocation;
use App\Owner;

use Validator;

class OwnersController extends Controller
{

    public function createOwner(Request $request)
    {
    	// Validate the post datas using Laravel validation + custom Rule object GpsLocation
        if($request->ajax()) {

            $validator= Validator::make($request->all(), [
                'name'      =>  'required|string|min:2|max:40',
                'motorbike_id'=> 'required|exists:motorbikes,id',
                'location' =>   ['required', new GpsLocation]

            ]);

            //Return the validation errors as json
            if($validator->fails()){
                return response()->json($validator->getMessageBag()->toArray(), 422);
            }
            
            // Create a new Owner object and put the validated datas
            $owner= New Owner();

            $owner->name = $request->name;
            $owner->location = $request->location; 
            $owner->motorbike_id = $request->motorbike_id;

            // Save the motorbike in the database
            $owner->save();

            // Return a json object with sucess msg
            $json_success=[
                'message' => "The Owner is added"
            ];
        
            return response()->json($json_success);
        }
    }

    public function getClosestOwner(Request $request)
    {       
        // If the request is not ajax raise 404 page
        if($request->ajax()) {
          
            // Get all owners 
            $owners = Owner::all();

            //get the latitude and longitude of each owners
            $dist=[];
            $i=0;
            //give k for distance in kilometer or miles at default

            foreach ($owners as $owner) {

                $dist[$i]=$owner->getDistanceFrom("m");
                $i++;
            }

            $closest_index = array_search(min($dist),$dist);
            
            $closest_value = $dist[$closest_index];

            // Return the closest Owner and distance in kilometers
            $closest_owner = $owners[$closest_index]->name;

            return response()->json([$closest_owner,$closest_value]); 
        }
        else{

            abort(404);
        }
    }
}
