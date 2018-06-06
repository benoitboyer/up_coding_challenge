<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function motorbikes() {

    	return $this->hasOne('App\Motorbike','id','motorbike_id');
    }

    // return the location array with latitude and longitude
    public function getLocation() {
    	
		$location = explode(',',$this->location);
       
        return $location;
    }


    // Calculate the distance between the owner and a selected point
    // Choose a unit : K for km , M for miles
    public function getDistanceFrom($unit){

        //Location of reference point
    	$REF_LATITUDE = 51.5081742;
    	$REF_LONGITUDE = -0.0876602;
    	
        //be sure we get the unit in CAPITAL
    	$measure_unit = strtoupper($unit);

        //get the latitude and longitude
    	$location = $this->getLocation();
    	$latitude = $location[0];
    	$longitude = $location[1];

    	
        $theta = $REF_LONGITUDE - $longitude;

    	$distance =  sin(deg2rad($REF_LATITUDE)) * sin(deg2rad($latitude)) +  cos(deg2rad($REF_LATITUDE)) * cos(deg2rad($latitude)) * cos(deg2rad($theta));

    	$distance =acos($distance);
    	$distance = rad2deg($distance);

    	$miles = $distance * 60 * 1.1515;

    	if ($measure_unit == "K") {
    		return ($miles * 1.609344);
  		} 
    	else {
       		return $miles;
 		}
	}
}
