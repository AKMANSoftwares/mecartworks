<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function types()
    {
        return $this->belongsToMany('Mec\Models\CollectionType')->withTimestamps();
    }
}
