<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;



if (isset($_POST["complaints_export"])) {

    $connect = mysqli_connect("localhost", "root", "", "project");

    $query = "SELECT * FROM  complaints  WHERE  (date(complaints.created_at) >= '" . $_POST["start_date"] . "' 
    AND date(complaints.created_at) <= '" . $_POST["end_date"] . "' ) ORDER BY complaints.created_at DESC ";

    $result = mysqli_query($connect, $query);

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);
    $sheet->getColumnDimension('H')->setAutoSize(true);

    if (mysqli_num_rows($result) > 0) {

        $sheet->setCellValue('A1', 'DETAILS OF RECEIVED COMPLAINTS : FROM "' . $_POST["start_date"] . '" TO "' . $_POST["end_date"] . '"');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->mergeCells('A1:H1');

        $sheet->getStyle('A3:H3')->getFont()->setBold(true);

        $row = 3;
        $sheet->getStyle('A' . $row)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(Border::BORDER_MEDIUM)
            ->setColor(new Color('000000'));


        $sheet->getStyle('B' . $row)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(Border::BORDER_MEDIUM)
            ->setColor(new Color('000000'));

        $sheet->getStyle('C' . $row)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(Border::BORDER_MEDIUM)
            ->setColor(new Color('000000'));

        $sheet->getStyle('D' . $row)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(Border::BORDER_MEDIUM)
            ->setColor(new Color('000000'));

        $sheet->getStyle('E' . $row)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(Border::BORDER_MEDIUM)
            ->setColor(new Color('000000'));
        $sheet->getStyle('F' . $row)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(Border::BORDER_MEDIUM)
            ->setColor(new Color('000000'));
        $sheet->getStyle('G' . $row)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(Border::BORDER_MEDIUM)
            ->setColor(new Color('000000'));
            $sheet->getStyle('H' . $row)
            ->getBorders()
            ->getOutline()
            ->setBorderStyle(Border::BORDER_MEDIUM)
            ->setColor(new Color('000000'));
      


        $sheet->setCellValue('A3', "Complainant's Name");
        $sheet->setCellValue('B3', "Complainant's NIC");
        $sheet->setCellValue('C3', "Complainant's  Contact Number");

        $sheet->setCellValue('D3', 'Filed On');
        $sheet->setCellValue('E3', 'Category');
        $sheet->setCellValue('F3', 'District');
        $sheet->setCellValue('G3', 'Transferered To');
        $sheet->setCellValue('H3', 'Status ');




        $row = 4;
        while ($data = mysqli_fetch_assoc($result)) {

            $sql1 = "SELECT  * FROM users WHERE id='".$data['complainant_id']."'  ";
            $result1 = mysqli_query($connect, $sql1);
            $user_data = mysqli_fetch_assoc($result1);

            $sql2 = "SELECT  police_name FROM police_users WHERE police_id='".$data['police_id']."'  ";
            $result2 = mysqli_query($connect, $sql2);
            $p_data = mysqli_fetch_assoc($result2);

            $sheet->setCellValue('A' . $row, $user_data['name']);
            $sheet->setCellValue('B' . $row, $user_data['nic']);
            $sheet->setCellValue('C' . $row, $user_data['contactNo']);
            $sheet->setCellValue('D' . $row, $data['created_at']);
            $sheet->setCellValue('E' . $row, $data['title']);
            $sheet->setCellValue('F' . $row, $data['victim_dist']);
            $sheet->setCellValue('G' . $row, $p_data['police_name']);
            $sheet->setCellValue('H' . $row, $data['state']);

            




            $sheet->getStyle('A' . $row)
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THIN)
                ->setColor(new Color('000000'));


            $sheet->getStyle('B' . $row)
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THIN)
                ->setColor(new Color('000000'));

            $sheet->getStyle('C' . $row)
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THIN)
                ->setColor(new Color('000000'));

            $sheet->getStyle('D' . $row)
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THIN)
                ->setColor(new Color('000000'));

            $sheet->getStyle('E' . $row)
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THIN)
                ->setColor(new Color('000000'));
            $sheet->getStyle('F' . $row)
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THIN)
                ->setColor(new Color('000000'));

            $sheet->getStyle('G' . $row)
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THIN)
                ->setColor(new Color('000000'));

                $sheet->getStyle('H' . $row)
                ->getBorders()
                ->getOutline()
                ->setBorderStyle(Border::BORDER_THIN)
                ->setColor(new Color('000000'));

            $row++;
        }
    }



    $writer = new Xlsx($spreadsheet);
    $fileName = "Complaint_Details.xlsx";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
    ob_end_clean();

    $writer->save('php://output');
}
