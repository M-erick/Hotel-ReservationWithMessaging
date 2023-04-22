<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');
include('../connection.php');

// Create a new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Hotel Reservation System');
$pdf->SetAuthor('Admin');
$pdf->SetTitle('Room Booking Details');
$pdf->SetSubject('Room Booking Details');
$pdf->SetKeywords('room, booking, details');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('times', 'B', 16);
$pageWidth = $pdf->getPageWidth();

// Get the width of the image
$imageWidth = 30;

// Calculate the X position where the image should be placed to center it
$imageX = ($pageWidth - $imageWidth) / 2;

// Add the image to the PDF
$pdf->Image('logo12.png', $imageX, 10, $imageWidth);


// Add an empty cell for spacing
$pdf->Cell(0, 15, '', 0, 1);

// Add a heading
$pdf->Cell(0, 15, 'Room Booking Details', 0, 1, 'C');

// Set font size
$pdf->SetFont('times', '', 12);

// Create a table
$html = '<table border="1">
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Room Type</th>
                <th>Check in Date</th>
                <th>Check Out Time</th>
                <th>Check Out Date</th>
                <th>Occupancy</th>
                <th>Status</th>

            </tr>';

$i=1;
$sql=mysqli_query($con,"select * from room_booking_details");
while($res=mysqli_fetch_assoc($sql))
{
    $html .= '<tr>
                <td>'. $i .'</td>
                <td>'. $res['name'] .'</td>
                <td>'. $res['email'] .'</td>
                <td>'. $res['phone'] .'</td>
                <td>'. $res['room_type'] .'</td>
                <td>'. $res['check_in_date'] .'</td>
                <td>'. $res['check_in_time'] .'</td>
                <td>'. $res['check_out_date'] .'</td>
                <td>'. $res['Occupancy'] .'</td>
                <td>'. $res['status'] .'</td>

            </tr>';
    $i++;
}

$html .= '</table>';

$pdf->writeHTML($html);

// Output the PDF to the browser
$pdf->Output('room_booking_details.pdf', 'D');
?>
