<?php require_once "data.php";

    class Orang extends Data {
        public function test($params) {
            return "hai " . $this->nama . " $params";
        }
    }

    $risa = new Orang("Risa Nussy", 12);

    echo $risa->test("keren")

?>