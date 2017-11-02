<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atlas extends Model
{
    protected $fillable = ['description', 'image', 'category_id'];
}
