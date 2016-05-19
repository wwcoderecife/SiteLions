<?php

	require_once 'config/conexao.class.php';
	$con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

	$busca = ("SELECT * FROM tb_membros order by nome");
	$total_reg = "10";

	$pagina = $_GET['pagina'];  
	if($pagina == NULL){
	   $pagina = 1;
	}
	$pc = $pagina; 
	

	$inicio = $pc - 1; 
	$inicio = $inicio * $total_reg;


	$limite = mysql_query("$busca LIMIT $inicio,$total_reg"); 
	$todos = mysql_query("$busca"); 
	$tr = mysql_num_rows($todos); // verifica o número total de registros 
	$tp = ceil($tr / $total_reg); // verifica o número total de páginas

	echo "
	<button type='button' onclick='print_specific_div_content(\"print\",\"Membros\")' class='btn btn-default btn-sm' style='float: right'>
      <span class='glyphicon glyphicon-print'></span> Imprimir
    </button>
    <div class='table-responsive'>
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
	while ($dados = mysql_fetch_array($limite)) { 
	 echo "<tr>
	        <td>".$dados["nome"]."</td>
	        <td>".$dados["nomeclube"]."</td>
	        <td>".$dados["regiao"]."</td>
	      </tr>";
	} 
	echo "</tbody>
			</table>
			</div>";
	// agora vamos criar os botões "Anterior e próximo" 
	$anterior = $pc -1; 
	$proximo = $pc +1; 

	echo "<nav><ul class='pagination'>
		   <li>
		  <a href='?pagina=1' aria-label='Previous'>
		    <span aria-hidden='true'>&laquo;</span>
		  </a>
		</li>";
	for($i = 1; $i < $tp + 1; $i++) {
	     echo "<li><a href='?pagina=$i''>$i</a></li>";
	}

	echo "<li>
	      <a href='?pagina=$tp' aria-label='Next'>
	        <span aria-hidden='true'>&raquo;</span>
	      </a>
	    </li>
	  </ul>
	</nav>";


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
	      </tr>";
	} 
	echo "</tbody>
			</table>
			</div>";
?>
