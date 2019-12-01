<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

  public function treatment()
 {
     return $this->belongsTo('App\Treatment');
 }

 public function reservations()
{
    return $this->belongsTo('App\Reservation');
}

   protected $table = 'reservations';
   protected $fillable = array('treatment_id', 'employe_id', 'schedule');
}
