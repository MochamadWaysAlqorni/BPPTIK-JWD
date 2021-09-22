<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tilangan</title>
</head>
<body>
<form action="" method="post">
	Masukkan NoPol : 
	<input type="text" name="nopol">
	<input type="Submit" name="submit" value="Cek!">
</form>
<?php 
$tanggal = date('d');
echo "Tanggal hari ini : $tanggal";
echo "<br>Hasil : ";
if (isset($_POST['submit'])) {
	$nopol=$_POST['nopol'];
	$angka = (int) filter_var($nopol, FILTER_SANITIZE_NUMBER_INT);
	if($angka%2==0 && $tanggal%2==0){
		echo "Kendaraan $nopol boleh lewat";
	}
	elseif ($angka%2==1 && $tanggal%2==1) {
		echo "Kendaraan $nopol boleh lewat";
	}
	else{
		echo "Kendaraan $nopol kena tilang";
	}
}
?>
</body>
</html>