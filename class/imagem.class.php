<?php

    class imagem {

        private $id;
        private $nomeImagem;
        private $id_produto;
      public function set ($nome, $temp) {
            $this->$nome = $temp;
        } public function get ($temp) {
            return $this->$temp;

    }
}

?>