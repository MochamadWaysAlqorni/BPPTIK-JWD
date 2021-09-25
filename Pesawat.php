<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project JWD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</head>

<body>
    <header class="container bg-primary text-white">
        <div class="row">
            <div class="col-12 py-4 text-center">
                <h1 class="display-1">Portal Bandara Juanda</h1>
                <p class="lead">Cek Harga Tiket Pesawat</p>
            </div>
        </div>
    </header>

    <main class="container border">
        <div class="row">
            <div class="col-12 py-5">
                <h1>Pendaftaran Rute Penerbangan</h1>
                <form action="" method="post" id="pesawat">
                	<label for="maskapai">Maskapai : </label>
                	<input class="form-control" type="text" name="maskapai" placeholder="Nama Maskapai"><br>
                	<label for="pb1">Bandara Asal : </label>
                	<select name="pb1" id="pb1" class="form-select">
                		<option value="a">Soekarno-Hatta (CGK)</option>
                		<option value="b">Husein Sastranegara (BDO)</option>
                		<option value="c">Abdul Rachman Saleh (MLG)</option>
                		<option value="d">Juanda (SUB)</option>
                	</select><br>
                	<label for="pb2">Bandara Tujuan : </label>
                	<select name="pb2" id="pb2" class="form-select">
                		<option value="e">Ngurah Rai (DPS)</option>
                		<option value="f">Hasanuddin (UPG)</option>
                		<option value="g">Inanwatan (INX)</option>
                		<option value="h">Sultan Iskandarmuda (BTJ)</option>
                	</select><br>
                	<label for="tiket">Harga TIket</label>
                	<input class="form-control" type="number" name="tiket" placeholder="Harga Tiket"><br><br>
                	<button class="btn btn-primary" type="submit" form="pesawat" value="Kirim" name="Kirim">Hitung Harga</button>
                </form>
            </div>
        </div>

<?php 

	function Pajak($pj1,$pj2){
		$pajak=$pj1+$pj2;
		return $pajak;
	}

	function Total($tiket,$pj1,$pj2){
		$total=$tiket+$pj1+$pj2;
		return $total;
	}

	$berkas = "data/penerbangan.json"; //Variabel berisi nama berkas di mana data dibaca dan ditulis.
	$dataCustomer = array(); //Variabel array kosong untuk menampung data customer dari berkas.
	
	//Mengambil data dari berkas dan mengkonversi data tersebut menjadi array PHP.
	//Variabel $dataJson berisi data dari berkas dalam bentuk array Json.
	//Variabel $dataCustomer berisi data pada $dataJson yang sudah dikonversi menjadi array PHP.
	$dataJson = file_get_contents($berkas);
	$dataCustomer = json_decode($dataJson, true);

	if(isset($_POST['Kirim'])){
		$maskapai=$_POST['maskapai'];
		$pj1=$_POST['pb1'];
		$pj2=$_POST['pb2'];

		if ($pj1=="a") {
			$p1 = "50000";
			$basal="Soekarno-Hatta (CGK)";
		}
		elseif ($pj1=="b") {
			$p1 = "30000";
			$basal="Husein Sastranegara (BDO)";
		}
		elseif ($pj1=="c") {
			$p1 = "40000";
			$basal="Abdul Rachman Saleh (MLG)";
		}
		elseif ($pj1=="d") {
			$p1 = "40000";
			$basal="Juanda (SUB)";
		}


		if ($pj2=="e") {
			$p2 = "80000";
			$btujuan="Ngurah Rai (DPS)";
		}
		elseif ($pj2=="f") {
			$p2 = "70000";
			$btujuan="Hasanuddin (UPG)";
		}
		elseif ($pj2=="g") {
			$p2 = "90000";
			$btujuan="Inanwatan (INX)";
		}
		elseif ($pj2=="h") {
			$p2 = "70000";
			$btujuan="Sultan Iskandarmuda (BTJ)";
		}

		$tiket=$_POST['tiket'];
		$tpjk=Pajak($p1,$p2);
		$ttkt=Total($tiket,$p1,$p2);

		//Memasukkan data customer dari form ke dalam array $databaru.
		$dataBaru = ["$maskapai", "$basal", "$btujuan", "$tiket", "$tpjk", "$ttkt"];
		array_push($dataCustomer,$dataBaru); //Menambahkan data baru ke dalam data yang sudah ada dalam berkas. 
		//Mengkonversi kembali data customer dari array PHP menjadi array Json dan menyimpannya ke dalam berkas.

		usort($dataCustomer, function ($a, $b) {
    	return $a['0'] <=> $b['0'];
		});

		$dataJson = json_encode($dataCustomer, JSON_PRETTY_PRINT);
		file_put_contents($berkas, $dataJson);

	}

?>
		
		<!-- Tabel untuk menampilkan data Customer. -->
		<table class="table table-striped ">
			<tr class="table-primary">
				<!-- Header tabel data Customer. -->
				<th>Maskapai</th>
				<th>Asal Penerbangan</th>
				<th>Tujuan Penerbangan</th>
				<th>Harga Tiket</th>
				<th>Pajak</th>
				<th>Total Harga Tiket</th>
			</tr>

<?php
	//	Perulangan untuk menampilkan data customer.
	//	Variabel $i adalah index data customer pada array $dataCustomer.
	for ($i=0; $i < count($dataCustomer); $i++){

		//	Memindahkan data dari dalam array $dataCustomer ke variabel baru.
		//	$nama adalah data nama customer.
		//	$nohp adalah data nomor hp customer.
		//	$jenisKelamin adalah data jenis kelamin customer.
		//	$item adalah data berisi item dalam bentuk array berisikan item1, item2, dan item3.
		$maskapai = $dataCustomer[$i]['0']; // Contoh isi variabel: "Harry Pitter".
		$asal = $dataCustomer[$i]['1']; // Contoh isi variabel: "089977641321".
		$tujuan = $dataCustomer[$i]['2']; // Isi variabel: "L" atau "P".
		$htiket = $dataCustomer[$i]['3']; // Contoh isi variabel: ["1000", "2000", "500"]
		$pjk = $dataCustomer[$i]['4']; //total pajak
		$ttl = $dataCustomer[$i]['5']; //total hrg tiket
		
		//	Percabangan untuk mengganti tampilan data jenis kelamin.
		//	Variabel $teksJenisKelamin berisi teks yang akan ditampilkan sesuai dengan data pada variabel $jenisKelamin.
		
		//	Baris untuk menampilkan data customer.
		echo "<tr>
				<td>".$maskapai."</td> <!-- Data nama. -->
				<td>".$asal."</td> <!-- Data nomor hp. -->
				<td>".$tujuan."</td> <!-- Data jenis kelamin. -->
				<td>".$htiket."</td> <!-- Data item1. -->
				<td>".$pjk."</td> <!-- Data item2. -->
				<td>".$ttl."</td> <!-- Data item3. -->
				
			</tr>";
	}
?>
		</table>
    </main>

    <footer class="container bg-light">
        <div class="row">
            <div class="col-12 py-4">
                &copy; 2021 Mochamad Ways Alqorni (JWD2)
            </div>
        </div>
    </footer>



</body>

</html>