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
    return $this->belongsTo('App\User');
}

   protected $table = 'reservations';
   protected $fillable = array('user_id', 'treatment_id', 'schedule_date', 'schedule_time');
}
