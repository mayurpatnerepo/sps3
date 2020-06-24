<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterLeadStatus extends Model
{
    protected $fillable = [
        'leadstatus',
        'is_active'

    ];
}
