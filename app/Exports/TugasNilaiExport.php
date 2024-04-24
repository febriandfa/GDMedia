<?php

namespace App\Exports;
use App\Models\Tugas;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

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
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
