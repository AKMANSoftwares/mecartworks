<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
  public function materialsize()
  {
    return $this->belongsToMany('Mec\Models\Material')->withTimestamps();
  }
}
