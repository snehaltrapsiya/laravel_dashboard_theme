<?php

namespace App\Imports;

use App\Role;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class RolesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //print_r($row);exit;
        return new Role([
            'name'  => $row['role'],
            'description'   => $row['description'],
        ]);
    }
}
