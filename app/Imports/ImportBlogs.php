<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUsers implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'title' => $row[0],
            'description' => $row[1],
            'thumbnail' => $row[2],
            'category_id' => $row[3],
            'user_id' => $row[4],
        ]);
    }
}
