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
	//$delegado = $_POST['delegado'];
	//$delegado_suplente = $_POST['delegado_suplente'];
    //$delegado_nato = $_POST['delegado_nato'];
   

    //Pega os valores do formulário de cadastro - Dados Pessoais
    $matricula = $_POST['matricula'];
    $nomeclube = $_POST['nomeclube'];
    $regiao = $_POST['regiao'];
    $comissao = $_POST['comissao'];
    $ingressolions = $_POST['ingressolions'];
    $melvinjones = $_POST['melvinjones'];

   
// Condição para aceitar campo vazio no tipo date. 

        alert($datanascimento);

	if(empty($datanascimento)){
		alert('campo data nascimento');
		$datanascimento = NULL;
	}

	if(empty($ingressolions)){
	   alert('campo data nascimento');	
	   $ingressolions = NULL;
	}
	
    // instancia classe com as operaçoes crud, passando o nome da tabela como parametro
    $crud = new crud('tb_membros');  

    $consultaNome = mysql_query("SELECT * FROM tb_membros WHERE nome = '$nome'");
   
    if(mysql_num_rows($consultaNome)> 0){
        echo "<script type='text/javascript'> alert('Seu cadastro já foi realizado!'); 
            window.location = 'index.html#form'; </script>";
    }else{
         // utiliza a funçao INSERIR da classe crud
    $crud->inserir("nome, nomeconjugue, naturalidade, estado, funcao, datanascimento, email, 
                    endereco, telefone, matricula, nomeclube, regiao, comissao, ingressolions, 
                    melvinjones","'$nome', '$nomeconjugue', '$naturalidade', '$estado', 
                    '$funcao', '$datanascimento', '$email', '$endereco', '$telefone', '$matricula', 
                    '$nomeclube', '$regiao', '$comissao', '$ingressolions', '$melvinjones'
					"); 

 

    echo "<script type='text/javascript'> alert('Cadastro realizado com Sucesso!');";
    header("Location: index.html"); // redireciona para a listagem
    }
?>
