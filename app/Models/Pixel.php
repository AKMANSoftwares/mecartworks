<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class Pixel extends Model
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
  public function pixel()
  {
    return $this->belongsToMany('Mec\Models\Pixel','pixel_pixel',"parent_id","child_id")->withTimestamps();
  }

  public function associatedpixel()
  {
    return $this->belongsToMany('Mec\Models\Pixel','pixel_pixel',"child_id","parent_id")->withTimestamps();
  }
  public function catalogue()
  {
      return $this->belongsTo('Mec\Models\Catalogue');
  }
}
