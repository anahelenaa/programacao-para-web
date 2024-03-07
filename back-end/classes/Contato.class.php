<?php 

class Contato {
    private string $nome;
    private string $sobrenome;
    private string $telefone;
    private string $email;
    private Produto $produtoDeInteresse;

    public function alertaEstoque(){

        $link = "https://a.co/d/4Xo42rN";
        $message = "Olá {$this->nome}!\r\n O produto {$this->produtoDeInteresse->retornaNome()} retornou ao estoque!\r\n Corra antes que acabe! {$link}";

        $message = wordwrap($message, 70, "\r\n");

        mail($this->email, $this->produtoDeInteresse->retornaNome(), $message);
    }

    public function cadastraContato(string $nomeContato, string $sobrenomeContato, string $telefoneContato, string $emailContato){
        $this->nome = $nomeContato;
        $this->sobrenome = $sobrenomeContato;
        $this->telefone = $telefoneContato;
        $this->email = $emailContato;
    }

    public function recebeProdutoDeInteresse(Produto $produto){
        $this->produtoDeInteresse = $produto;
    }

}