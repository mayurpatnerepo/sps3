<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPropertyType extends Model
{
    protected $fillable = [
        'property_category',
        'property_type',
           'is_active'
        ];
}
