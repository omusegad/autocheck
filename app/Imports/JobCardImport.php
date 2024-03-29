<?php

namespace App\Imports;

use App\Models\Jobcard;
use App\Models\Company;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class JobCardImport implements ToCollection,WithStartRow
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
            //dd($this->company_id);

            Jobcard::create([
                'companyName' => $row[0],
                'wsmast_jobno'  => $row[1],
                'regno' => $row[2],
                'customer' => $row[3],
                'account' => $row[4],
                'address1' => $row[5],
                'address2' => $row[6],
                'contact' => $row[7],
                'email' => $row[8],
                'done17' => $row[9],
                'chasisno' => $row[10],
                'model' => $row[11],
                'jobdate' => $this->transformDate($row[12]),
                'tr_date' => $this->transformDate($row[13]),
                'reference' => $row[14],
                'gate_no' => $row[15],
                'company_id' => $this->company_id,
            ]);
        }
    }


}
