<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Rawdata;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ReportDeviceLogExport implements FromView,ShouldAutoSize, WithEvents
{
    function __construct($dev_eui, $start_date, $end_date) {
        $this->dev_eui = intval($dev_eui);
        $this->start_date = intval($start_date);
        $this->end_date = intval($end_date);
    }
    public function view(): View
    {
        $rawdatas = Rawdata::query();
        if (isset($this->dev_eui) && !empty($this->dev_eui)) {
            if($this->dev_eui !='All'){
                $rawdatas = $rawdatas->where('dev_eui', $this->dev_eui);
            }
        }

        if (isset($this->start_date) && !empty($this->start_date)) {
                $from = date("Y-m-d H:i:s", substr($this->start_date, 0, 10));
                $rawdatas = $rawdatas->where('created_at', '>=', $from);
        }

        if (isset($this->end_date) && !empty($this->end_date)) {
                $to = date("Y-m-d H:i:s", substr($this->end_date, 0, 10));
                $rawdatas = $rawdatas->where('created_at', '<=', $to);
        }
        $rawdatas = $rawdatas->orderBy('rawdatas.id', 'desc')->get();
        return view('admin.report-devices.export', [
            'data' => $rawdatas
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:O1'; // All headers
                $event->sheet->getStyle( $cellRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
         ]);
            },
        ];
    }
}
