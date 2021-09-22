<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title>Angka Bertingkat</title>
</head>
<body>
<form action="" method="get">
     Masukkan jumlah tingkat : 
     <input type="number" name="jml">
     <input type="submit" name="submit" value="Tampilkan!">
</form>
</body>
</html>
<?php
if (isset($_GET['submit'])) {
$jml=$_GET['jml'];
for ($i=$jml;$i>=1;$i--){
     for ($j=1;$j<=$i;$j++){
    echo "($i,$j)";
    }
     echo "<br>";
}
}

?>