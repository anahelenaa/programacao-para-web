<?php 

namespace App\Classes;

use Exception;

class Produto {

    private string $nome;
    private float $valor;
    private string $descricao;
    private int $quantidade;
    private string $imagem;
    private ?int $id;

    public function cadastraProduto( string $nomeProduto, float $valorProduto, string $descricaoProduto, string $imagemProduto, int $quantidadeProduto, ?int $idProduto = null){
        $this->nome = $nomeProduto;
        $this->valor = $valorProduto;
        $this->descricao = $descricaoProduto;
        $this->imagem = $imagemProduto;
        $this->quantidade = $this->validaQuantidade($quantidadeProduto);
        $this->id = $idProduto;

    }

    public function validaQuantidade($quantidadeProduto){
        if(is_int($quantidadeProduto) && $quantidadeProduto >= 0){
            return $quantidadeProduto;
        }
        
        throw new Exception("O estoque não pode ser menor que 0.");
        
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


}