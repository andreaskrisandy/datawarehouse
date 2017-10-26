<?php

// Load file koneksi.php
include "koneksi.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';

	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';

	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp

	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

	// Buat query Insert
	$sql = $pdo->prepare("INSERT INTO lb_1 VALUES(:id,:kode,:penyakit,:1BL,:1BP,:1LL,:1LP,:2BL,:2BP,:2LL,:2LP,:3BL,:3BP,:3LL,:3LP,:4BL,:4BP,:4LL,:4LP,:5BL,:5BP,:5LL,:5LP,:6BL,:6BP,:6LL,:6LP,:7BL,:7BP,:7LL,:7LP,:8BL,:8BP,:8LL,:8LP,:9BL,:9BP,:9LL,:9LP,:10BL,:10BP,:10LL,:10LP,:11BL,:11BP,:11LL,:11LP,:12BL,:12BP,:12LL,:12LP,:total_baru_l,:total_baru_p,:total_lama_l,:total_lama_p,:total_jumlah)");

	$numrow = 3;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$id = $row['A']; // Ambil data NIS
		$kode = $row['B']; // Ambil data nama
		$penyakit = $row['C']; // Ambil data jenis kelamin
		$satuBL = $row['D'];
		$satuBP = $row['E'];
		$satuLL = $row['F'];
		$satuLP = $row['G'];
		$duaBL = $row['H'];
		$duaBP = $row['I'];
		$duaLL = $row['J'];
		$duaLP = $row['K'];
		$tigaBL = $row['L'];
		$tigaBP = $row['M'];
		$tigaLL = $row['N'];
		$tigaLP = $row['O'];
		$empatBL = $row['P'];
		$empatBP = $row['Q'];
		$empatLL = $row['R'];
		$empatLP = $row['S'];
		$limaBL = $row['T'];
		$limaBP = $row['U'];
		$limaLL = $row['V'];
		$limaLP = $row['W'];
		$enamBL = $row['X'];
		$enamBP = $row['Y'];
		$enamLL = $row['Z'];
		$enamLP = $row['AA'];
		$tujuhBL = $row['AB'];
		$tujuhBP = $row['AC'];
		$tujuhLL = $row['AD'];
		$tujuhLP = $row['AE'];
		$delapanBL = $row['AF'];
		$delapanBP = $row['AG'];
		$delapanLL = $row['AH'];
		$delapanLP = $row['AI'];
		$sembilanBL = $row['AJ'];
		$sembilanBP = $row['AK'];
		$sembilanLL = $row['AL'];
		$sembilanLP = $row['AM'];
		$sepuluhBL = $row['AN'];
		$sepuluhBP = $row['AO'];
		$sepuluhLL = $row['AP'];
		$sepuluhLP = $row['AQ'];
		$sebelasBL = $row['AR'];
		$sebelasBP = $row['AS'];
		$sebelasLL = $row['AT'];
		$sebelasLP = $row['AU'];
		$duabelasBL = $row['AV'];
		$duabelasBP = $row['AW'];
		$duabelasLL = $row['AX'];
		$duabelasLP = $row['AY'];
		$total_baru_l = $row['AZ'];
		$total_baru_p = $row['BA'];
		$total_lama_l = $row['BB'];
		$total_lama_p = $row['BC'];
		$total_jumlah = $row['BD'];

		// // Cek jika semua data tidak diisi
		if(is_null($id) && is_null($kode) && is_null($penyakit) && is_null($satuBL) && is_null($satuBP) && is_null($satuLL) && is_null($satuLP)
		&& is_null($duaBL) && is_null($duaBP) && is_null($duaLL) && is_null($duaLP) && is_null($tigaBL) && is_null($tigaBP) && is_null($tigaLL) && is_null($tigaLP)
		&& is_null($empatBL) && is_null($empatBP) && is_null($empatLL) && is_null($empatLP) && is_null($limaBL) && is_null($limaBP) && is_null($limaLL) && is_null($limaLP)
		&& is_null($enamBL) && is_null($enamBP) && is_null($enamLL) && is_null($enamLP) && is_null($tujuhBL) && is_null($tujuhBP) && is_null($tujuhLL) && is_null($tujuhLP)
		&& is_null($delapanBL) && is_null($delapanBP) && is_null($delapanLL) && is_null($delapanLP) && is_null($sembilanBL) && is_null($sembilanBP) && is_null($sembilanLL) && is_null($sembilanLP)
		&& is_null($sepuluhBL) && is_null($sepuluhBP) && is_null($sepuluhLL) && is_null($sepuluhLP) && is_null($sebelasBL) && is_null($sebelasBP) && is_null($sebelasLL) && is_null($sebelasLP)
		&& is_null($duabelasBL) && is_null($duabelasBP) && is_null($duabelasLL) && is_null($duabelasLP)&& is_null($total_baru_l) && is_null($total_baru_p) && is_null($total_lama_l) && is_null($total_lama_p) && is_null($total_jumlah))
		continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 3){
			// Proses simpan ke Database
			$sql->bindParam(':id', $id);
			$sql->bindParam(':kode', $kode);
			$sql->bindParam(':penyakit', $penyakit);
			$sql->bindParam(':1BL', $satuBL);
			$sql->bindParam(':1BP', $satuBP);
			$sql->bindParam(':1LL', $satuLL);
			$sql->bindParam(':1LP', $satuLP);
			$sql->bindParam(':2BL', $duaBL);
			$sql->bindParam(':2BP', $duaBP);
			$sql->bindParam(':2LL', $duaLL);
			$sql->bindParam(':2LP', $duaLP);
			$sql->bindParam(':3BL', $tigaBL);
			$sql->bindParam(':3BP', $tigaBP);
			$sql->bindParam(':3LL', $tigaLL);
			$sql->bindParam(':3LP', $tigaLP);
			$sql->bindParam(':4BL', $empatBL);
			$sql->bindParam(':4BP', $empatBP);
			$sql->bindParam(':4LL', $empatLL);
			$sql->bindParam(':4LP', $empatLP);
			$sql->bindParam(':5BL', $limaBL);
			$sql->bindParam(':5BP', $limaBP);
			$sql->bindParam(':5LL', $limaLL);
			$sql->bindParam(':5LP', $limaLP);
			$sql->bindParam(':6BL', $enamBL);
			$sql->bindParam(':6BP', $enamBP);
			$sql->bindParam(':6LL', $enamLL);
			$sql->bindParam(':6LP', $enamLP);
			$sql->bindParam(':7BL', $tujuhBL);
			$sql->bindParam(':7BP', $tujuhBP);
			$sql->bindParam(':7LL', $tujuhLL);
			$sql->bindParam(':7LP', $tujuhLP);
			$sql->bindParam(':8BL', $delapanBL);
			$sql->bindParam(':8BP', $delapanBP);
			$sql->bindParam(':8LL', $delapanLL);
			$sql->bindParam(':8LP', $delpanLP);
			$sql->bindParam(':9BL', $sembilanBL);
			$sql->bindParam(':9BP', $sembilanBP);
			$sql->bindParam(':9LL', $sembilanLL);
			$sql->bindParam(':9LP', $sembilanLP);
			$sql->bindParam(':10BL', $sepuluhBL);
			$sql->bindParam(':10BP', $sepuluhBP);
			$sql->bindParam(':10LL', $sepuluhLL);
			$sql->bindParam(':10LP', $sepuluhLP);
			$sql->bindParam(':11BL', $sebelasBL);
			$sql->bindParam(':11BP', $sebelasBP);
			$sql->bindParam(':11LL', $sebelasLL);
			$sql->bindParam(':11LP', $sebelasLP);
			$sql->bindParam(':12BL', $duabelasBL);
			$sql->bindParam(':12BP', $duabelasBP);
			$sql->bindParam(':12LL', $duabelasLL);
			$sql->bindParam(':12LP', $duabelasLP);
			$sql->bindParam(':total_baru_l', $total_baru_l);
			$sql->bindParam(':total_baru_p', $total_baru_p);
			$sql->bindParam(':total_lama_l', $total_lama_l);
			$sql->bindParam(':total_lama_p', $total_lama_p);
			$sql->bindParam(':total_jumlah', $total_jumlah);

			$sql->execute(); // Eksekusi query insert
		}

		$numrow++; // Tambah 1 setiap kali looping
	}

	if($sql){
		echo "You database has imported successfully";
	}else{
		echo "Sorry! There is some problem.";
	}
}

header('location: index.php'); // Redirect ke halaman awal
?>
