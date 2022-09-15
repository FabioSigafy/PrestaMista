<?php

namespace App\Exports;

use App\Models\Form;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class FormsExport implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        return Form::select('document', 'documentRegistry', 'name', DB::raw('DATE_FORMAT(date, "%d/%m/%Y") AS date'), 'deathcover')->get();
    }

    public function headings(): array
    {
        return ['CPF', 'Matricula (Repetir o CPF)', 'Nome', 'Data Nasc.', 'Capital'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:E1')
                    ->getFont()
                    ->setBold(true);
            },
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:E1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('ffff00');
            },
        ];
    }
}
