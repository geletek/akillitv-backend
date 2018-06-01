<?php

namespace App\Models\Video;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Video\Traits\Scope\CategoryScope;
use App\Models\Video\Traits\Attributes\CategoryAttribute;
use App\Models\Video\Traits\Methods\CategoryMethod;




class Category extends Model
{
  use SoftDeletes,
      CategoryScope,
      CategoryAttribute,
      CategoryMethod;

    protected $fillable = ['title','description','thumbnailUrl','status','addedBy', 'addedIpAddress'];
    protected $dates = ['deleted_at'];
}
