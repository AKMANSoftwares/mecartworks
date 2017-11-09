<?php

namespace Mec\Models;

use Illuminate\Database\Eloquent\Model;

class PixelImage extends Model {
	public function collectionitemiamge() {
		return $this->belongsTo('Mec\Models\Pixel');
	}
}
