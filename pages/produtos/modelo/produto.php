<?php
    class Produto{
        private $codigo;
        private $nome;
		private $preco;
        private $quantidade;
        private $mix;
        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }
        public function getCodigo(){
            return $this->codigo;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }
		public function setPreco($preco){
            $this->nome = $preco;
        }
        public function getPreco(){
            return $this->preco;
		}
		public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }
        public function getQuantidade(){
            return $this->quantidade;
        }
		public function setMix($mix){
            $this->mix = $mix;
        }
        public function getMix(){
            return $this->mix;
        }
    }
?>