<?php

	require_once 'config/conexao.class.php';
	$con = new conexao(); // instancia classe de conxao
        $con->connect(); // abre conexao com o banco

//	$delegado= mysql_query("SELECT * FROM tb_membros  where comissao = 2 order by regiao");
	$delegado= mysql_query("SELECT CASE WHEN comissao = 2 THEN  'Delegado' end as comissao, nome, nomeclube, regiao  FROM tb_membros  where comissao = 2 order by regiao");
//	$delegadosuplente= mysql_query("SELECT * FROM tb_membros  where comissao = 3 order by regiao");
	$delegadosuplente= mysql_query("SELECT CASE WHEN comissao = 3 THEN  'Suplente' end as comissao, nome, nomeclube, regiao  FROM tb_membros  where comissao = 3 order by regiao");
//	$delegadonato= mysql_query("SELECT * FROM tb_membros  where comissao = 4 order by regiao");
	$delegadonato= mysql_query("SELECT CASE WHEN comissao = 4 THEN  'Nato' end as comissao, nome, nomeclube, regiao  FROM tb_membros  where comissao = 4 order by regiao");

	
				
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
	        <th>Nome do Clube</th>
	        <th>Regiao</th>
	        <th>Comissão</th>
	        <th>Assinatura</th>
	      </tr>
	    </thead>
	    <tbody>";
	// vamos criar a visualização 
	while ($dados = mysql_fetch_array($delegado)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["regiao"]."</td>
	        <td>".$dados["comissao"]."</td>
	        <td>____________________________</td>
	      </tr>";
	} 
	echo "
	<thead>
	       <th>Delegado Nato</th>
	    </thead>
		<thead>
	      <tr>
	        <th>Nome</th>
	        <th>Nome do Clube</th>
	        <th>Regiao</th>
	        <th>Comissão</th>
	        <th>Assinatura<th>
	      </tr>
	    </thead>
	    ";
		// vamos criar a visualização 
	while ($dados = mysql_fetch_array($delegadonato)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["regiao"]."</td>
	        <td>".$dados["comissao"]."</td>
	        <td>____________________________</td>
	      </tr>";
	}; 
	//Tabela Delegado Suplente

			echo "
	<thead>
	      <th>Delegado Suplente</th>
	    </thead>
		<thead>
	      <tr>
	        <th>Nome</th>
	        <th>Nome do Clube</th>
	        <th>Região</th>
	        <th>Comissão</th>
	        <th>Assinatura</th>
	       </tr>
	    </thead>
	    ";
		// vamos criar a visualização 
	while ($dados = mysql_fetch_array($delegadosuplente)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["regiao"]."</td>
	        <td>".$dados["comissao"]."</td>
	        <td>____________________________</td>
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
	        <th>Nome do Clube</th>
	        <th>Região</th>
	      </tr>
	    </thead>
	    <tbody>";
	// vamos criar a visualização 
	while ($dados = mysql_fetch_array($todos)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["regiao"]."</td>
	        <td>".$dados["comissao"]."</td>
	      </tr>";
	} 
	echo "</tbody>
			</table>
			</div>";

?>
