<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function color()
    {
      return $this->belongsToMany('Mec\Models\Color')->withPivot('image')->withTimestamps();
    }

    public function size()
    {
      return $this->belongsToMany('Mec\Models\Size')->withTimestamps();
    }

    public function pdf()
    {
      return $this->hasMany('Mec\Models\Pdffile');
    }
}
