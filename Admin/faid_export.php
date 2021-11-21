<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;



if (isset($_POST["faid_export"])) {

    $connect = mysqli_connect("localhost", "root", "", "project");

    $query = "SELECT * FROM  donations  WHERE  (date(donations.donated_on) >= '" . $_POST["start_date"] . "' 
    AND date(donations.donated_on) <= '" . $_POST["end_date"] . "' ) ORDER BY donations.donated_on DESC ";

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

        $sheet->setCellValue('A1', 'DETAILS OF RECEIVED DONATIONS : FROM "' . $_POST["start_date"] . '" TO "' . $_POST["end_date"] . '"');
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
      


        $sheet->setCellValue('A3', "Donor's Name");
        $sheet->setCellValue('B3', "Donated Amount");
        $sheet->setCellValue('C3', "Donated On");
        $sheet->setCellValue('D3', "Receiver's Name");
        $sheet->setCellValue('E3', "Receiver's NIC");
        $sheet->setCellValue('F3', "Receiver's  Contact Number");
        $sheet->setCellValue('G3', "Receiver's Account No");
        $sheet->setCellValue('H3', "Branch");




        $row = 4;
        while ($data = mysqli_fetch_assoc($result)) {

            $sql1 = "SELECT  * FROM users WHERE id='".$data['donator_id']."'  ";
            $result1 = mysqli_query($connect, $sql1);
            $donator_data = mysqli_fetch_assoc($result1);

            $sql2 = "SELECT  * FROM users WHERE id IN (SELECT applicant_id FROM applications WHERE application_id='".$data['application_id']."')";
            $result2 = mysqli_query($connect, $sql2);
            $receiver_data = mysqli_fetch_assoc($result2);
            echo mysqli_error($connect);


            $sql3 = "SELECT  * FROM applications WHERE application_id='".$data['application_id']."'  ";
            $result3 = mysqli_query($connect, $sql3);
            $p_data = mysqli_fetch_assoc($result3);

            $sheet->setCellValue('A' . $row, $donator_data['name']);
            $sheet->setCellValue('B' . $row, $data['amount']);
            $sheet->setCellValue('C' . $row, $data['donated_on']);

            $sheet->setCellValue('D' . $row, $receiver_data['name']);
            $sheet->setCellValue('E' . $row, $receiver_data['nic']);
            $sheet->setCellValue('F' . $row, $receiver_data['contactNo']);
            $sheet->setCellValue('G' . $row, $p_data['accountNo']);
            $sheet->setCellValue('H' . $row, $p_data['branch']);

            




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
    $fileName = "Donations_Details.xlsx";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
    ob_end_clean();

    $writer->save('php://output');
}
