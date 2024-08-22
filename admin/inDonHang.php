<?php
require('../fpdf/fpdf.php');
include '../classes/adminCategory.php';
$invoiceData = [
    'company' => 'Công ty ABC',
    'address' => '123 Đường XYZ, Thành phố ABC',
    'phone' => '0359941187',
    'email' => 'info@abc.com',
    'invoice_number' => 'HD-001',
    'date' => date('d/m/Y'),
    'customer_name' => 'Le Tuan Hung',
    'customer_address' => 'Xuan Phuong, Ha Noi',
    'items' => [
        ['description' => 'Sản phẩm 1', 'quantity' => 2, 'price' => 100000],
        ['description' => 'Sản phẩm 2', 'quantity' => 1, 'price' => 200000],
        ['description' => 'Sản phẩm 3', 'quantity' => 3, 'price' => 150000],
    ]
];
$category = new adminCategory();
$productList = $category->getAllOrders2();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Hoa don so: ' . $invoiceData['invoice_number'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Ngay: ' . $invoiceData['date'], 0, 1, 'L');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Thong tin khach hang:', 0, 1, 'L');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Ten: ' . $invoiceData['customer_name'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Dia chi: ' . $invoiceData['customer_address'], 0, 1, 'L');
$pdf->Cell(0, 10, 'So dien thoai: ' . $invoiceData['phone'], 0, 1, 'L');
$pdf->Ln(10);

// Bảng chi tiết sản phẩm

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'STT', 1);
$pdf->Cell(100, 10, 'Ten san pham', 1);
$pdf->Cell(30, 10, 'So luong', 1);
$pdf->Cell(40, 10, 'Thanh tien', 1);

$pdf->Ln(10);

$total = 0;
$pdf->SetFont('Arial', '', 12);
while($result = $productList->fetch_assoc()) {
    $total++;
    $pdf->Cell(10, 10,  $total, 1);
    $pdf->Cell(100, 10, $result['product_name'], 1);
    $pdf->Cell(30, 10, ($result['quantity']), 1);
    $pdf->Cell(40, 10, ($result['total_price'] . '.000'), 1);
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Write(10,'Tong tien: ' . ($result['total_price'] . '.000'));
    $pdf->Ln(10);
    $pdf->Write(10,'VAT: ' . '0');
    $pdf->Ln(10);
    $pdf->Write(10,'Tong tien can thanh toan: ' . ($result['total_price'] . '.000'));
 }
 $pdf->Ln(10);
 $pdf->SetFont('Arial', 'B', 12);
 $pdf->Write(20,'Cam on ban da dat hang tai website cua chung toi.');
 $pdf->Ln(10);
    $pdf->Output();
?>