<?php
    class categoria{
        private $idCat;
        private $nomeCat;
        
        public function get($temp) {
            return $this->$temp;
        } public function set ($temp,  $valor) {
            $this->$temp = $valor;
        }
    }
?>