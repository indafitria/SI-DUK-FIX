<?php
require __DIR__ . '/../../assets/vendor/phpspreadsheet/vendor/autoload.php'; // Perbaikan path autoload.php
require '../../assets/vendor/phpspreadsheet/vendor/autoload.php';
include '../../config/koneksi.php';

// if (empty($_SESSION['username']) and empty($_SESSION['pass'])) {
//     echo "<script> window.location = '../../index.php' </script>";
// };

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$tanggalHariIni = date('d') . ' ' . ucwords(bulan(date('n'))) . ' ' . date('AA');

// Fungsi untuk mengambil nama bulan dalam huruf kapital
function bulan($bulan)
{
    $daftarBulan = [
        1 => 'JANUARI',
        2 => 'FEBRUARI',
        3 => 'MARET',
        4 => 'APRIL',
        5 => 'MEI',
        6 => 'JUNI',
        7 => 'JULI',
        8 => 'AGUSTUS',
        9 => 'SEPTEMBER',
        10 => 'OKTOBER',
        11 => 'NOVEMBER',
        12 => 'DESEMBER'
    ];

    return $daftarBulan[$bulan];
}

$tanggalHariIni1 = date('d') . ' ' . ucwords(bulan_(date('n'))) . ' ' . date('Y');

// Fungsi untuk mengambil nama bulan dalam huruf kapital
function bulan_($bulan)
{
    $daftarBulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    return $daftarBulan[$bulan];
}

$versi = "Nama Anda"; // Ganti dengan nama Anda
$today = date("Y-m-d"); // Format tanggal saat ini

$excel = new Spreadsheet();
$sheet = $excel->getActiveSheet();

$excel->getProperties()->setCreator($versi)
    ->setLastModifiedBy($today);

$sheet->getPageSetup()->setOrientation(PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

// judul
$sheet->setCellValue('A1', 'DATA KEPEGAWAIAN APARATUR SIPIL NEGARA');
$sheet->setCellValue('A2', 'PEMERINTAH PROVINSI KALIMANTAN TENGAH');
$sheet->setCellValue('A3', 'PER ' . $tanggalHariIni);

$sheet->mergeCells("A1:AA1");
$sheet->mergeCells("A2:AA2");
$sheet->mergeCells("A3:AA3");

// Gabungkan sel dan atur gaya
$mergedCellStyles = $sheet->getStyle('A1:A3');
$mergedCellStyles->applyFromArray([
    'font' => [
        'bold' => true,
        'name' => 'Times New Roman',
        'size' => 12,
    ],
]);

$mergedCellStyles = $sheet->getStyle('A5:AA5');
$mergedCellStyles->applyFromArray([
    'font' => [
        'bold' => true,
        'name' => 'Times New Roman',
        'size' => 10,
    ],
]);

$mergedCellStyles = $sheet->getStyle('A6:AA6');
$mergedCellStyles->applyFromArray([
    'font' => [
        'bold' => true,
        'name' => 'Times New Roman',
        'size' => 10,
    ],
]);

$mergedCellStyles = $sheet->getStyle('A7:AA7');
$mergedCellStyles->applyFromArray([
    'font' => [
        'bold' => true,
        'name' => 'Times New Roman',
        'size' => 10,
    ],
]);


$sheet->getStyle('A1:AA1')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP)
    ->setWrapText(true);

$sheet->getStyle('A2:AA2')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP)
    ->setWrapText(true);

$sheet->getStyle('A3:AA3')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP)
    ->setWrapText(true);


$sheet->mergeCells("A5:A6");

$sheet->setCellValue('A5', 'NO.');
$sheet->getStyle('A5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('A5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('A5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('A6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('A5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('A6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('A5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('A6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);



$sheet->setCellValue('A7', '1');
$sheet->getStyle('A7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('A7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('A7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('A7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('A7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('A7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->mergeCells("B5:B6");

$sheet->setCellValue('B5', 'NAMA');
$sheet->getStyle('B5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('B5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('B5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('B6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('B5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('B6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('B5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('B6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('B7', '2');
$sheet->getStyle('B7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('B7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('B7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('B7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('B7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('B7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->mergeCells("C5:C6");

$sheet->setCellValue('C5', 'NIP');
$sheet->getStyle('C5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('C5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('C5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('C6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('C5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('C6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('C5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('C6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->setCellValue('C7', '3');
$sheet->getStyle('C7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('C7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('C7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('C7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('C7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('C7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->mergeCells("D5:D6");

$sheet->setCellValue('D5', 'JENIS KELAMIN');
$sheet->getStyle('D5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('D5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('D5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('D6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('D5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('D6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('D5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('D6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('D7', '4');
$sheet->getStyle('D7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('D7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('D7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('D7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('D7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('D7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->mergeCells("E5:F5");

$sheet->setCellValue('E5', 'PANGKAT');
$sheet->getStyle('E5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('E5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('E5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('F5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('E5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('F5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('E5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('F5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('E6', 'GOL');
$sheet->getStyle('E6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('E6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('E6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('E6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('E6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('E6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('E7', '5');
$sheet->getStyle('E7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('E7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('E7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('E7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('E7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('E7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);



$sheet->setCellValue('F6', 'TMT');
$sheet->getStyle('F6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('F6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('F6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('F6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('F6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('F6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('F7', '6');
$sheet->getStyle('F7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('F7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('F7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('F7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('F7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('F7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);



$sheet->mergeCells("G5:I5");

$sheet->setCellValue('G5', 'JABATAN');
$sheet->getStyle('G5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('G5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('G5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('H5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('I5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('G5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('H5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('I5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('G5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('I5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('G6', 'NAMA JABATAN');
$sheet->getStyle('G6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('G6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('G6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('G6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('G6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('G6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('G7', '7');
$sheet->getStyle('G7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('G7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('G7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('G7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('G7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('G7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);



$sheet->setCellValue('H6', 'PENEMPATAN');
$sheet->getStyle('H6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('H6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('H6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('H6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('H6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('H6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->setCellValue('H7', '8');
$sheet->getStyle('H7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('H7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('H7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('H7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('H7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('H7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('I6', 'TMT');
$sheet->getStyle('I6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('I6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('I6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('I6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('I6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('I6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('I7', '9');
$sheet->getStyle('I7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('I7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('I7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('I7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('I7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('I7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->mergeCells("J5:K5");

$sheet->setCellValue('J5', 'MASA KERJA');
$sheet->getStyle('J5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('J5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('J5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('K5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('J5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('K5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('J5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('K5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('J6', 'THN');
$sheet->getStyle('J6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('J6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('J6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('J6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('J6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('J6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('J7', '10');
$sheet->getStyle('J7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('J7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('J7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('J7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('J7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('J7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('K6', 'BLN');
$sheet->getStyle('K6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('K6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('K6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('K6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('K6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('K6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('K7', '11');
$sheet->getStyle('K7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('K7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('K7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('K7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('K7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('K7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->mergeCells("L5:N5");

$sheet->setCellValue('L5', 'DIKLAT TEKNIS');
$sheet->getStyle('L5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('L5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('L5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('M5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('N5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('L5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('M5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('N5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('L5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('N5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('L6', 'NAMA');
$sheet->getStyle('L6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('L6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('L6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('L6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('L6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('L6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('L7', '12');
$sheet->getStyle('L7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('L7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('L7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('L7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('L7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('L7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('M6', 'BLN/THN');
$sheet->getStyle('M6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('M6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('M6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('M6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('M6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('M6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('M7', '13');
$sheet->getStyle('M7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('M7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('M7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('M7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('M7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('M7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->setCellValue('N6', 'JMLH JAM');
$sheet->getStyle('N6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('N6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('N6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('N6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('N6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('N6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('N7', '14');
$sheet->getStyle('N7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('N7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('N7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('N7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('N7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('N7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);



$sheet->mergeCells("O5:Q5");

$sheet->setCellValue('O5', 'DIKLAT JABATAN/FUNGSIONAL');
$sheet->getStyle('O5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('O5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('O5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('P5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Q5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('O5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('P5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Q5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('O5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Q5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('O6', 'NAMA');
$sheet->getStyle('O6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('O6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('O6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('O6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('O6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('O6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->setCellValue('O7', '15');
$sheet->getStyle('O7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('O7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('O7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('O7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('O7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('O7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->setCellValue('P6', 'BLN/THN');
$sheet->getStyle('P6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('P6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('P6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('P6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('P6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('P6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->setCellValue('P7', '16');
$sheet->getStyle('P7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('P7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('P7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('P7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('P7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('P7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->setCellValue('Q6', 'JMLH JAM');
$sheet->getStyle('Q6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('Q6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('Q6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Q6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Q6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Q6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->setCellValue('Q7', '17');
$sheet->getStyle('Q7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('Q7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('Q7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Q7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Q7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Q7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->mergeCells("R5:V5");

$sheet->setCellValue('R5', 'PENDIDIKAN');
$sheet->getStyle('R5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('R5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('R5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('S5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('T5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('U5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('V5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('R5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('S5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('T5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('U5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('V5')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('R5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('V5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('R6', 'STRATA');
$sheet->getStyle('R6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('R6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('R6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('R6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('R6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('R6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->setCellValue('R7', '18');
$sheet->getStyle('R7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('R7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('R7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('R7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('R7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('R7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('S6', 'JURUSAN');
$sheet->getStyle('S6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('S6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('S6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('S6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('S6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('S6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('S7', '19');
$sheet->getStyle('S7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('S7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('S7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('S7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('S7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('S7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->setCellValue('T6', 'KONSENTRASI');
$sheet->getStyle('T6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('T6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('T6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('T6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('T6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('T6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('T7', '20');
$sheet->getStyle('T7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('T7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('T7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('T7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('T7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('T7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('U6', 'ALUMNI');
$sheet->getStyle('U6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('U6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('U6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('U6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('U6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('U6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('U7', '21');
$sheet->getStyle('U7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);
$sheet->getStyle('U7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('U7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('U7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('U7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('U7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('V6', 'TAHUN LULUS');
$sheet->getStyle('V6')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('V6')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('V6')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('V6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('V6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('V6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('V7', '22');
$sheet->getStyle('V7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('V7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('V7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('V7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('V7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('V7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$sheet->mergeCells("W5:W6");

$sheet->setCellValue('W5', 'TEMPAT TANGGAL LAHIR');
$sheet->getStyle('W5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('W5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('W5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('W6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('W5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('W6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('W5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('W6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('W7', '23');
$sheet->getStyle('W7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('W7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('W7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('W7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('W7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('W7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->mergeCells("X5:X6");

$sheet->setCellValue('X5', 'USIA');
$sheet->getStyle('X5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('X5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('X5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('X6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('X5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('X6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('X5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('X6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('X7', '24');
$sheet->getStyle('X7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('X7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('X7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('X7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('X7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('X7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->mergeCells("Y5:Y6");

$sheet->setCellValue('Y5', 'AGAMA');
$sheet->getStyle('Y5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('Y5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('Y5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Y6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Y5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Y6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Y5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Y6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('Y7', '25');
$sheet->getStyle('Y7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('Y7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('Y7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Y7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Y7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Y7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->mergeCells("Z5:Z6");

$sheet->setCellValue('Z5', 'ALAMAT');
$sheet->getStyle('Z5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('Z5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('Z5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Z6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Z5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Z6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Z5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Z6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->setCellValue('Z7', '26');
$sheet->getStyle('Z7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('Z7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('Z7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Z7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Z7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('Z7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$sheet->mergeCells("AA5:AA6");

$sheet->setCellValue('AA5', 'CATATAN MUTASI');
$sheet->getStyle('AA5')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('AA5')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('AA5')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('AA6')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('AA5')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('AA6')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('AA5')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('AA6')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);



$sheet->setCellValue('AA7', '27');
$sheet->getStyle('AA7')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->SetVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    ->setWrapText(true);

$sheet->getStyle('AA7')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
$sheet->getStyle('AA7')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('AA7')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('AA7')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$sheet->getStyle('AA7')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);


$query = "SELECT * FROM pegawai JOIN data_pribadi ON pegawai.id_data_pribadi = data_pribadi.id_data_pribadi JOIN golongan ON pegawai.id_golongan = golongan.id_golongan JOIN data_bidang ON pegawai.id_bidang = data_bidang.id_bidang WHERE pegawai.status='Pegawai_Aktif'";
$result = mysqli_query($koneksi, $query);

// Hitung jumlah baris data dalam hasil query
$jumlahBarisData = mysqli_num_rows($result);

// Mulai baris di Excel
$startRow = 8;
$no = 1; // Nomor awal
$endColumn = 'Z'; // Kolom terakhir
$endRow = $startRow - 1;


// Lanjutkan dengan loop untuk mengisi data dan format sesuai kebutuhan
while ($row = mysqli_fetch_array($result)) {
    // $no
    $nama = $row['nama'];
    $nip = $row['nip'];
    $nip_2 = "'".$row['nip'];
    $jenis_kelamin = $row['jenis_kelamin'];
    $golongan = $row['nama_golongan'];
    $tmt_golongan = $row['tmt_golongan'];
    $jabatan = $row['jabatan'];
    $penempatan = $row['nama_bidang'];
    $tmt_jabatan = $row['tmt_jabatan'];
    $masa_kerja_tahun = $row['masa_kerja_tahun'];
    $masa_kerja_bulan = $row['masa_kerja_bulan'];
   
    $tempat_tanggal_lahir = $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'];
    $usia = $row['usia'];
    $agama = $row['agama'];
    $alamat = $row['alamat'];

    // Menempatkan nomor dan nilai atribut 'nama' dan 'jenis_kelamin' ke dalam sel Excel
    $sheet->setCellValue('A' . $startRow, $no);
    $sheet->setCellValue('B' . $startRow, $nama);
    $sheet->setCellValue('C' . $startRow, $nip_2);
    $sheet->setCellValue('D' . $startRow, $jenis_kelamin);
    $sheet->setCellValue('E' . $startRow, $golongan);
    $sheet->setCellValue('F' . $startRow, $tmt_golongan);
    $sheet->setCellValue('G' . $startRow, $jabatan);
    $sheet->setCellValue('H' . $startRow, $penempatan);
    $sheet->setCellValue('I' . $startRow, $tmt_jabatan);
    $sheet->setCellValue('J' . $startRow, $masa_kerja_tahun);
    $sheet->setCellValue('K' . $startRow, $masa_kerja_bulan);
    $sheet->setCellValue('W' . $startRow, $tempat_tanggal_lahir);
    $sheet->setCellValue('X' . $startRow, $usia);
    $sheet->setCellValue('Y' . $startRow, $agama);
    $sheet->setCellValue('Z' . $startRow, $alamat);

    for ($col = 'A'; $col <= 'AA'; $col++) {
        // Iterasi melalui setiap kolom dan terapkan format yang sama
        $sheet->getStyle($col . $startRow)
            ->getFont()
            ->getColor()
            ->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);

        $sheet->getStyle($col . $startRow . ':' . $col . $startRow)
            ->getFont()
            ->setName('Times New Roman')
            ->setSize(10);

        $sheet->getStyle($col . $startRow)
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setWrapText(true);
    }


    $endColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString('AA');
    
    for ($col = 1; $col <= $endColumnIndex; $col++) {
        $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
        
        // Apply left and right borders
        $sheet->getStyle($colLetter . $startRow)
            ->getBorders()
            ->getRight()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
    
        $sheet->getStyle($colLetter . $startRow)
            ->getBorders()
            ->getLeft()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

            $sheet->getStyle($colLetter . $startRow)
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setWrapText(true);
           
    }

    $sheet->getStyle('AA' . $startRow)
        ->getAlignment()
        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

    $queryTeknis = "SELECT * FROM riwayat_diklat JOIN pegawai ON riwayat_diklat.nip = pegawai.nip WHERE jenis_diklat = 'Teknis' AND pegawai.nip = '$nip' ORDER BY riwayat_diklat.tahun_diklat ASC LIMIT 1";

    $resultTeknis = mysqli_query($koneksi, $queryTeknis);
    $jumlahBarisDataTeknis = mysqli_num_rows($resultTeknis);

    if ($teknis = mysqli_fetch_array($resultTeknis)) {
        $nama_diklat = $teknis['nama_diklat'];
        $tahun_diklat = $teknis['tahun_diklat'];
        $jmlh_jam = $teknis['jmlh_jam'];

        // Menempatkan nomor dan nilai atribut 'nama' dan 'jenis_kelamin' ke dalam sel Excel
        $sheet->setCellValue('L' . $startRow, $nama_diklat);
        $sheet->setCellValue('M' . $startRow, $tahun_diklat);
        $sheet->setCellValue('N' . $startRow, $jmlh_jam);
    }

    $queryJabatan = "SELECT * FROM riwayat_diklat JOIN pegawai ON riwayat_diklat.nip = pegawai.nip WHERE jenis_diklat = 'Jabatan' AND pegawai.nip = '$nip' ORDER BY riwayat_diklat.tahun_diklat ASC LIMIT 1";

    $resultJabatan = mysqli_query($koneksi, $queryJabatan);
    $jumlahBarisDataJabatan = mysqli_num_rows($resultJabatan);

    if ($jab = mysqli_fetch_array($resultJabatan)) {
        $nama_diklat = $jab['nama_diklat'];
        $tahun_diklat = $jab['tahun_diklat'];
        $jmlh_jam = $jab['jmlh_jam'];

        // Menempatkan nomor dan nilai atribut 'nama' dan 'jenis_kelamin' ke dalam sel Excel
        $sheet->setCellValue('O' . $startRow, $nama_diklat);
        $sheet->setCellValue('P' . $startRow, $tahun_diklat);
        $sheet->setCellValue('Q' . $startRow, $jmlh_jam);
    }


    $queryPendidikan = "SELECT * FROM riwayat_pendidikan WHERE nip = '$nip' ORDER BY tahun_lulus DESC limit 1";
    $resultPendidikan = mysqli_query($koneksi, $queryPendidikan);
    $jumlahBarisDataPendidikan = mysqli_num_rows($resultPendidikan);

    if ($pend = mysqli_fetch_array($resultPendidikan)) {
        $strata = $pend['strata'];
        $jurusan = $pend['jurusan'];
        $konsen = $pend['konsentrasi'];
        $alumni = $pend['nama_kampus'];
        $tahun_lulus = $pend['tahun_lulus'];

        // Menempatkan nomor dan nilai atribut 'nama' dan 'jenis_kelamin' ke dalam sel Excel
        $sheet->setCellValue('R' . $startRow, $strata);
        $sheet->setCellValue('S' . $startRow, $jurusan);
        $sheet->setCellValue('T' . $startRow, $konsen);
        $sheet->setCellValue('U' . $startRow, $alumni);
        $sheet->setCellValue('V' . $startRow, $tahun_lulus);
    }


    $queryMutasi = "SELECT catatan_mutasi FROM riwayat_mutasi WHERE nip = '$nip' AND tmt_mutasi < (SELECT MAX(tmt_mutasi) FROM riwayat_mutasi)";
    $resultMutasi = mysqli_query($koneksi, $queryMutasi);
    $number = 1; // Inisialisasi nomor urutan

    // Loop melalui hasil query
    while ($pend = mysqli_fetch_array($resultMutasi)) {
        $catatan_mutasi = $number . '.' . $pend['catatan_mutasi'];

        // Menempatkan nomor dan nilai atribut 'catatan_mutasi' ke dalam sel Excel
        $sheet->setCellValue('AA' . $startRow, $catatan_mutasi);
        $sheet->getStyle('AA' . $startRow)
        ->getBorders()
        ->getRight()
        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $number++; // Tambahkan nomor urutan untuk catatan mutasi berikutnya
    }

    $no++;
    $startRow++;
}




$endRow = $startRow - 1;

// Tambahkan border bawah pada baris terakhir
$sheet->getStyle('A' . $endRow . ':' . 'AA' . $endRow)
    ->getBorders()
    ->getBottom()
    ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

$rowTTD = $endRow + 3;
$rowTTD_1 = $rowTTD + 1;
$rowTTD_2 = $rowTTD_1 + 6;
$rowTTD_3 = $rowTTD_2 + 1;

$sheet->setCellValue('AA' . $rowTTD, 'Palangka Raya, ' . $tanggalHariIni1);
$sheet->setCellValue('AA' . $rowTTD_1, 'Kepala Dinas,');
$sheet->setCellValue('AA' . $rowTTD_2, 'Agus Siswadi');
$sheet->setCellValue('AA' . $rowTTD_3, 'NIP.19680204 199903 1 007');

$sheet->getStyle('AA' . $rowTTD . ':' . 'AA' . $rowTTD_3)
    ->getFont()
    ->setName('Times New Roman')
    ->setSize(10);

//

$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(35);
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(30);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(30);
$sheet->getColumnDimension('H')->setWidth(20);
$sheet->getColumnDimension('I')->setWidth(15);
$sheet->getColumnDimension('J')->setWidth(8);
$sheet->getColumnDimension('K')->setWidth(8);
$sheet->getColumnDimension('L')->setWidth(25);
$sheet->getColumnDimension('M')->setWidth(10);
$sheet->getColumnDimension('N')->setWidth(8);
$sheet->getColumnDimension('O')->setWidth(25);
$sheet->getColumnDimension('P')->setWidth(10);
$sheet->getColumnDimension('Q')->setWidth(8);
$sheet->getColumnDimension('R')->setWidth(8);
$sheet->getColumnDimension('S')->setWidth(20);
$sheet->getColumnDimension('T')->setWidth(30);
$sheet->getColumnDimension('U')->setWidth(30);
$sheet->getColumnDimension('V')->setWidth(8);
$sheet->getColumnDimension('W')->setWidth(40);
$sheet->getColumnDimension('X')->setWidth(30);
$sheet->getColumnDimension('Y')->setWidth(20);
$sheet->getColumnDimension('Z')->setWidth(20);
$sheet->getColumnDimension('AA')->setWidth(50);
// $sheet->getRowDimension(10)->setRowHeight(50);
// $sheet->getRowDimension("1")->setRowHeight(50);

// Simpan file Excel
$writer = new Xlsx($excel);
$nama_file = 'Data Kepegawaian.xlsx'; // Ganti dengan nama file yang diinginkan

// Atur header agar file dapat diunduh
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nama_file . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');

// Pastikan untuk mengakhiri eksekusi skrip setelah ini
exit;
