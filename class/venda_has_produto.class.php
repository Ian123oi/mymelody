<?php

    class venda_has_produto {

        private $idProduto;
        private $idVenda;
        private $preco;
        private $quantidade;

        public function set ($nome, $temp) {
            $this->$nome = $temp;
        } public function get ($temp) {
            return $this->$temp;

    }
}

?>