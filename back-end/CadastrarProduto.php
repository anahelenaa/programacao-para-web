<?php 

require_once "../vendor/autoload.php";
require_once "ConexaoBD.php";

use App\Classes\Produto;
use App\Classes\Contato;
use App\Classes\ProdutoRepositorio;

$produtoRepositorio = new ProdutoRepositorio($pdo);
$arrayProdutos = $produtoRepositorio->retornaProdutos();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
    <link rel="stylesheet" href="../front-end/Administracao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div id="meuMenu" class="menu">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a class="active" href="#brinquedos">Brinquedos</a>
            <a href="#presentes">Presentes</a>
        </div>
        <a href="javascript:void(0)" onclick="openNav()"><i class="fa fa-bars" id="btn"></i></a>
        
        <h1 id="titulo" >Du<b style="color:red">A</b><b style="color: blue">r</b><b style="color: yellow">t</b><b style="color: green">e</b></h1>
    </header>

    <form action="submit" method="post">
        <input type="text" name="nome" value="">
    </form>
    

    <script>
        function openNav() {
          document.getElementById("meuMenu").style.width = "17vw";
          document.getElementById("titulo").style.marginLeft = "12.5vw";
          document.getElementById("titulo").style.transitionDuration = "0.5s";
          document.getElementById("corpo").style.marginLeft = "17vw";
          document.getElementById("corpo").style.transitionDuration = "0.5s";
        
        }
        
        function closeNav() {
          document.getElementById("meuMenu").style.width = "0";
          document.getElementById("titulo").style.marginLeft = "0";
          document.getElementById("corpo").style.marginLeft = "1vw";
        }
        </script>
    
</body>
</html>