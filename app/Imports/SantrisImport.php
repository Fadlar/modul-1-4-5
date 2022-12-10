<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class SantrisImport implements ToModel
{
    public function model(array $row)
    {
        return new Santri([
            'nama' => $row[0],
            'tgl_lahir' => date('Y-m-d', strtotime($row[1])),
            'lahir' => $row[2],
            'alamat' => $row[3],
            'no_hp' => $row[4],
        ]);
    }
}
