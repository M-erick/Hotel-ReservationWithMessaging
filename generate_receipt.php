<?php
session_start();
error_reporting(1);
include('connection.php');
require_once('tcpdf/tcpdf.php');

$oid = $_GET['order_id'];

// Fetch the booking details from the database
$sql = mysqli_query($con, "SELECT * FROM room_booking_details WHERE id='$oid'");
$result = mysqli_fetch_assoc($sql);

// Create a new TCPDF object
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new TCPDF('P', 'mm', array(90, 180), true, 'UTF-8', false);


// Set the document properties
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('E &M Hotel');
$pdf->SetTitle('Booking Receipt');
$pdf->SetSubject('Booking Receipt');
$pdf->SetKeywords('booking, receipt');

// Set the font
$pdf->SetFont('times', '', 12);

// Add a page
$pdf->AddPage();

//Set font
$pdf->SetFont('times', 'B', 16);
$pageWidth = $pdf->getPageWidth();

// Get the width of the image
$imageWidth = 30;

// Calculate the X position where the image should be placed to center it
$imageX = ($pageWidth - $imageWidth) / 2;

// Add the image to the PDF
$pdf->Image('logo12.png', $imageX, 10, $imageWidth);

$pdf->SetFont('times', '', 12);

// Add an empty cell for spacing
$pdf->Cell(0, 20, '', 0, 1);

// Add the receipt header
$pdf->WriteHTML('<h1>Booking Receipt</h1><br>');
// Add the booking details to the PDF

$pdf->WriteHTML("<p><b>Name:</b> {$result['name']}</p>");
$pdf->WriteHTML("<p><b>Email:</b> {$result['email']}</p>");
$pdf->WriteHTML("<p><b>Mobile Number:</b> {$result['phone']}</p>");
$pdf->WriteHTML("<p><b>Address:</b> {$result['address']}</p>");
$pdf->WriteHTML("<p><b>City:</b> {$result['city']}</p>");
$pdf->WriteHTML("<p><b>Room Type:</b> {$result['room_type']}</p>");
$pdf->WriteHTML("<p><b>Check In Date:</b> {$result['check_in_date']}</p>");
$pdf->WriteHTML("<p><b>Check In Time:</b> {$result['check_in_time']}</p>");
$pdf->WriteHTML("<p><b>Check Out Date:</b> {$result['check_out_date']}</p>");
$pdf->WriteHTML("<p><b>Occupancy:</b> {$result['Occupancy']}</p>");
$pdf->WriteHTML("<p><b>Status:</b> {$result['status']}</p>");



$pdf->Cell(0, 10, 'Signed: ...............',0,0,'R');
$pdf->Cell(0, 23, 'Officer Name:..............',0,0,'R');

//Add date to the PDF
date_default_timezone_set('Africa/Nairobi');
$now = date('Y-m-d H:i:s');
$pdf->SetFont('times','I',12);
$pdf->Cell(0, 38, 'Created on: ' . $now, 0, 0, 'R');
$pdf->SetFont('times','',12);


// $pdf->WriteHTML("<p><b>Signed:................</b></p>");

// Output the PDF as a download
$pdf->Output('booking_receipt.pdf', 'D');

?>