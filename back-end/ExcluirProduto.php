<?php

 require_once "ConexaoBD.php";
 use App\Classes\Produto;
 use App\Classes\ProdutoRepositorio;
 

$produtoRepositorio = new ProdutoRepositorio($pdo);
$produtoRepositorio->deletaProduto($_POST['id']);    
header("Location: Administracao.php");
