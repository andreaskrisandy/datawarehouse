<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data Excel dengan PHP</title>

		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Style untuk Loading -->
		<style>
        #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		</style>

		<!-- Load File jquery.min.js yang ada difolder js -->
		<script src="js/jquery.min.js"></script>

		<script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
		});
		</script>
	</head>
	<body>
		<!-- Membuat Menu Header / Navbar -->
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#" style="color: white;"><b>Import Data Excel dengan PHP</b></a>
				</div>
			</div>
		</nav>
		<!-- Content -->
		<div style="padding: 0 15px;">
			<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
			<a href="index.php" class="btn btn-danger pull-right">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			</a>
			<h3>Form Import Data</h3>
			<hr>
			<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
			<form method="post" action="" enctype="multipart/form-data">
				<a href="Format.xlsx" class="btn btn-default">
					<span class="glyphicon glyphicon-download"></span>
					Download Format
				</a><br><br>
				<!--
				-- Buat sebuah input type file
				-- class pull-left berfungsi agar file input berada di sebelah kiri
				-->
				<input type="file" name="file" class="pull-left">

				<button type="submit" name="preview" class="btn btn-success btn-sm">
					<span class="glyphicon glyphicon-eye-open"></span> Preview
				</button>
			</form>

			<hr>

			<!-- Buat Preview Data -->
			<?php
			// Jika user telah mengklik tombol Preview
			if(isset($_POST['preview'])){
				//$ip = ; // Ambil IP Address dari User
				$nama_file_baru = 'data.xlsx';

				// Cek apakah terdapat file data.xlsx pada folder tmp
				if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
					unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

				$tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
				$tmp_file = $_FILES['file']['tmp_name'];

				// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
				if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
					// Upload file yang dipilih ke folder tmp
					// dan rename file tersebut menjadi data{ip_address}.xlsx
					// {ip_address} diganti jadi ip address user yang ada di variabel $ip
					// Contoh nama file setelah di rename : data127.0.0.1.xlsx
					move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

					// Load librari PHPExcel nya
					require_once 'PHPExcel/PHPExcel.php';

					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

					// Buat sebuah tag form untuk proses import data ke database
					echo "<form method='post' action='import.php'>";

					// Buat sebuah div untuk alert validasi kosong
					echo "<div class='alert alert-danger' id='kosong'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
					</div>";
					echo "<table class='table table-bordered'>
					<tr>
						<th align='center' rowspan='3'>No</th>
						<th align='center' rowspan='3'>Kode</th>
						<th align='center' rowspan='3'>Penyakit</th>
						<th align='center' colspan='3'>0-7 Hr</th>
						<th align='center' colspan='3'>8-28 Hr</th>
						<th align='center' colspan='4'>1Bl-1Th</th>
						<th align='center' colspan='4'>1-4Th</th>
						<th align='center' colspan='4'>5-9Th</th>
						<th align='center' colspan='4'>10-14Th</th>
						<th align='center' colspan='4'>15-19Th</th>
						<th align='center' colspan='4'>20-44Th</th>
						<th align='center' colspan='4'>45-54Th</th>
						<th align='center' colspan='4'>55-59Th</th>
						<th align='center' colspan='4'>60-69Th</th>
						<th align='center' colspan='4'>70Th</th>
						<th align='center' colspan='7'>Total</th>
						</tr>
							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>

							<th colspan='2'>Baru</th>
							<th colspan='2'>Lama</th>
							<th rowspan='2'>JML</th>
						</tr>
						<tr>
							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

							<th>L</th>
							<th>P</th>

						</tr>
					</tr>";

					$numrow = 1;
					$kosong = 0;
					foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
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

						// Cek jika semua data tidak diisi
						if(is_null($id) && is_null($kode) && is_null($penyakit) && is_null($satuBL) && is_null($satuBP) && is_null($satuLL) && is_null($satuLP)
						&& is_null($duaBL) && is_null($duaBP) && is_null($duaLL) && is_null($duaLP) && is_null($tigaBL) && is_null($tigaBP) && is_null($tigaLL) && is_null($tigaLP)
						&& is_null($empatBL) && is_null($empatBP) && is_null($empatLL) && is_null($empatLP) && is_null($limaBL) && is_null($limaBP) && is_null($limaLL) && is_null($limaLP)
						&& is_null($enamBL) && is_null($enamBP) && is_null($enamLL) && is_null($enamLP) && is_null($tujuhBL) && is_null($tujuhBP) && is_null($tujuhLL) && is_null($tujuhLP)
						&& is_null($delapanBL) && is_null($delapanBP) && is_null($delapanLL) && is_null($delapanLP) && is_null($sembilanBL) && is_null($sembilanBP) && is_null($sembilanLL) && is_null($sembilanLP)
						&& is_null($sepuluhBL) && is_null($sepuluhBP) && is_null($sepuluhLL) && is_null($sepuluhLP) && is_null($sebelasBL) && is_null($sebelasBP) && is_null($sebelasLL) && is_null($sebelasLP)
						&& is_null($duabelasBL) && is_null($duabelasBP) && is_null($duabelasLL) && is_null($duabelasLP)&& is_null($total_baru_l) && is_null($total_baru_p) && is_null($total_lama_l) && is_null($total_lama_p) && is_null($total_jumlah)	)
						continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if($numrow > 3){
							// Validasi apakah semua data telah diisi
							// $nis_td = ( ! is_null($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							// $nama_td = ( ! is_null($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
							// $jk_td = ( ! is_null($jenis_kelamin))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
							// $telp_td = ( ! is_null($telp))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
							// $alamat_td = ( ! is_null($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

							$id_td = ( ! is_null($id))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$kode_td = ( ! is_null($kode))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$penyakit_td = ( ! is_null($penyakit))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$satuBL_td = ( ! is_null($satuBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$satuBP_td = ( ! is_null($satuBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$satuLL_td = ( ! is_null($satuLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$satuLP_td = ( ! is_null($satuLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$duaBL_td = ( ! is_null($duaBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$duaBP_td = ( ! is_null($duaBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$duaLL_td = ( ! is_null($duaLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$duaLP_td = ( ! is_null($duaLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$tigaBL_td = ( ! is_null($tigaBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$tigaBP_td = ( ! is_null($tigaBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$tigaLL_td = ( ! is_null($tigaLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$tigaLP_td = ( ! is_null($tigaLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$empatBL_td = ( ! is_null($empatBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$empatBP_td = ( ! is_null($empatBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$empatLL_td = ( ! is_null($empatLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$empatLP_td = ( ! is_null($empatLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$limaBL_td = ( ! is_null($limaBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$limaBP_td = ( ! is_null($limaBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$limaLL_td = ( ! is_null($limaLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$limaLP_td = ( ! is_null($limaLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$enamBL_td = ( ! is_null($enamBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$enamBP_td = ( ! is_null($enamBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$enamLL_td = ( ! is_null($enamLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$enamLP_td = ( ! is_null($enamLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$tujuhBL_td = ( ! is_null($tujuhBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$tujuhBP_td = ( ! is_null($tujuhBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$tujuhLL_td = ( ! is_null($tujuhLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$tujuhLP_td = ( ! is_null($tujuhLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$delapanBL_td = ( ! is_null($delapanBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$delapanBP_td = ( ! is_null($delapanBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$delapanLL_td = ( ! is_null($delapanLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$delapanLP_td = ( ! is_null($delapanLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sembilanBL_td = ( ! is_null($sembilanBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sembilanBP_td = ( ! is_null($sembilanBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sembilanLL_td = ( ! is_null($sembilanLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sembilanLP_td = ( ! is_null($sembilanLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sepuluhBL_td = ( ! is_null($sepuluhBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sepuluhBP_td = ( ! is_null($sepuluhBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sepuluhLL_td = ( ! is_null($sepuluhLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sepuluhLP_td = ( ! is_null($sepuluhLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sebelasBL_td = ( ! is_null($sebelasBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sebelasBP_td = ( ! is_null($sebelasBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sebelasLL_td = ( ! is_null($sebelasLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$sebelasLP_td = ( ! is_null($sebelasLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$duabelasBL_td = ( ! is_null($duabelasBL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$duabelasBP_td = ( ! is_null($duabelasBP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$duabelasLL_td = ( ! is_null($duabelasLL))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$duabelasLP_td = ( ! is_null($duabelasLP))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$total_baru_l_td = ( ! is_null($total_baru_l))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$total_baru_p_td = ( ! is_null($total_baru_p))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$total_lama_l_td = ( ! is_null($total_lama_l))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$total_lama_p_td = ( ! is_null($total_lama_p))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
							$total_jumlah_td = ( ! is_null($total_jumlah))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah

							// Jika salah satu data ada yang kosong
							if(is_null($id) && is_null($kode) && is_null($penyakit) && is_null($satuBL) && is_null($satuBP) && is_null($satuLL) && is_null($satuLP)
							&& is_null($duaBL) && is_null($duaBP) && is_null($duaLL) && is_null($duaLP) && is_null($tigaBL) && is_null($tigaBP) && is_null($tigaLL) && is_null($tigaLP)
							&& is_null($empatBL) && is_null($empatBP) && is_null($empatLL) && is_null($empatLP) && is_null($limaBL) && is_null($limaBP) && is_null($limaLL) && is_null($limaLP)
							&& is_null($enamBL) && is_null($enamBP) && is_null($enamLL) && is_null($enamLP) && is_null($tujuhBL) && is_null($tujuhBP) && is_null($tujuhLL) && is_null($tujuhLP)
							&& is_null($delapanBL) && is_null($delapanBP) && is_null($delapanLL) && is_null($delapanLP) && is_null($sembilanBL) && is_null($sembilanBP) && is_null($sembilanLL) && is_null($sembilanLP)
							&& is_null($sepuluhBL) && is_null($sepuluhBP) && is_null($sepuluhLL) && is_null($sepuluhLP) && is_null($sebelasBL) && is_null($sebelasBP) && is_null($sebelasLL) && is_null($sebelasLP)
							&& is_null($duabelasBL) && is_null($duabelasBP) && is_null($duabelasLL) && is_null($duabelasLP)&& is_null($total_baru_l) && is_null($total_baru_p) && is_null($total_lama_l) && is_null($total_lama_p) && is_null($total_jumlah)	)
							{
								$kosong++; // Tambah 1 variabel $kosong
							}

							// echo "<tr>";
							// echo "<td".$nis_td.">".$nis."</td>";
							// echo "<td".$nama_td.">".$nama."</td>";
							// echo "<td".$jk_td.">".$jenis_kelamin."</td>";
							// echo "<td".$telp_td.">".$telp."</td>";
							// echo "<td".$alamat_td.">".$alamat."</td>";
							// echo "</tr>";

							echo "<tr>";
							echo "<td".$id_td.">".$id."</td>";
							echo "<td".$kode_td.">".$kode."</td>";
							echo "<td".$penyakit_td.">".$penyakit."</td>";
							echo "<td".$satuBL_td.">".$satuBL."</td>";
							echo "<td".$satuBP_td.">".$satuBP."</td>";
							echo "<td".$satuLL_td.">".$satuLL."</td>";
							echo "<td".$satuLP_td.">".$satuLP."</td>";
							echo "<td".$duaBL_td.">".$duaBL."</td>";
							echo "<td".$duaBP_td.">".$duaBP."</td>";
							echo "<td".$duaLL_td.">".$duaLL."</td>";
							echo "<td".$duaLP_td.">".$duaLP."</td>";
							echo "<td".$tigaBL_td.">".$tigaBL."</td>";
							echo "<td".$tigaBP_td.">".$tigaBP."</td>";
							echo "<td".$tigaLL_td.">".$tigaLL."</td>";
							echo "<td".$tigaLP_td.">".$tigaLP."</td>";
							echo "<td".$empatBL_td.">".$empatBL."</td>";
							echo "<td".$empatBP_td.">".$empatBP."</td>";
							echo "<td".$empatLL_td.">".$empatLL."</td>";
							echo "<td".$empatLP_td.">".$empatLP."</td>";
							echo "<td".$limaBL_td.">".$limaBL."</td>";
							echo "<td".$limaBP_td.">".$limaBP."</td>";
							echo "<td".$limaLL_td.">".$limaLL."</td>";
							echo "<td".$limaLP_td.">".$limaLP."</td>";
							echo "<td".$enamBL_td.">".$enamBL."</td>";
							echo "<td".$enamBP_td.">".$enamBP."</td>";
							echo "<td".$enamLL_td.">".$enamLL."</td>";
							echo "<td".$enamLP_td.">".$enamLP."</td>";
							echo "<td".$tujuhBL_td.">".$tujuhBL."</td>";
							echo "<td".$tujuhBP_td.">".$tujuhBP."</td>";
							echo "<td".$tujuhLL_td.">".$tujuhLL."</td>";
							echo "<td".$tujuhLP_td.">".$tujuhLP."</td>";
							echo "<td".$delapanBL_td.">".$delapanBL."</td>";
							echo "<td".$delapanBP_td.">".$delapanBP."</td>";
							echo "<td".$delapanLL_td.">".$delapanLL."</td>";
							echo "<td".$delapanLP_td.">".$delapanLP."</td>";
							echo "<td".$sembilanBL_td.">".$sembilanBL."</td>";
							echo "<td".$sembilanBP_td.">".$sembilanBP."</td>";
							echo "<td".$sembilanLL_td.">".$sembilanLL."</td>";
							echo "<td".$sembilanLP_td.">".$sembilanLP."</td>";
							echo "<td".$sepuluhBL_td.">".$sepuluhBL."</td>";
							echo "<td".$sepuluhBP_td.">".$sepuluhBP."</td>";
							echo "<td".$sepuluhLL_td.">".$sepuluhLL."</td>";
							echo "<td".$sepuluhLP_td.">".$sepuluhLP."</td>";
							echo "<td".$sebelasBL_td.">".$sebelasBL."</td>";
							echo "<td".$sebelasBP_td.">".$sebelasBP."</td>";
							echo "<td".$sebelasLL_td.">".$sebelasLL."</td>";
							echo "<td".$sebelasLP_td.">".$sebelasLP."</td>";
							echo "<td".$duabelasBL_td.">".$duabelasBL."</td>";
							echo "<td".$duabelasBP_td.">".$duabelasBP."</td>";
							echo "<td".$duabelasLL_td.">".$duabelasLL."</td>";
							echo "<td".$duabelasLP_td.">".$duabelasLP."</td>";
							echo "<td".$total_baru_l_td.">".$total_baru_l."</td>";
							echo "<td".$total_baru_p_td.">".$total_baru_p."</td>";
							echo "<td".$total_lama_l_td.">".$total_lama_l."</td>";
							echo "<td".$total_lama_p_td.">".$total_lama_p."</td>";
							echo "<td".$total_jumlah_td.">".$total_jumlah."</td>";
							echo "</tr>";
						}

						$numrow++; // Tambah 1 setiap kali looping
					}

					echo "</table>";

					// Cek apakah variabel kosong lebih dari 1
					// Jika lebih dari 1, berarti ada data yang masih kosong
					if($kosong > 1){
					?>
						<script>
						$(document).ready(function(){
							// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
							$("#jumlah_kosong").html('<?php echo $kosong; ?>');

							$("#kosong").show(); // Munculkan alert validasi kosong
						});
						</script>
					<?php
					}else{ // Jika semua data sudah diisi
						echo "<hr>";

						// Buat sebuah tombol untuk mengimport data ke database
						echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
					}

					echo "</form>";
				}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
					// Munculkan pesan validasi
					echo "<div class='alert alert-danger'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
					</div>";
				}
			}
			?>
		</div>
	</body>
</html>
