<?php
// !n = n x (n-1)
// !5 = 5 x 4 x 3 x 2 x 1
// !5 = 120

function faktorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * faktorial($n - 1);
    }    
}

$angka = 4;
$hasil_faktorial = faktorial($angka);

echo "Hasil dari faktorial $angka adalah $hasil_faktorial";

?>