<?php
$a = 10;
$b = 5;
$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Hasil penjumlahan: $hasilTambah <br>";
echo "Hasil pengurangan: $hasilKurang <br>";
echo "Hasil perkalian: $hasilKali <br>";
echo "Hasil Pembagian: $hasilBagi <br>";
echo "Hasil sisa bagi: $sisaBagi <br>";
echo "Hasil pangkat: $pangkat <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil= $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<br>";
echo "Hasil sama: $hasilSama <br>";
echo "Hasil tidak sama: $hasilTidakSama <br>";
echo "Hasil lebih kecil: $hasilLebihKecil <br>";
echo "Hasil lebih besar: $hasilLebihBesar <br>";
echo "Hasil lebih kecil sama: $hasilLebihKecilSama <br>";
echo "Hasil lebih besar sama: $hasilLebihBesarSama <br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "<br>";
echo "Hasil AND: $hasilAnd <br>";
echo "Hasil OR: $hasilOr <br>";
echo "Hasil NOT A: $hasilNotA <br>";
echo "Hasil NOT B: $hasilNotB <br>";

$a += $b;
echo "$a <br>";
$a -= $b;
echo "$a <br>";
$a *= $b;
echo "$a <br>";
$a /= $b;
echo "$a <br>";
$a %= $b;
echo "$a <br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Hasil Indetik: $hasilIdentik <br>";
echo "Hasil Tidak Indetik: $hasilTidakIdentik <br>";

$totalKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $totalKursi - $kursiTerisi;
$persentaseKosong = ($kursiKosong / $totalKursi) * 100;
echo "Persentase kursi yang masih kosong adalah " . number_format($persentaseKosong, 2) . "%.";
?>