<?php

    $nama = "bagas";

    function test() {
        global $nama;
        echo "function : $nama";
    }

    test();
    echo "<br>";
    echo "luar : $nama";

?>