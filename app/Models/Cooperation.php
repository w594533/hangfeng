<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
  public function category()
  {
    return $this->belongsTo('App\Models\Category');
  }

  public function getLogoAttribute($logo)
  {
    return config('app.url'). '/storage/'. $logo;
  }
}
