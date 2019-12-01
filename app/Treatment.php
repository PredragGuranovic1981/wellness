<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
  public function employes()
  {
      return $this->hasMany('App\Employe');
  }

  public function reservations()
  {
      return $this->hasMany('App\Reservation');
  }

    protected $table = 'treatments';
    protected $fillable = array('name', 'image', 'description', 'price');
}
