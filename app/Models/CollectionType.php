<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class CollectionType extends Model
{
    public function collections()
    {
        return $this->belongsToMany('Mec\Models\Collection')->withTimestamps();
    }
}
