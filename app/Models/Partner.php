<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = '_partner';

    public function stores()
    {
        return $this->hasmany(Store::class,'partner_id','partner_id');
    }

    public function artikel()
    {
        return $this->hasmany(Artikel::class,'partner_id','partner_id');
    }
}
