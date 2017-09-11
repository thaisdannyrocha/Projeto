<?php
    class ItemVenda{
        private $codigoVenda;
        private $codigoProduto;
        private $quantidade;
        public function setCodigoVenda($codigoVenda){
            $this->codigoVenda = $codigoVenda;
        }
        public function getCodigoVenda(){
            return $this->codigoVenda;
        }
		public function setCodigoProduto($codigoProduto){
            $this->codigoProduto = $codigoProduto;
        }
        public function getCodigoProduto(){
            return $this->codigoProduto;
        }
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }
        public function getQuantidade(){
            return $this->quantidade;
        }
    }
?>