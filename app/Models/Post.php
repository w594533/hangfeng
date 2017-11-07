<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function getCoverAttribute($cover)
  {

    return config('app.url'). '/storage/'. $cover;
    
  }

}
