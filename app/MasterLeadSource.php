<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterLeadSource extends Model
{
    protected $fillable = [
        'leadsource',
        'is_active'

    ];
}
