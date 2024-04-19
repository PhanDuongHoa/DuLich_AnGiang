<?php

namespace App\Exports;

use App\Models\LienHe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;

class LienHeExport implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping
{
    public function headings(): array
    {
        return[
            'Họ tên','Email','Điện thoại','Chủ đề','Nội dung',
        ];
    }
    public function map($row): array
    {
        return[
           $row->hoten,
           $row->email,
           $row->dienthoai,
           $row->chude,
           $row->noidung, 
        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
    public function collection()
    {
        return LienHe::all();
    }
}
