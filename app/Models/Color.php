<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
  public function materialcolor()
  {
    return $this->belongsToMany('Mec\Models\Material')->withTimestamps();
  }
}
