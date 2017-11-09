<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    public function collectionItem()
    {
        return $this->hasMany('Mec\Models\CollectionItem');
    }

    public function pixelItem()
    {
        return $this->hasMany('Mec\Models\Pixel');
    }
}
