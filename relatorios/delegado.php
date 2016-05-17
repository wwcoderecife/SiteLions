<?php

	require_once 'config/conexao.class.php';
	$con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

	$delegado= mysql_query("SELECT * FROM tb_membros  where comissao = 1 order by nome");
	$delegadonato= mysql_query("SELECT * FROM tb_membros  where comissao = 2 order by nome");
	
				
	echo "
	<button type='button' onclick='print_specific_div_content(\"printTopIdososJovens\",\"Top Idoso/Jovens\")' class='btn btn-default btn-sm' style='float: right'>
      <span class='glyphicon glyphicon-print'></span> Imprimir
    </button>
    <div class='table-responsive' id='printTopIdososJovens'>
	<table class='table table-condensed table-hover'>
		<thead>
	      <th>Delegado</th>
	    </thead>
		<thead>
	      <tr>
	        <th>Nome</th>
	        <th>Função</th>
	        <th>Nome do Clube</th>
	        <th>Comissão</th>
	      </tr>
	    </thead>
	    <tbody>";
	// vamos criar a visualização 
	while ($dados = mysql_fetch_array($delegado)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["funcao"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["comissao"]."</td>
	      </tr>";
	} 
	echo "
	<thead>
	      <th>Delegado Nato</th>
	    </thead>
		<thead>
	      <tr>
	        <th>Nome</th>
	        <th>Funcão</th>
	        <th>Nome do Clube</th>
	        <th>Comissão</th>
	      </tr>
	    </thead>
	    ";
		// vamos criar a visualização 
	while ($dados = mysql_fetch_array($delegadonato)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["funcao"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["comissao"]."</td>
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
	        <th>Função</th>
	        <th>Nom do Clube</th>
	      </tr>
	    </thead>
	    <tbody>";
	// vamos criar a visualização 
	while ($dados = mysql_fetch_array($todos)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["funcao"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["comissao"]."</td>
	      </tr>";
	} 
	echo "</tbody>
			</table>
			</div>";

?>
