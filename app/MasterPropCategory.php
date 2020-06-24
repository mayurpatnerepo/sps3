<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPropCategory extends Model
{
    protected $fillable = [
        'category_name',
        'is_active'

    ];
}
