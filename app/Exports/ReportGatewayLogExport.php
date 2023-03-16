<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\GatewayLog;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ReportGatewayLogExport implements FromView,ShouldAutoSize, WithEvents
{
    function __construct($gwid, $start_date, $end_date) {
        $this->gwid = intval($gwid);
        $this->start_date = intval($start_date);
        $this->end_date = intval($end_date);
    }
    public function view(): View
    {
        $rawdatas = GatewayLog::query();
        if (isset($this->gwid) && !empty($this->gwid)) {
            if($this->gwid !='All'){
                $rawdatas = $rawdatas->where('gateway_id', $this->gwid);
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
        $rawdatas = $rawdatas->orderBy('id', 'desc')->get();
        return view('admin.report-gateways.export', [
            'data' => $rawdatas
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:E1'; // All headers
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
