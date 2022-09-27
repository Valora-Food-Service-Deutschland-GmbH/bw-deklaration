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
            'address'   =>    $row[7],
            'ingredients'   =>    $row[1],
            'fat'   =>    $row[13],
            'fattyacids'    =>    $row[14],
            'carbs'     =>    $row[15],
            'sugar' =>    $row[16],
            'protein'   =>    $row[17],
            'salt'  =>    $row[18],
            'traces'    =>    $row[6],
            'article_id'    =>    $row[9],
            #'partner_id'    =>    $row[0],
            'store_id'  =>    $row[8],
            'burn_kj'   =>    $row[12],
            'burn_ckal' =>    $row[11],
            'weight'    =>    $row[4],

        ]);
    }
}
