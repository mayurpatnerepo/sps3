<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPropSubcategory extends Model
{
	 protected $fillable = [
     'category_name',
     'subcategory_name',
        'is_active'
     ];
}
