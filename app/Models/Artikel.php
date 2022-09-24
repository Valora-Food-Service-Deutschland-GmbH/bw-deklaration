<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = '_artikel';

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'store_id');
    }

    public function partner()
    {
        return $this->belongsTo(Post::class, 'partner_id', 'partner_id');
    }
}
