<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorbike extends Model
{
    public function owner() {
    	return $this->belongsTo('App\Owner','foreign_key');
    }

    public function __toString() {
    	return $this->brand.' - '.$this->colour.' - Year: '.$this->model_year; 
	}
}
