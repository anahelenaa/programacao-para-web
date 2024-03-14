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
    <title>Painel de administração</title>
    <link rel="stylesheet" href="../front-end/Administracao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div id="meuMenu" class="menu">
            <a href="javascript:void(0)" class="botao-fechar" onclick="closeNav()">&times;</a>
            <div class="container-opcoes">
                <a class="opcao-menu" href="index.php">Catálogo</a>
                <a class="opcao-menu" href="./Administracao.php">Painel de Administração</a>
                <a class="opcao-menu" href="./CadastrarProduto.php">Cadastrar produto</a>
            </div>
        </div>
        <a href="javascript:void(0)" onclick="openNav()"><i class="fa fa-bars" id="btn"></i></a>
        
        <h1 id="titulo" >Du<b style="color:red">A</b><b style="color: blue">r</b><b style="color: yellow">t</b><b style="color: green">e</b></h1>
    </header>
    <div id="corpo">
        <h2 class="h2 ">Produtos</h2>
        <div class="container-tabela">
            <table class="tabela-produtos">
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Estoque</th>
                    <th colspan="2">Ações</th>

                </tr>
                <?php foreach($arrayProdutos as $produto){?>
                <tr>
                    <td><?="{$produto->retornaNome()}";?></td>
                    <td>R$<?="{$produto->retornaValorFormatado()}";?></td>
                    <td><?="{$produto->retornaDescricao()}";?></td>
                    <td><?="{$produto->retornaQuantidade()}";?></td>
                    <td><a href="./EditarProduto.php?id=<?= $produto->retornaId();?>"><button class="botao">Editar</button></a></td>  
                    <td>
                        <form action="ExcluirProduto.php" method="post">
                            <input type="hidden" name="id" value="<?= $produto->retornaId();?>">
                            <input type="submit" class="botao" value="Excluir" >
                        </form>
                    </td>
                </tr>
                <?php };?>

            </table>
        </div>
        <div class="container-botao-cadastrar">
        <a href="./CadastrarProduto.php"><button class="botao-cadastrar">Cadastrar Produto</button></a>
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