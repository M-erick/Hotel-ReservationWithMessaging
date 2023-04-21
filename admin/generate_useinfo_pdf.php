<?php
require_once('tcpdf/tcpdf.php');
include('../connection.php');

// Create a new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('User Registration');
$pdf->SetAuthor('Admin');
$pdf->SetTitle('User Registration Details');
$pdf->SetSubject('User Registration Details');
$pdf->SetKeywords('user, registration, details');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('times', 'B', 16);
// Get the width of the page

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
$pdf->Cell(0, 10, 'User Registration Details', 0, 1, 'C');

// Set font size
$pdf->SetFont('times', '', 12);

// Create a table
$html = '<table border="1">
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Country</th>
            </tr>';

$i=1;
$sql=mysqli_query($con,"select * from create_account");
while($res=mysqli_fetch_assoc($sql))
{
    $html .= '<tr>
                <td>'. $i .'</td>
                <td>'. $res['name'] .'</td>
                <td>'. $res['email'] .'</td>
                <td>'. $res['password'] .'</td>
                <td>'. $res['mobile'] .'</td>
                <td>'. $res['address'] .'</td>
                <td>'. $res['gender'] .'</td>
                <td>'. $res['country'] .'</td>
            </tr>';
    $i++;
}

$html .= '</table>';
$pdf->writeHTML($html);

// Output the PDF to the browser
$pdf->Output('user_registration_details.pdf', 'D');
?>
