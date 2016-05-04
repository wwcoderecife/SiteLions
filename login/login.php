<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<!-- BASICS -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GREEN responsive bootstraap template</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link href="css/responsive-slider.css" rel="stylesheet">
		<link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- skin -->
		<link rel="stylesheet" href="skin/default.css">
    </head>
	 
    <body>
	
	
<?php
    require_once '../config/conexao.class.php';
    require_once '../config/crud.class.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

    // session_start inicia a sessão
    session_start();

    //Pega os valores do formulário de cadastro através do atributo NAME
    $login = $_POST['login'];  
    $password = $_POST['password'];  
    
   $consulta = mysql_query("SELECT * FROM tb_usuarios WHERE login = '$login' and senha = $password");

   
   if($consulta){
   	 $usuario = mysql_fetch_array($consulta);
     $_SESSION['login'] = $login;
     $_SESSION['senha'] = $senha;
     header('location:../relatorios.html?pagina=1');
   	 //echo "<script type='text/javascript'>window.location = '../relatorios.php?id=$usuario[id]'; </script>";
   }else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
   	echo "<script type='text/javascript'> alert('Login ou senha inválidos!'); 
   	 	window.location = '../index.html#restrito'; </script>";
   }

?>
</body>
</html>