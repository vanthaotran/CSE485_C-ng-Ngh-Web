<?php
    class QuanLySV {
        private $dsSV;
        function __contructor() {
            // $this->dsSV = array(); till ok
            $this->dsSV = [];
        }

        function themSV($sv) {
            // array_push($this->dsSV, $sv);
            $this->dsSV[] = $sv;
        }

        function lietkeDSSV() {
            foreach($this->dsSV as $sv) {
                $sv->hienThiThongTin();
            }
        }
    }

?>