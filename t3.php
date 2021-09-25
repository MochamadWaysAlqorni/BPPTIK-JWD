<?php 
function jumlah($bil1,$bil2){ //fungsi penjumlahan
	$jumlah=$bil1+$bil2; //operasi dengan operator aritmatika
	return $jumlah; //mengembalikan nilai hasil ke var. jumlah
}

function kurang($bil1,$bil2){//fungsi pengurangan
	$kurang=$bil1-$bil2;//operasi dengan operator aritmatika
	return $kurang;//mengembalikan nilai hasil ke var. kurang
}

function kali($bil1,$bil2){//fungsi perkalian
	$kali=$bil1*$bil2;//operasi dengan operator aritmatika
	return $kali;//mengembalikan nilai hasil ke var. kali
}

function bagi($bil1,$bil2){//fungsi pembagian
	$bagi=$bil1/$bil2;//operasi dengan operator aritmatika
	return $bagi;//mengembalikan nilai hasil ke var. bagi
}

function mod($bil1,$bil2){//fungsi sisa bagi
	$mod=$bil1%$bil2;//operasi dengan operator aritmatika
	return $mod;//mengembalikan nilai hasil ke var. mod
}

function pangkat($bil1,$bil2){//fungsi perpangkatan
	$pangkat=$bil1**$bil2;//operasi dengan operator aritmatika
	return $pangkat;//mengembalikan nilai hasil ke var. pangkat
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tugas 3</title>
</head>
<body>
	<! Berikut adalah bagian form input dari web, terdapat bilangan pertama, kedua dan tombol untuk eksekusi>
<form action="" method="post">
	<label for="bil1"> Masukkan Bilangan ke-1 : </label>
	<input type="number" name="bil1" id="bil1"><br>
	<label for="bil2"> Masukkan Bilangan ke-2 : </label>
	<input type="number" name="bil2" id="bil2">
	<input type="submit" name="submit" value="Hitung!"><br><br>
</form>

<?php 
if (isset($_POST['submit'])){ // Cek apakah ada operasi submit dari user
	$bil1=$_POST['bil1']; // mengambil nilai bilangan pertama
	$bil2=$_POST['bil2']; // mengambil nilai bilangan kedua

echo "Bilangan masukan ke-1 : ".$bil1."<br>"; //mencetak masukan bilangan pertama
echo "Bilangan masukan ke-2 : ".$bil2."<br><br>"; //mencetak masukan bilangan kedua
echo "Hasil penjumlahan adalah : ".jumlah($bil1,$bil2)."<br>"; // mencetak hasil penjumlahan dari fungsi yang bersangkutan
echo "Hasil pengurangan adalah : ".kurang($bil1,$bil2)."<br>"; // mencetak hasil pengurangan dari fungsi yang bersangkutan
echo "Hasil perkalian adalah : ".kali($bil1,$bil2)."<br>"; // mencetak hasil perkalian dari fungsi yang bersangkutan
echo "Hasil pembagian adalah : ".bagi($bil1,$bil2)."<br>"; // mencetak hasil pembagian dari fungsi yang bersangkutan
echo "Hasil sisa bagi adalah : ".mod($bil1,$bil2)."<br>"; // mencetak hasil sisa bagi/modulo dari fungsi yang bersangkutan
echo "Hasil perpangkatan adalah : ".pangkat($bil1,$bil2)."<br>"; // mencetak hasil perpangkatan dari fungsi yang bersangkutan
}
?>
</body>
</html>