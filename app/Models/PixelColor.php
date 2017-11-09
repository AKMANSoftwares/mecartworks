<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class PixelColor extends Model
{
  public function materialcoloritems()
  {
    return $this->belongsToMany('Mec/Models/Pixel')->withTimestamps();
  }
}
