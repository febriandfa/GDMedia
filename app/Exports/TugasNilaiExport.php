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
        $tugases = Tugas::where('id', $this->id)
            ->with(['tugas_nilai.kelompok.user', 'tugas_nilai.user', 'tugas_nilai.tugas'])
            ->first();

        // Sort the collection by 'Kelompok' name in ascending order
        $sortedTugases = $tugases->tugas_nilai->sortBy(function ($tugas) {
            return $tugas->kelompok->name;
        });

        // Sort the sorted collection by 'Absen Siswa' in ascending order
        $sortedTugases = $sortedTugases->sortBy(function ($tugas) {
            return $tugas->user->absen;
        });

        // Map the sorted data
        $mappedData = $sortedTugases->map(function ($tugas) {
            return [
                'Absen Siswa' => $tugas->user->absen,
                'Siswa' => $tugas->user->name,
                'Kelompok' => $tugas->kelompok->name,
                'Nilai' => $tugas->nilai,
            ];
        });

        return $mappedData;
    }



    public function headings(): array
    {
        return [
            'Absen Siswa',
            'Siswa',
            'Kelompok',
            'Nilai'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Set the font size to 12 for the entire worksheet
        $sheet->getParent()->getDefaultStyle()->getFont()->setSize(11);

        // Apply styling to the header row (row 3)
        $sheet->getStyle('A1:D1')->applyFromArray([
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
        $sheet->getStyle('A4:D' . $sheet->getHighestRow())->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
                'horizontal' => Alignment::HORIZONTAL_CENTER,

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
                $sheet = $event->sheet->getDelegate();

                // Set the title
                $title = Tugas::where('id', $this->id)->value('nama');

                // Insert a row before the headings
                $sheet->insertNewRowBefore(1, 1);

                // Set the title in the first row
                $sheet->setCellValue('A1', $title);

                // Merge cells for the title
                $sheet->mergeCells('A1:D1');

                // Style the title
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Adjust row height for the title
                $sheet->getRowDimension('1')->setRowHeight(30);

                // Set the paper size to A4
                $sheet->getPageSetup()->setPaperSize(WorksheetPageSetup::PAPERSIZE_A4);

                // Set the print area
                $highestRow = $sheet->getHighestRow();
                $sheet->getPageSetup()->setPrintArea('A1:D' . $highestRow);

                // Fit to page width
                $sheet->getPageSetup()->setFitToWidth(1);
                $sheet->getPageSetup()->setFitToHeight(0);

                // Center the sheet horizontally and vertically
                $sheet->getPageSetup()->setHorizontalCentered(true);
                $sheet->getPageSetup()->setVerticalCentered(false);

                // Set margins
                $sheet->getPageMargins()->setTop(0.75);
                $sheet->getPageMargins()->setBottom(0.75);
                $sheet->getPageMargins()->setLeft(0.7);
                $sheet->getPageMargins()->setRight(0.7);

                // Set orientation to portrait
                $sheet->getPageSetup()->setOrientation(WorksheetPageSetup::ORIENTATION_PORTRAIT);
            },
        ];
    }
}
