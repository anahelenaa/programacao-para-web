<?php
require_once "classes/Produto.class.php";
require_once "classes/Contato.class.php";


$pdo = new PDO('sqlite:banco/banco.sqlite');

echo 'Conectei';


do{
    echo "-----MENU-----" . PHP_EOL;
    echo "1 => Cadastrar produto" . PHP_EOL;
    echo "2 => Cadastrar Contato" . PHP_EOL;
    echo "0 => Sair" . PHP_EOL;

    $opcaoMenu = readline("Insira a opção desejada: ");

    switch ($opcaoMenu){
        case '1':
            do{ $nomeProduto = readline("Insira o nome do produto: " . PHP_EOL);
                $valorProduto = readline("Insira o valor do produto: " . PHP_EOL);
                $descricaoProduto = readline("Insira a descricao do produto: " . PHP_EOL);
    
                $produto = new Produto();
                $produto->cadastraProduto($nomeProduto, $valorProduto, $descricaoProduto);
    
                $arrayProdutos[] = $produto;
                unset($produto);

                $opcaoCadastrarProduto = readline("Digite 0 para cadastrar mais um produto e 1 para voltar: " . PHP_EOL);

                while($opcaoCadastrarProduto != 1 && $opcaoCadastrarProduto != 0){
                    echo "Opção invalida!!" . PHP_EOL;
                    $opcaoCadastrarProduto = readline("Digite 0 para cadastrar mais um produto e 1 para voltar: " . PHP_EOL);
                }

            } while($opcaoCadastrarProduto != 1);

            break;

        case '2':
            do{
                $nomeContato = readline("Insira o nome do contato: " . PHP_EOL);
                $sobrenomeContato = readline("Insira o sobrenome do contato: " . PHP_EOL);
                $telefoneContato = readline("Insira o telefone do contato: " . PHP_EOL);
                $emailContato = readline("Insira o email do contato: " . PHP_EOL);


                $contato = new Contato();
                $contato->cadastraContato($nomeContato,  $sobrenomeContato, $telefoneContato, $emailContato);

                foreach($arrayProdutos as $indice => $produto){
                    echo "Produto {$indice}: {$produto->retornaNome()}" . PHP_EOL;

                }

                $produtoDeInteresse = readline("Insira o numero do produto de interesse do contato: " . PHP_EOL);
                
                $contato->recebeProdutoDeInteresse($arrayProdutos[$produtoDeInteresse]);

                $opcaoCadastrarContato = readline("Digite 0 para cadastrar mais um contato e 1 para voltar: " . PHP_EOL);

                while($opcaoCadastrarContato != 1 && $opcaoCadastrarContato != 0){
                    echo "Opção invalida!!" . PHP_EOL;
                    $opcaoCadastrarContato = readline("Digite 0 para cadastrar mais um contato e 1 para voltar: " . PHP_EOL);
                }

            } while ($opcaoCadastrarContato != 1);

            break;

        case '0':
            echo "Tchau! :)";
            break;

        default:
            echo PHP_EOL . "Opção invalida!! selecione outra opção." . PHP_EOL;
    }
}while($opcaoMenu != 0);


