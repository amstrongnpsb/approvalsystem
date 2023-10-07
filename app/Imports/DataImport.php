<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Data;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
     public function headingRow(): int
    {
        return 1;
    }
    public function model(array $row)
    {
        $id = IdGenerator::generate(['table' => 'data', 'field' => 'data_number', 'length' => 9, 'prefix' => 'DOC-']);
        return new Data([
           'data_number' =>$id,
           'description' => $row['description'],
           'creator' => $row['creator'],
           'status' => $row['status'],
           'created_at' => Carbon::now()->toDateTimeString(),
           'updated_at' =>Carbon::now()->toDateTimeString(),
        ]);
    }
}
