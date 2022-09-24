<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
protected $table = '_store';

    public function artikel()
    {
        return $this->hasmany(Artikel::class,'store_id','store__id');
    }
}
