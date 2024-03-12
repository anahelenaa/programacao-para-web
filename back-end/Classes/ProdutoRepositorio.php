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


        $statement = $this->pdo->prepare("INSERT INTO `projeto` . `produtos` ( `nome`, `valor`,`descricao`,`quantidade`, `imagem` ) VALUES (':nome', ':valor', ':descricao',':quantidade', ':imagem');");

        $nome = $produto->retornaNome();
        $valor = $produto->retornaValor();
        $descricao = $produto->retornaDescricao();
        $quantidade = $produto->retornaQuantidade();
        $imagem = $produto->retornaImagem();

        $statement->bindParam(':nome', $nome, PDO::PARAM_STR);
        $statement->bindParam(':valor', $valor, PDO::PARAM_INT);
        $statement->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $statement->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $statement->bindParam(':imagem', $imagem, PDO::PARAM_STR);

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