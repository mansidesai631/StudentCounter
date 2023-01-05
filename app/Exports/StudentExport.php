<?php

namespace App\Exports;

use App\Models\Assign;
use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    protected $data;
    
    public function __construct($data){
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */ 
    public function headings():array{
        return[
            'Teacher',
            'Subject',
            'Total Students Count',
            'Status',
        ];
    }

    public function collection()
    {
        return collect($this->data);
    }

}
