<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "prplhotel";
$konek = new mysqli($host, $username, $password, $db_name);

require('pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('N.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Hotel Noni',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : (0741) 3061555',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jalan Mpu Gandring No.72, Solok Sipin, Telanaipura, Kota Jambi, Jambi 36124',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Nota Pembayaran Hotel",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->SetX(2);
$pdf->Cell(4, 0.8, 'Nama Customer', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal Checkin', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal Checkout', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Durasi Inap', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nama Kamar', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Harga Per Malam', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'PPN 10%', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$pdf->SetX(2);
$id_customer = $_GET['id_customer'];

$sql = "SELECT * FROM customer where id_customer = '$id_customer'";
$data = $konek->query($sql);

if ($data->num_rows > 0){
	$no = 1;
	while ($cetak = $data->fetch_assoc()) {
		$ppn = $cetak['harga_kamar']*0.10*$cetak['jumlahinap'];
		$pdf->Cell(4, 0.8, $cetak['nama'],1, 0, 'C');
		$pdf->Cell(4, 0.8, $cetak['checkin'],1, 0, 'C');
		$pdf->Cell(4, 0.8, $cetak['checkout'], 1, 0,'C');
		$pdf->Cell(2.5, 0.8, $cetak['jumlahinap'], 1, 0, 'C');
		$pdf->Cell(3, 0.8, $cetak['type_kamar'],1, 0, 'C');
		$pdf->Cell(5, 0.8, "Rp. ".$cetak['harga_kamar'], 1, 0,'C');
		$pdf->Cell(3, 0.8, 'RP. '.$ppn, 1, 1, 'C');
		$no++;
	}
}
$pdf->SetFont('Arial','B',11);
$pdf->SetX(2);
$pdf->Cell(17.5, 0.8, 'Total Pembayaran', 1, 0, 'C');
$sql2 = "SELECT * FROM customer where id_customer = '$id_customer'";
$pdf->SetFont('Arial','',10);
$data2 = $konek->query($sql2);
if ($data2->num_rows > 0){
	while ($cetak = $data2->fetch_assoc()) {
		$pdf->Cell(8, 0.8,"Rp. ".$cetak['total'],1, 1, 'C');
	}
}

$pdf->Output("resi_customer.pdf","I");

?>