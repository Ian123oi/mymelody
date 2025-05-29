<?php

    class produto {

        private $id;
        private $nome;
        private $preco;
        private $descricao;
        private $IdCat;
        private $oferta;
        public function set ($nome, $temp) {
            $this->$nome = $temp;
        } public function get ($temp) {
            return $this->$temp;

    }
}

?>