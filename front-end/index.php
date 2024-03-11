<?php 
//require_once "../back-end/MenuCliente.php";
require_once "../back-end/ConexaoBD.php";
require_once "../back-end/classes/Produto.class.php";

$sql1 = "SELECT * FROM produtos";
$statement = $pdo -> query($sql1);
$arrayProdutos = $statement -> fetchAll(PDO::FETCH_CLASS, Produto::class);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>DuArte Presentes e Brinquedos</title>
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
    <div id="corpo">
        <h2 class="h2">Produtos</h2>
        <div class="container-produtos">
        <?php foreach ($arrayProdutos as $produto){ ?> 
            <div class="produto"> 
                    <h2> <?= "{$produto->retornaNome()}"?> </h2>
                    <div class="container-imagem">
                        <img src="<?= "imagens/" . "{$produto->retornaImagem()}"?>" alt="<?= "{$produto->retornaNome()}"?>">
                    </div>
                    <p> <?= "{$produto->retornaDescricao()}"?> </p>
                    <p id="preco"> <?= "R$"."{$produto->retornaValor()}"?> </p>
            </div>
            <?php }; ?> 
        </div>
    </div>


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