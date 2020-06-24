<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPropCp extends Model
{
    protected $fillable = [
        'cp_id',
        'first_name',
        'last_name',
        'cp_username',
        'password',
        'cp_email',
        'cp_contact',
        'gender',
        'Marital_status',
        'dob',
        'designation',
        'address',
        'blood_group',
        'relative_name',
        'relation',
        'relative_contact',
        'relative_address',
        'cp_photo',
        'is_active'
];
}
