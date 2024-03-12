<?php

namespace App\Classes;

error_reporting(E_ALL);

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

    public function cadastraProdutosBanco(Produto $produto){

        $sql = "INSERT INTO produtos ( nome, valor, descricao, quantidade, imagem) VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto->retornaNome());
        $statement->bindValue(2, $produto->retornaValor()());
        $statement->bindValue(3, $produto->retornaDescricao()());
        $statement->bindValue(4, $produto->retornaQuantidade());
        $statement->bindValue(5, $produto->retornaImagem());
        $statement->execute();

        if ($statement->execute()) {
            echo "deu certo";
          } else {
            echo "deu errado :(";
          }
        
    }

    public function deletaProduto(int $id){
        $sql = "DELETE FROM `produtos` WHERE id = ? ";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }
}