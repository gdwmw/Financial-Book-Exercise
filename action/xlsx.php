<?php
// Load the PHP Spreadsheet library
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include 'config.php';

global $conn;

// Query to fetch data from the database
$query = "SELECT * FROM bulanan";
$result = mysqli_query($conn, $query);

$bquery = "SELECT * FROM transaksi";
$bresult = mysqli_query($conn, $bquery);

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Set the active sheet index to the first sheet, and add data to it
$spreadsheet->setActiveSheetIndex(0)
    ->mergeCells("B2:E2")
    ->setCellValue('B2', 'BULANAN')
    ->setCellValue('B3', 'No')
    ->setCellValue('C3', 'Keterangan')
    ->setCellValue('D3', 'Anggaran')
    ->setCellValue('E3', 'Terpakai');

$spreadsheet->setActiveSheetIndex(0)
    ->mergeCells("G2:K2")
    ->setCellValue('G2', 'TABEL')
    ->setCellValue('G3', 'No')
    ->setCellValue('H3', 'Tanggal')
    ->setCellValue('I3', 'Jumlah')
    ->setCellValue('J3', 'Keterangan')
    ->setCellValue('K3', 'Tipe');

// Add data to the sheet
$row = 4;
$srow = 3;
for ($i = 1; $rowData = mysqli_fetch_assoc($result); $i++, $row++, $srow++) {
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('B' . $row, $i)
        ->setCellValue('C' . $row, $rowData['keterangan'])
        ->setCellValue('D' . $row, $rowData['anggaran'])
        ->setCellValue('E' . $row, $rowData['terpakai']);
}

$irow = 4;
$brow = 3;
for ($b = 1; $irowData = mysqli_fetch_assoc($bresult); $b++, $irow++, $brow++) {
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('G' . $irow, $b)
        ->setCellValue('H' . $irow, $irowData['tanggal'])
        ->setCellValue('I' . $irow, $irowData['jumlah'])
        ->setCellValue('J' . $irow, $irowData['keterangan'])
        ->setCellValue('K' . $irow, $irowData['tipe']);
}

// Add center alignment to the text
$spreadsheet->getActiveSheet()->getStyle("B2:E3")->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle("B4:B$srow")->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle("B2:E2")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffc000');
$spreadsheet->getActiveSheet()->getStyle("B3:E3")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('fcd5b4');
$spreadsheet->getActiveSheet()->getStyle("B4:B$srow")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('fcd5b4');
$spreadsheet->getActiveSheet()->getStyle("B2:E3")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle("B2:B$srow")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle("D4:D$srow")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
$spreadsheet->getActiveSheet()->getStyle("E4:E$srow")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
$spreadsheet->getActiveSheet()->getStyle('D4:D' . $srow)->getNumberFormat()->setFormatCode('"Rp.   " #,##0');
$spreadsheet->getActiveSheet()->getStyle('E4:E' . $srow)->getNumberFormat()->setFormatCode('"Rp.   " #,##0');

$spreadsheet->getActiveSheet()->getStyle("G2:K3")->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle("G4:G$brow")->getFont()->setBold(true);
$spreadsheet->getActiveSheet()->getStyle("G2:K2")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffc000');
$spreadsheet->getActiveSheet()->getStyle("G3:K3")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('fcd5b4');
$spreadsheet->getActiveSheet()->getStyle("G4:G$brow")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('fcd5b4');
$spreadsheet->getActiveSheet()->getStyle("G2:K3")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle("G4:H$brow")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle("K4:K$brow")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle("I4:I$brow")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
$spreadsheet->getActiveSheet()->getStyle('I4:I' . $brow)->getNumberFormat()->setFormatCode('"Rp.   " #,##0');

// Add all border to table
$spreadsheet->getActiveSheet()->getStyle("B2:E$srow")->applyFromArray(
    array(
        'borders' => array(
            'allBorders' => array(
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
            )
        )
    )
);

$spreadsheet->getActiveSheet()->getStyle("G2:K$brow")->applyFromArray(
    array(
        'borders' => array(
            'allBorders' => array(
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
            )
        )
    )
);

// Auto fit the table
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);

// Set the sheet title
$spreadsheet->getActiveSheet()->setTitle('Transaksi');

$filename = "Pembukuan_" . date("Y-m-d") . ".xlsx";

// Redirect output to a client's web browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Create a new Xlsx writer object
$writer = new Xlsx($spreadsheet);

// Save the spreadsheet to a file
$writer->save('php://output');

mysqli_close($conn);