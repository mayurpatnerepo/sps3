<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterLeadReqType extends Model
{
    protected $fillable = [
        'reqtype',
        'is_active'

    ];
}
