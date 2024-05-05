<?php

namespace App\Exports;

use App\Models\Produkt;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

class ProduktExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produkt::all();
    }


    public function headings(): array
    {
        return [
            'No',
            'ID jenis',
            'Nama produkt',
            'nama supplier',
            'harga_beli',
            'harga_jual',
            'stok',
            'Tanggal Input',
            'Tanggal Update'
        ];
    }
    
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getColumnDimension('G')->setAutoSize(true);
                $event->sheet->getColumnDimension('H')->setAutoSize(true);
                $event->sheet->getColumnDimension('I')->setAutoSize(true);

                $event->sheet->inserNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:I1');
                $event->sheet->setCellValue('A1', 'data produkt');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A3:I' .$event->sheet->getHigestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'bordersStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['agrb' => '000000']
                        ]
                    ]
                ]);
            }
        ];
    }
}
