<?php
//code to show errors in php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //using tdpdcf for the pdf
    require_once('/Applications/XAMPP/xamppfiles/htdocs/new/TCPDF-main/tcpdf.php');

// connecting to the database
    $con = mysqli_connect("localhost", "root", "", "DonerKebab");

    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
    exit();
}

// This to get today date
$todayDate = date('Y-m-d');

//following query for quantities sold and total price. using joint functionality to get the data from the product table with foreing keys.
$queryQuantities = "SELECT
    p.ProductName AS ProductName,
    SUM(od.quantity) AS TotalQuantity,
    SUM(od.quantity * p.ProductPrice) AS TotalPrice
    FROM
        order_details od
    JOIN
        orders o ON od.order_id = o.order_id
    JOIN
        Products p ON od.product_id = p.ProductId
    WHERE
        DATE(o.order_date) = '$todayDate'
    GROUP BY
        p.ProductName";

    $resultQuantities = $con->query($queryQuantities);

    $dataQuantities = array();

    if ($resultQuantities->num_rows > 0) {
        while ($row = $resultQuantities->fetch_assoc()) {
            $dataQuantities[$row['ProductName']] = array(
                'TotalQuantity' => $row['TotalQuantity'],
                'TotalPrice' => $row['TotalPrice']
            );
        }
    }
//closing the connection
$con->close();

// create a new TCPDF instance for the pdf
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// adding a new page for quantities sold
$pdf->AddPage();
generateChart($pdf, $dataQuantities, '92 Doner Kebab - Quantities Sold - ' . $todayDate);

// following code to output the PDF into the browser
$pdf->Output('combined_charts.pdf', 'I');
exit;

//following code is for thr chart generation which includes details about the chart
function generateChart($pdf, $data, $title)
{
    // chart font
    $pdf->SetFont('helvetica', 'B', 14);

    //inserting title with today's date
    $pdf->Cell(0, 10, $title, 0, 1, 'C');

    // font inside the table
    $pdf->SetFont('helvetica', '', 12);

    //  positioning to center of the page
    $tableWidth = 180; 
    $xPos = ($pdf->getPageWidth() - $tableWidth) / 2;

    $pdf->SetFillColor(75, 192, 192);
    $pdf->SetDrawColor(75, 192, 192);
    $pdf->SetLineWidth(1);

    $pdf->SetX($xPos);
    $pdf->Cell(60, 10, 'Product', 1, 0, 'C', 1);
    $pdf->Cell(60, 10, 'Quantity', 1, 0, 'C', 1);
    $pdf->Cell(60, 10, 'Total Price', 1, 1, 'C', 1);

    // tables data which is coming from the database
    foreach ($data as $key => $values) {
        $productName = is_string($key) ? $key : $values['ProductName'];
        $totalQuantity = is_string($key) ? $values['TotalQuantity'] : $values['TotalQuantity'];
        $totalPrice = is_string($key) ? $values['TotalPrice'] : $values['TotalPrice'];

        $pdf->SetX($xPos);
        $pdf->Cell(60, 10, $productName, 1);
        $pdf->Cell(60, 10, $totalQuantity, 1, 0, 'C');
        $pdf->Cell(60, 10, $totalPrice, 1, 1, 'C');
    }
}
?>
