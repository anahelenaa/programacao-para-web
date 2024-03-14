<?php 

require_once "../vendor/autoload.php";
require_once "ConexaoBD.php";

use App\Classes\Produto;
use App\Classes\Contato;
use App\Classes\ProdutoRepositorio;



if(isset($_POST['cadastro'])){
    $pastaAlvo = "../front-end/imagens/";
    $arquivoAlvo = $pastaAlvo . basename($_FILES["imagem"]["name"]);
    $uploadOk = 1;
    $tipoArquivoImagem = strtolower(pathinfo($arquivoAlvo,PATHINFO_EXTENSION));
    
    $produto = new Produto();
    $produto->cadastraProduto(
        $_POST['nome'], 
        $_POST['valor'], 
        $_POST['descricao'], 
        $_FILES["imagem"]["name"], 
        $_POST['quantidade'],
    );

    $produtoRepositorio = new ProdutoRepositorio($pdo);
    $status = $produtoRepositorio->cadastraProdutosBanco($produto);

    $erro = null;
    
    $checa = getimagesize($_FILES["imagem"]["tmp_name"]);
    if($checa !== false) {
        $uploadOk = 1;
    } else {
        $erro .= "Arquivo não é uma imagem.";
        $uploadOk = 0;
    }

    if (file_exists($arquivoAlvo)) {
        $erro .= "Desculpe, arquivo já existe.";
        $uploadOk = 0;
    }
    
    if ($_FILES["imagem"]["size"] > 500000) {
        $erro .= "Desculpe, seu arquivo é muito grande.";
        $uploadOk = 0;
    }
    
    if($tipoArquivoImagem != "jpg" && $tipoArquivoImagem != "png" && $tipoArquivoImagem != "jpeg"
    && $tipoArquivoImagem != "gif" ) {
      $erro .= "Desculpe, apenas arquivos do tipoJPG, JPEG, PNG & GIF são permitidos.";
      $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        $erro .= "Desculpe, upload não foi concluido.";

    } else {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivoAlvo)) {
          
        } else {
          $erro .= "Desculpe, houve um erro na hora de carregar seu arquivo.";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
    <link rel="stylesheet" href="../front-end/CadastrarProduto.css">
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
        <h2 class="h2">Cadastro de produtos</h2>
        <div class="container-formulario">
            <form enctype="multipart/form-data" onsubmit="exibeAlerta()" method="post" class="formulario">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto" >
                <label for="valor">Valor</label>
                <input type="text" name="valor" id="valor" placeholder="Digite o valor do produto" >
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição do produto" >
                <label for="imagem">Imagem</label>
                <input type="file" accept="image/*" name="imagem" id="imagem" placeholder="Insira a imagem do produto" >
                <label for="quantidade">Estoque</label>
                <input type="number" name="quantidade" id="quantidade" placeholder="Digite o estoque" >
                <input type="submit" name="cadastro" class="botao-cadastrar" value="Cadastrar Produto">
            </form>
        </div>
    </div>
    <?php if(isset($erro)){?>
        <div class="erro">
            <p><?= $erro ?></p>
        </div>
    <?php }?>
    

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