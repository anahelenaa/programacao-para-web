<?php 

class Produto {

    private string $nome;
    private float $valor;
    private string $descricao;
    private int $quantidade;
    private int $id;

    public function cadastraProduto( string $nomeProduto, float $valorProduto, string $descricaoProduto){
        $this->nome = $nomeProduto;
        $this->valor = $valorProduto;
        $this->descricao = $descricaoProduto;

    }

    public function retornaNome(){
        return $this->nome;
    }
}