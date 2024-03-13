<?php

require_once "../vendor/autoload.php";
require_once "ConexaoBD.php";
use App\Classes\ProdutoRepositorio;


 

$produtoRepositorio = new ProdutoRepositorio($pdo);
$produtoRepositorio->deletaProduto($_POST['id']);    
header("Location: Administracao.php");
