<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
  public $primarykey = 'id';

  public function treatment()
 {
     return $this->belongsTo('App\Treatment');
 }

 protected $table = 'employes';
 protected $fillable = array('treatment_id','frist_name', 'last_name');
}
