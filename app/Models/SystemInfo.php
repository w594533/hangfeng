<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemInfo extends Model
{
    protected $fillable = [
        'address', 'email', 'phone', 'facsimile', 'contract_person', 'image'
    ];

    public function setAboutShowBusinessImagesAttribute($about_show_business_images)
    {
      if (is_array($about_show_business_images)) {
        $this->attributes['about_show_business_images'] = json_encode($about_show_business_images);
      }
    }

    public function getAboutShowBusinessImagesAttribute($about_show_business_images)
    {
      if ($about_show_business_images) {
        return array_map(function($value) {
          return config('app.url'). '/storage/'. $value;
        }, json_decode($about_show_business_images, true));
      } else {
        return array();
      }

    }

    public function setAboutHonorImagesAttribute($about_honor_images)
    {
      if (is_array($about_honor_images)) {
        $this->attributes['about_honor_images'] = json_encode($about_honor_images);
      }
    }

    public function getAboutHonorImagesAttribute($about_honor_images)
    {
      if ($about_honor_images) {
        return array_map(function($value) {
          return config('app.url'). '/storage/'. $value;
        }, json_decode($about_honor_images, true));
      } else {
        return array();
      }


    }
}
