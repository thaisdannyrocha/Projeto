<?php
    class Venda{
        private $codigo;
        private $data;
        private $status;
        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }
        public function getCodigo(){
            return $this->codigo;
        }
        public function setData($data){
            $this->data = $data;
        }
        public function getData(){
            return $this->data;
        }
		public function setStatus($status){
            $this->status = $status;
        }
        public function getStatus(){
            return $this->status;
        }
    }
?>