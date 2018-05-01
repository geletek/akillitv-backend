<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Attributes\CategoryAttribute;
use App\Models\Traits\Methods\CategoryMethod;

class Category extends Model
{
  use SoftDeletes,
      CategoryAttribute,
      CategoryMethod;

    protected $fillable = ['title','description','thumbnailUrl','status','addedBy', 'addedIpAddress'];
}
