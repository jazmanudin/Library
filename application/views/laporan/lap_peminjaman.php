<?php
	
	$pdf = new FPDF('P','mm','A4');
	$pdf->Addpage();
	$pdf->SetFont('Arial','B',11);

	$pdf->Cell(190,5,'ADAMA ADIFA LIBRARY',0,1,'C');
	$pdf->Cell(190,5,'KOTA TASIKMALAYA',0,1,'C');
	$pdf->SetFont('Arial','I',9);
	$pdf->Cell(190,5,'Jln. Raya Ancol No. 90 Ancol I Sindangkasih Telp.-Fax. (0265) 32985 Ciamis 46268',0,1,'C');
	$pdf->Cell(190,5,'e-mail : adamabdi.al.a@gmail.com -  web : kantin-programmer.blogspot.com',0,1,'C');
	$pdf->Cell(190,1,'','B',1,'L');
	$pdf->Cell(190,1,'','B',0,'L');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(190,5,'DATA PEMINJAMAN BUKU PERIODE '.$dari." s/d ".$sampai,0,1,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(10,5,'',0,0,'C');
	$pdf->Cell(40,5,'Kode Peminjaman',1,0,'C');
	$pdf->Cell(30,5,'Tgl Pinjam',1,0,'C');
	$pdf->Cell(30,5,'Batas Kembali',1,0,'C');
	$pdf->Cell(30,5,'Kode Anggota',1,0,'C');
	$pdf->Cell(30,5,'Nama Anggota',1,1,'C');


	//Record 
	foreach($list_peminjaman->result() as $d){
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(10,5,'',0,0,'C');
		$pdf->Cell(40,5,$d->kode_pinjam,1,0,'C');
		$pdf->Cell(30,5,$d->tgl_pinjam,1,0,'C');
		$pdf->Cell(30,5,$d->batas_kembali,1,0,'C');
		$pdf->Cell(30,5,$d->kode_anggota,1,0,'C');
		$pdf->Cell(30,5,$d->nama_anggota,1,1,'L');
	}
	$pdf->output();
?>