<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data Excel dengan PHP</title>

		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="assets/css/css/bootstrap.min.css" rel="stylesheet">

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
			<!--
			-- Buat sebuah tombol untuk mengarahkan ke form import data
			-- Tambahkan class btn agar terlihat seperti tombol
			-- Tambahkan class btn-success untuk tombol warna hijau
			-- class pull-right agar posisi link berada di sebelah kanan
			-->
			<a href="form.php" class="btn btn-success pull-right">
				<span class="glyphicon glyphicon-upload"></span> Import Data
			</a>

			<h3>Data Hasil Import</h3>

			<hr>

			<!-- Buat sebuah div dan beri class table-responsive agar tabel jadi responsive -->
			<div class="table-responsive">
				<table class="table table-bordered" text>
					<tr>
						<th align="center" rowspan="3">No</th>
						<th align="center" rowspan="3">Kode</th>
						<th align="center" rowspan="3">Penyakit</th>
						<th align="center" colspan="4">0-7 Hr</th>
						<th align="center" colspan="4">8-28 Hr</th>
						<th align="center" colspan="4">1Bl-1Th</th>
						<th align="center" colspan="4">1-4Th</th>
						<th align="center" colspan="4">5-9Th</th>
						<th align="center" colspan="4">10-14Th</th>
						<th align="center" colspan="4">15-19Th</th>
						<th align="center" colspan="4">20-44Th</th>
						<th align="center" colspan="4">45-54Th</th>
						<th align="center" colspan="4">55-59Th</th>
						<th align="center" colspan="4">60-69Th</th>
						<th align="center" colspan="4">70Th</th>
						<th align="center" colspan="5">Total</th>
					</tr>
					<tr>
						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>

						<th colspan="2">Baru</th>
						<th colspan="2">Lama</th>
						<th rowspan="2">JML</th>
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
					<?php
					// Load file koneksi.php
					include "koneksi.php";

					// Buat query untuk menampilkan semua data siswa
					$sql = $pdo->prepare("SELECT * FROM record");
					$sql->execute(); // Eksekusi querynya

					$no = 1; // Untuk penomoran tabel, di awal set dengan 1
					while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$data['kode']."</td>";
						echo "<td>".$data['penyakit']."</td>";
						echo "<td>".$data['1BL']."</td>";
						echo "<td>".$data['1BP']."</td>";
						echo "<td>".$data['1LL']."</td>";
						echo "<td>".$data['1LP']."</td>";
						echo "<td>".$data['2BL']."</td>";
						echo "<td>".$data['2BP']."</td>";
						echo "<td>".$data['2LL']."</td>";
						echo "<td>".$data['2LP']."</td>";
						echo "<td>".$data['3BL']."</td>";
						echo "<td>".$data['3BP']."</td>";
						echo "<td>".$data['3LL']."</td>";
						echo "<td>".$data['3LP']."</td>";
						echo "<td>".$data['4BL']."</td>";
						echo "<td>".$data['4BP']."</td>";
						echo "<td>".$data['4LL']."</td>";
						echo "<td>".$data['4LP']."</td>";
						echo "<td>".$data['5BL']."</td>";
						echo "<td>".$data['5BP']."</td>";
						echo "<td>".$data['5LL']."</td>";
						echo "<td>".$data['5LP']."</td>";
						echo "<td>".$data['6BL']."</td>";
						echo "<td>".$data['6BP']."</td>";
						echo "<td>".$data['6LL']."</td>";
						echo "<td>".$data['6LP']."</td>";
						echo "<td>".$data['7BL']."</td>";
						echo "<td>".$data['7BP']."</td>";
						echo "<td>".$data['7LL']."</td>";
						echo "<td>".$data['7LP']."</td>";
						echo "<td>".$data['8BL']."</td>";
						echo "<td>".$data['8BP']."</td>";
						echo "<td>".$data['8LL']."</td>";
						echo "<td>".$data['8LP']."</td>";
						echo "<td>".$data['9BL']."</td>";
						echo "<td>".$data['9BP']."</td>";
						echo "<td>".$data['9LL']."</td>";
						echo "<td>".$data['9LP']."</td>";
						echo "<td>".$data['10BL']."</td>";
						echo "<td>".$data['10BP']."</td>";
						echo "<td>".$data['10LL']."</td>";
						echo "<td>".$data['10LP']."</td>";
						echo "<td>".$data['11BL']."</td>";
						echo "<td>".$data['11BP']."</td>";
						echo "<td>".$data['11LL']."</td>";
						echo "<td>".$data['11LP']."</td>";
						echo "<td>".$data['12BL']."</td>";
						echo "<td>".$data['12BP']."</td>";
						echo "<td>".$data['12LL']."</td>";
						echo "<td>".$data['12LP']."</td>";
						echo "<td>".$data['total_baru']."</td>";
						echo "<td>".$data['total_lama']."</td>";
						echo "<td>".$data['total_jumlah']."</td>";
						echo "</tr>";

						$no++; // Tambah 1 setiap kali looping
					}
					?>
				</table>
			</div>
		</div>
	</body>
</html>
