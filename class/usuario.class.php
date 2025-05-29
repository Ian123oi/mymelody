<?php

    class usuario {
        private $id;
        private $nome;
        private $cpf;
        private $email;
        private $senha;
        private $numero;

        public function getId () { 
            return $this->id;
        }

        public function setId ($temp) {
            $this->id = $temp;
        }
        public function getNome () { 
            return $this->nome;
        }

        public function setNome ($temp) {
            $this->nome = $temp;
        }
        public function getcpf () { 
            return $this->cpf;
        }

        public function setcpf ($temp) {
            $this->cpf = $temp;
        }
        public function getEmail () { 
            return $this->email;
        }

        public function setEmail ($temp) {
            $this->email = $temp;
        }
        public function getSenha () { 
            return $this->senha;
        }

        public function setSenha ($temp) {
            $this->senha = $temp;
        }

        public function set ($nome, $temp) {
            $this->$nome = $temp;
        } public function get ($temp) {
            return $this->$temp;
        }
    }

?>