<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco


    //Pega os valores do formulário de cadastro - Dados do Clube
    $nome = $_POST['nome'];  
    $nomeconjugue = $_POST['nomeconjugue'];  
    $naturalidade = $_POST['naturalidade'];  
    $estado = $_POST['estado'];  
    $funcao = $_POST['funcao'];  
    $datanascimento = $_POST['datanascimento'];  
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    //Pega os valores do formulário de cadastro - Dados Pessoais
    $matricula = $_POST['matricula'];
    $nomeclube = $_POST['nomeclube'];
    $regiao = $_POST['regiao'];
    $comissao = $_POST['comissao'];
    $ingressolions = $_POST['ingressolions'];
    $melvinjones = $_POST['melvinjones'];
    $buttonenviar = $_POST['buttonenviar'];

    // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
    $crud = new crud('tb_membros');  

    // utiliza a funçao INSERIR da classe crud
    $crud->inserir("nome, nomeconjugue, naturalidade, estado, funcao, datanascimento, email, 
                    endereco, telefone, matricula, nomeclube, regiao, comissao, ingressolions, 
                    melvinjones, buttonenviar", "'$nome', '$nomeconjugue', '$naturalidade', '$estado', 
                    '$funcao', '$datanascimento', '$email', '$endereco', '$telefone', '$matricula', 
                    '$nomeclube', '$regiao', '$comissao', '$ingressolions', '$melvinjones', '$buttonenviar'"); 

    header("Location: index.php"); // redireciona para a listagem
?>