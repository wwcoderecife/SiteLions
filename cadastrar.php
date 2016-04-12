<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco


    //Pega os valores do formulário de cadastro através do atributo NAME
    $nome = $_POST['nome'];  
    
    // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
    $crud = new crud('tb_membros');  

    // utiliza a funçao INSERIR da classe crud
    $crud->inserir("nome,descricao", "'$nome','$descricao'"); 

    header("Location: index.php"); // redireciona para a listagem
?>