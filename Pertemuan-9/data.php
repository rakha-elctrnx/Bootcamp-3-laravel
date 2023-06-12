<?php

    // OOP
    // Pemrograman berorientasi objek

    // Property = variabel yang berada didalam object/class
    // Method = function yang berada didalam object/class

    class Data {
        public $nama;
        public $umur;

        public function __construct($nm, $u)
        {
            $this->nama = $nm;
            $this->umur = $u;
        }

        public function test($params) {
            return "Hallo " . $this->nama . " $params";
        }
    }
?>