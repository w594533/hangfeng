<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemInfo extends Model
{
    protected $fillable = [
        'address', 'email', 'phone', 'facsimile', 'contract_person', 'image'
    ];
}
