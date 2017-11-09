<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class PixelDesign extends Model
{
  public function materialdesignitems()
  {
    return $this->belongsToMany('Mec/Models/Pixel')->withTimestamps();
  }
}
