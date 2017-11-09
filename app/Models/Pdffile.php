<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class Pdffile extends Model
{
    public function materials()
    {
      return $this->belongsTo('Mec\Models\Material');
    }
}
