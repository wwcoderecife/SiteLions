<?php

	require_once 'config/conexao.class.php';
	$con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

	$topVelhos = mysql_query("SELECT * FROM tb_membros order by datanascimento asc LIMIT 0, 5");
	$topNovos = mysql_query("SELECT * FROM tb_membros order by datanascimento desc LIMIT 0, 5");
				
	echo "
	<button type='button' onclick='print_specific_div_content(\"printTopIdososJovens\",\"Top Idoso/Jovens\")' class='btn btn-default btn-sm' style='float: right'>
      <span class='glyphicon glyphicon-print'></span> Imprimir
    </button>
    <div class='table-responsive' id='printTopIdososJovens'>
	<table class='table table-condensed table-hover'>
		<thead>
	      <th>Idosos</th>
	    </thead>
		<thead>
	      <tr>
	        <th>Nome</th>
	        <th>Clube</th>
	        <th>Distrito</th>
	        <th>Data Nascimento</th>
	      </tr>
	    </thead>
	    <tbody>";
	// vamos criar a visualização 
	while ($dados = mysql_fetch_array($topVelhos)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["regiao"]."</td>
	        <td>".$dados["datanascimento"]."</td>
	      </tr>";
	} 
	echo "
	<thead>
	      <th>Jovens</th>
	    </thead>
		<thead>
	      <tr>
	        <th>Nome</th>
	        <th>Clube</th>
	        <th>Distrito</th>
	        <th>Data Nascimento</th>
	      </tr>
	    </thead>
	    ";
		// vamos criar a visualização 
	while ($dados = mysql_fetch_array($topNovos)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["regiao"]."</td>
	        <td>".$dados["datanascimento"]."</td>
	      </tr>";
	}; 

	echo "</tbody>
			</table>
			</div>";
	

//Criar a tabela para impressão
echo "<div class='table-responsive' id='print' style='display:none;'>
	<table class='table table-condensed table-hover'>
		<thead>
	      <tr>
	        <th>Nome</th>
	        <th>Clube</th>
	        <th>Distrito</th>
	      </tr>
	    </thead>
	    <tbody>";
	// vamos criar a visualização 
	while ($dados = mysql_fetch_array($todos)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["regiao"]."</td>
	        <td>".$dados["datanascimento"]."</td>
	      </tr>";
	} 
	echo "</tbody>
			</table>
			</div>";

?>