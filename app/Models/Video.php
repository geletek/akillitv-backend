<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = ['title','description','category_id','tags','accessType','isCommentable','isAdult'];
}
