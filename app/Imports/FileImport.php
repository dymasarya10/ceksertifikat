<?php

namespace App\Imports;

use App\Models\File;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FileImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new File([
            'identity_number' => $row['identity_number'],
            'name' => $row['name'],
            'event' => $row['event'],
            'type' => $row['type'],
            'barcode' => $row['barcode'],
        ]);
    }

    public function onError(\Throwable $error)
    {
        return redirect(route('admdashboard'))->with('error','Data Gagal Ditambahkan');
    }
}
