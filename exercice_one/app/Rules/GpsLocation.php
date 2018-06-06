<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class GpsLocation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        $location = explode(',',$value);

        $latitude = $location[0];
        $longitude = $location[1];
        
        // Control the longitude is from 90 to -90
        // no "+"" if it's positive, a "-" if it's negative
        // 0 to 7 digits after the "."
        
        $reg_latitude ='/^(-)?(?:90(?:(?:\.0{1,7})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,7})?))$/';
       

        // Same rules for longitude but from 180 to -180
        $reg_longitude = '/^(-)?(?:180(?:(?:\.0{1,7})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,7})?))$/';
       
        if( preg_match($reg_latitude, $latitude) && preg_match($reg_longitude, $longitude)) {
            return true;
        }
        else return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The location is incorrect, must be between -90 to 90 for the latitude, -180 to 180 for longitude, max 7 digits after the . and latitude and longitude must be separated with ","" eg: 45.444444,-125.555555';
    }
}
