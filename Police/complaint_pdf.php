<?php
require_once "config.php";

require('fpdf.php');

$complaint_id = $_GET['complaint_id'];


$profile = mysqli_query($link, "SELECT * FROM complaints WHERE complaint_id ='" . $complaint_id . "'");
$row = mysqli_fetch_assoc($profile);

$complainant_id = $row['complainant_id'];
$profile1 = mysqli_query($link, "SELECT * FROM users WHERE id ='" . $complainant_id . "'");
$data = mysqli_fetch_assoc($profile1);


$pdf = new FPDF('p', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetLeftMargin(15.0);
$pdf->SetRightMargin(10.0);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'COMPLAINT FORM', 0, 1, 'C');
$pdf->ln(5);
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(178,10,'Details I',1,0,'C');

$pdf->ln(15);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40,10,'Complaint Title :');
$pdf->Cell(40,10, $row['title']);

$pdf->ln(10);
$pdf->SetFont('Arial', 'BU', 12);
$pdf->Cell(40,10,'Details of Complainant');
$pdf->ln(10);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40,10,'Name :');
$pdf->Cell(40,10,$data['name'],0,0,'L');
$pdf->ln(10);

$pdf->Cell(40,10,'Address :');
$pdf->Cell(40,10,$data['homeAddress'],0,0,'L');
$pdf->ln(10);
$pdf->Cell(40,10,'NIC Number :');
$pdf->Cell(40,10,$data['nic'],0,0,'L');

$pdf->ln(10);
$pdf->Cell(40,10,'Email Adress :');
$pdf->Cell(40,10,$data['email'],0,0,'L');

$pdf->ln(10);
$pdf->Cell(40,10,'Contact Number :');
$pdf->Cell(40,10,$data['contactNo'],0,0,'L');

$pdf->ln(10);

$pdf->SetFont('Arial', 'BU', 12);
$pdf->Cell(40,10,'Details of Victim');
$pdf->ln(10);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40,10,'Name :');
$pdf->Cell(40,10,$row['victim_name'],0,0,'L');


$pdf->ln(10);

$pdf->Cell(40,10,'Address :');
$pdf->Cell(40,10,$row['victim_addr'],0,0,'L');

$pdf->ln(10);
$pdf->Cell(40,10,'District :');$pdf->Cell(40,10,$row['victim_dist'],0,0,'L');

$pdf->ln(10);
$pdf->Cell(40,10,'Contact Number :');$pdf->Cell(40,10,$row['victim_contact'],0,0,'L');

$pdf->ln(10);
$pdf->Cell(40,10,'Email Adress :');$pdf->Cell(40,10,$row['victim_email'],0,0,'L');

$pdf->ln(10);
$pdf->Cell(40,10,'NIC Number :');$pdf->Cell(40,10,$row['victim_nic'],0,0,'L');

$pdf->ln(10);

$pdf->Cell(40,10,'Age :');$pdf->Cell(40,10,$row['victim_age'],0,0,'L');

$pdf->ln(15);

$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(178,10,'Details II',1,0,'C');

$pdf->ln(15);

$pdf->SetFont('Arial', 'BU', 12);
$pdf->Cell(40,10,'Details of Respondant (Accused Party)');
$pdf->ln(10);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40,10,'Name :');$pdf->Cell(40,10,$row['res_name'],0,0,'L');
$pdf->ln(10);

$pdf->Cell(40,10,'Address :');$pdf->Cell(40,10,$row['res_addr'],0,0,'L');
$pdf->ln(10);
$pdf->Cell(40,10,'District :');$pdf->Cell(40,10,$row['res_dist'],0,0,'L');
$pdf->ln(10);
$pdf->Cell(40,10,'Sex:');$pdf->Cell(40,10,$row['res_sex'],0,0,'L');
$pdf->ln(10);
$pdf->Cell(40,10,'Age :');$pdf->Cell(40,10,$row['res_age'],0,0,'L');
$pdf->ln(10);
$pdf->Cell(40,10,'Physical Description of Accused person :');
$pdf->ln(8);

$pdf->MultiCell(178,8,$row['res_desc']);
$pdf->ln(10);

$pdf->SetFont('Arial', 'BU', 12);
$pdf->Cell(40,10,'Details of Witnesse"s');
$pdf->ln(10);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(20,10,'Name :');$pdf->Cell(40,10,$row['wit1_name'],0,0,'L');

$pdf->Cell(40,10,'Contact Number :');$pdf->Cell(40,10,$row['wit1_contact'],0,0,'L');
$pdf->ln(10);
$pdf->Cell(20,10,'Name :');$pdf->Cell(40,10,$row['wit2_name'],0,0,'L');

$pdf->Cell(40,10,'Contact Number:');$pdf->Cell(40,10,$row['wit2_contact'],0,0,'L');
$pdf->ln(12);



$pdf->SetFont('Arial', 'BU', 12);
$pdf->Cell(40,10,'Details of the incident');
$pdf->ln(10);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(40,10,'Date of the incident :');$pdf->Cell(40,10,$row['incident_date'],0,0,'L');
$pdf->ln(10);

$pdf->Cell(70,10,'Location where the incident occured  :');$pdf->Cell(40,10,$row['incident_location'],0,0,'L');
$pdf->ln(10);
$pdf->Cell(40,10,'Physical & Emotional State of Victim (Describe any cuts, bruises, lacerations, behaviour, and mood) :');
$pdf->ln(8);
$pdf->MultiCell(178,8,$row['victim_state']);
$pdf->ln(5);
$pdf->Cell(40,10,'Brief Description of Incident :');
$pdf->ln(8);
$pdf->MultiCell(178,8,$row['incident_desc']);
$pdf->ln(10);




$pdf->Output();
//$pdf->Output('my_file.pdf','I'); // Send to browser and display
