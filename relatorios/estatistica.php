<p> 
	<h4>Total geral de inscritos</h4>
	<?php $total = mysql_query("select * from tb_membros");
	$tr = mysql_num_rows($total); 
	echo $tr; ?>
</p>
<h4>Total de inscritos por clube</h4>
<?php
	$clubes = mysql_query("select distinct nomeclube from tb_membros");
	while ($dados = mysql_fetch_object($clubes)) {

		$consulta = mysql_query("select * from tb_membros where nomeclube = '$dados->nomeclube'");
		$qtde_clube = mysql_num_rows($consulta);
		echo "<p>".$dados->nomeclube.": ".$qtde_clube."</p>";
	
	} 
?>