<?php 

namespace App\Classes;

class Produto {

    private string $nome;
    private float $valor;
    private string $descricao;
    private int $quantidade;
    private string $imagem;
    private int $id;

    public function cadastraProduto( string $nomeProduto, float $valorProduto, string $descricaoProduto, string $imagemProduto, int $quantidadeProduto){
        $this->nome = $nomeProduto;
        $this->valor = $valorProduto;
        $this->descricao = $descricaoProduto;
        $this->imagem = $imagemProduto;
        $this->quantidade = $quantidadeProduto;

    }

    public function retornaNome(){
        return $this->nome;
    }

    public function retornaValor(){
        return $this->valor;
    }

    public function retornaValorFormatado(){
        return number_format($this->valor, 2, ',', '.');
    }

    public function retornaDescricao(){
        return $this->descricao;
    }

    public function retornaImagem(){
        return $this->imagem;
    }

    public function retornaId(){
        return $this->id;
    }

    public function retornaQuantidade(){
        return $this->quantidade;
    }

    public function editaNome(string $nome, array $arrayProdutos, Produto $produto){
        $arrayProdutos[($produto->retornaId()) - 1]->nome = $nome;
    }

}