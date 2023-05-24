<?php
// !n = n x (n - 1)
// !5 = 5 x 4 x 3 x 2 x 1
// !5 = 120

function faktorial($n) {
    $result = 1;
    for ($i = $n; $i > 1; $i--) { 
        $result *= $i;
    }
    return "Nilai dari faktorial $n adalah $result";
}

echo faktorial(6)

?>