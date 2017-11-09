<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionItem extends Model
{
  public function pixeldesign()
  {
    return $this->belongsToMany('Mec\Models\PixelDesign')->withTimestamps();
  }
  public function pixelcolor()
  {
    return $this->belongsToMany('Mec\Models\PixelColor')->withTimestamps();
  }
  public function pixelimage()
  {
    return $this->hasMany('Mec\Models\PixelImage');
  }
    public function catalogue()
    {
        return $this->belongsTo('Mec\Models\Catalogue');
    }
}
