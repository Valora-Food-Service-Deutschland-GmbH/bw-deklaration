<?php

namespace App\Imports;

use App\Models\Artikel;
use Maatwebsite\Excel\Concerns\ToModel;

class ArtikelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Artikel([
            'address'   =>    $row[0],
            'ingredients'   =>    $row[0],
            'fat'   =>    $row[0],
            'fattyacids'    =>    $row[0],
            'carbs'     =>    $row[0],
            'sugar' =>    $row[0],
            'protein'   =>    $row[0],
            'salt'  =>    $row[0],
            'traces'    =>    $row[0],
            'article_id'    =>    $row[0],
            'partner_id'    =>    $row[0],
            'store_id'  =>    $row[0],
            'burn_kj'   =>    $row[0],
            'burn_ckal' =>    $row[0],
            'weight'    =>    $row[0],

        ]);
    }
}
