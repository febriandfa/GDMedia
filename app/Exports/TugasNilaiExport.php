<?php

namespace App\Exports;

use App\Models\Tugas;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class TugasNilaiExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
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
                'Absen Siswa' => $tugas->user->absen,
                'Kelompok' => $tugas->kelompok->name,
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
            'Absen Siswa',
            'Kelompok',
            'Nilai'
        ];
    }

    public function styles(Worksheet $sheet)
    {
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
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Apply specific column widths if ShouldAutoSize is not used
        // $sheet->getColumnDimension('A')->setWidth(5);
        // $sheet->getColumnDimension('B')->setWidth(20);
        // $sheet->getColumnDimension('C')->setWidth(20);
        // $sheet->getColumnDimension('D')->setWidth(15);
        // $sheet->getColumnDimension('E')->setWidth(20);
        // $sheet->getColumnDimension('F')->setWidth(10);

        // Optional: Apply number formatting to the 'Nilai' column
        // $sheet->getStyle('F2:F' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode('#,##0.00');

        return [
            // Optional: set row height if needed
            '1' => ['height' => 30],
        ];
    }
}
