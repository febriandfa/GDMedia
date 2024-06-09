<?php

namespace App\Exports;

use App\Models\Tugas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup as WorksheetPageSetup;

class TugasNilaiExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $tugases = Tugas::where('id', $this->id)->with(['tugas_nilai.kelompok.user', 'tugas_nilai.user', 'tugas_nilai.tugas'])->first();

        $mappedData = $tugases->tugas_nilai->map(function ($tugas, $index) {
            return [
                'No' => $index + 1,
                'Nama Tugas' => $tugas->tugas->nama,
                'Siswa' => $tugas->user->name,
                // 'Absen Siswa' => $tugas->user->absen,
                // 'Kelompok' => $tugas->kelompok->name,
                'Nilai' => $tugas->nilai,
            ];
        });

        return $mappedData;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Tugas',
            'Siswa',
            // 'Absen Siswa',
            // 'Kelompok',
            'Nilai'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Set the font size to 12 for the entire worksheet
        $sheet->getParent()->getDefaultStyle()->getFont()->setSize(12);

        // Apply styling to the header row (row 1)
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => '4CAF50'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Apply styling to the data rows
        $sheet->getStyle('A2:F' . $sheet->getHighestRow())->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        return [];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Set the paper size to A4
                $event->sheet->getPageSetup()->setPaperSize(WorksheetPageSetup::PAPERSIZE_A4);

                // Set the print area
                $highestRow = $event->sheet->getHighestRow();
                $event->sheet->getPageSetup()->setPrintArea('A1:F' . $highestRow);

                // Fit to page width
                $event->sheet->getPageSetup()->setFitToWidth(1);
                $event->sheet->getPageSetup()->setFitToHeight(0);

                // Center the sheet horizontally and vertically
                $event->sheet->getPageSetup()->setHorizontalCentered(true);
                $event->sheet->getPageSetup()->setVerticalCentered(false);

                // Set margins
                $event->sheet->getPageMargins()->setTop(0.75);
                $event->sheet->getPageMargins()->setBottom(0.75);
                $event->sheet->getPageMargins()->setLeft(0.7);
                $event->sheet->getPageMargins()->setRight(0.7);

                // Set orientation to portrait
                $event->sheet->getPageSetup()->setOrientation(WorksheetPageSetup::ORIENTATION_PORTRAIT);
            },
        ];
    }
}
