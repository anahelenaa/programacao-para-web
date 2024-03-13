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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../front-end/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>DuArte Presentes e Brinquedos</title>
</head>
<body>
    <header>
        
        <div id="meuMenu" class="menu">
            <a href="javascript:void(0)" class="botao-fechar" onclick="closeNav()">&times;</a>
            <div class="container-opcoes">
                <a class="opcao-menu" href="#brinquedos">Brinquedos</a>
                <a class="opcao-menu" href="#presentes">Presentes</a>
            </div>
        </div>
        <a href="javascript:void(0)" onclick="openNav()"><i class="fa fa-bars" id="btn"></i></a>
        
        <h1 id="titulo" >Du<b style="color:red">A</b><b style="color: blue">r</b><b style="color: yellow">t</b><b style="color: green">e</b></h1>
    </header>
    <div id="corpo">
        <h2 class="h2">Produtos</h2>
        <div class="container-produtos">
        <?php foreach ($arrayProdutos as $produto){ ?> 
            <div class="produto"> 
                    <h2 class="nome-produto"> <?= "{$produto->retornaNome()}"?> </h2>
                    <div class="container-imagem">
                        <img src="<?= "../front-end/imagens/" . "{$produto->retornaImagem()}"?>" alt="<?= "{$produto->retornaNome()}"?>">
                    </div>
                    <p> <?= "{$produto->retornaDescricao()}"?> </p>
                    <p id="preco"> <?= "R$"."{$produto->retornaValorFormatado()}"?> </p>
            </div>
            <?php }; ?> 
        </div>
    </div>


    <script>

        var largura = screen.width;

        function openNav() {
            if(largura <= 650){
                document.getElementById("meuMenu").style.width = "160px";
                document.getElementById("titulo").style.marginLeft = "140px";
                document.getElementById("titulo").style.transitionDuration = "0.5s";
                document.getElementById("corpo").style.marginLeft = "160px";
                document.getElementById("corpo").style.transitionDuration = "0.5s";
            }
            else{
                if(largura <= 865){
                    document.getElementById("meuMenu").style.width = "160px";
                    document.getElementById("titulo").style.marginLeft = "140px";
                    document.getElementById("titulo").style.transitionDuration = "0.5s";
                    document.getElementById("corpo").style.marginLeft = "160px";
                    document.getElementById("corpo").style.transitionDuration = "0.5s";
                } else {

                    document.getElementById("meuMenu").style.width = "220px";
                    document.getElementById("titulo").style.marginLeft = "180px";
                    document.getElementById("titulo").style.transitionDuration = "0.5s";
                    document.getElementById("corpo").style.marginLeft = "220px";
                    document.getElementById("corpo").style.transitionDuration = "0.5s";
                }
            }
        }
        
        function closeNav() {

            if(largura <= 650){
                document.getElementById("meuMenu").style.width = "0";
                    document.getElementById("titulo").style.marginLeft = "25px";
                    document.getElementById("corpo").style.marginLeft = "0";

            } else {
                if(largura <= 865){
                    document.getElementById("meuMenu").style.width = "0";
                    document.getElementById("titulo").style.marginLeft = "20px";
                    document.getElementById("corpo").style.marginLeft = "0";
                }
                else {

                    document.getElementById("meuMenu").style.width = "0";
                    document.getElementById("titulo").style.marginLeft = "14px";
                    document.getElementById("corpo").style.marginLeft = "0";

                }
            }
        }
        </script>
    
</body>
</html>