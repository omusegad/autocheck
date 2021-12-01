<?php

namespace App\Imports;
use App\Models\Sparepart;
use App\Models\Company;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;

class ImportSpareParts implements ToCollection,WithStartRow
{
    private $company_id;
    public function  __construct(int $company_id)
    {
        $this->company_id = $company_id;
    }
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            Sparepart::create([
                'companyName' => $row[0],
                'otherpJOBNO'  => $row[1],
                'otherp_tr_date' => $this->transformDate($row[2]),
                'otherp_prt_num' => $row[3],
                'otherp_DESCRIPTION' => $row[4],
                'otherp_qty_deliver' => $row[5],
                'company_id' => $this->company_id,
            ]);
        }
    }
}
