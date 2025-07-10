<?php

    class venda {
        private $idvenda;
        private $idProduto;
        private $IdUsuario;
        private $data;
        private $formapagamento;
        private $endereco;
        private $valor;
        private $status;

        public function set ($nome, $temp) {
            $this->$nome = $temp;
        } public function get ($temp) {
            return $this->$temp;
        }
    }

?>