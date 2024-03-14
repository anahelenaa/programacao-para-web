<?php

namespace App\Classes;

error_reporting(E_ALL);

use App\Classes\Produto;
use PDO;

class ProdutoRepositorio {

    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function retornaProdutos(){
        
        $sql1 = "SELECT * FROM produtos";
        $statement = $this->pdo -> query($sql1);
        return $statement -> fetchAll(PDO::FETCH_CLASS, Produto::class);
    }

    public function cadastraProdutosBanco(Produto $produto):bool{

        $sql = "INSERT INTO produtos ( nome, valor, descricao, quantidade, imagem) VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->retornaNome());
        $statement->bindValue(2, $produto->retornaValor());
        $statement->bindValue(3, $produto->retornaDescricao());
        $statement->bindValue(4, $produto->retornaQuantidade());
        $statement->bindValue(5, $produto->retornaImagem());
        return $statement->execute();
        
    }

    public function retornaResultado($status):string{
        return ($status == true) ? $resultado = "Produto cadastrado com sucesso.":$resultado = "Produto não cadastrado.";;
    }

    public function deletaProduto(int $id){
        $sql = "DELETE FROM `produtos` WHERE id = ? ";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    public function formaProduto($dados):Produto{

        $produto = new Produto;
        $produto->cadastraProduto(
            $dados['nome'],
            $dados['valor'],
            $dados['descricao'],
            $dados['imagem'],
            $dados['quantidade'],
            $dados['id']
        );

        return $produto;
        
    }

    public function retornaProduto(int $id){
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formaProduto($dados);

    }

    public function editaProduto (Produto $produto){
        $sql = "UPDATE produtos SET nome = ?, valor = ?, descricao = ?, quantidade = ?, imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->retornaNome());
        $statement->bindValue(2, $produto->retornaValor());
        $statement->bindValue(3, $produto->retornaDescricao());
        $statement->bindValue(4, $produto->retornaQuantidade());
        $statement->bindValue(5, $produto->retornaImagem());
        $statement->bindValue(6, $produto->retornaId());
        $statement->execute();

    }
}