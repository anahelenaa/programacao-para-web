<?php 

class Produto {

    private string $nome;
    private float $valor;
    private string $descricao;
    private int $quantidade;
    private string $imagem;
    private int $id;

    public function cadastraProduto( string $nomeProduto, float $valorProduto, string $descricaoProduto, string $imagemProduto){
        $this->nome = $nomeProduto;
        $this->valor = $valorProduto;
        $this->descricao = $descricaoProduto;
        $this->imagem = $imagemProduto;

    }

    public function retornaNome(){
        return $this->nome;
    }

    public function retornaValor(){
        return number_format($this->valor, 2, ',', '.');
    }

    public function retornaDescricao(){
        return $this->descricao;
    }

    public function retornaImagem(){
        return $this->imagem;
    }
}