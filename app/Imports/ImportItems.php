<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportItems implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Item([
            'name' => $row[0],
            'description' => $row[1],
            'price' => $row[2],
            'thumbnail' => $row[3],
            'category_id' => $row[4],
            'voucher_id' => $row[5],
        ]);
    }
}
