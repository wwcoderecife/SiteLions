<?php
	require_once 'config/conexao.class.php';
 	
 	//esse bloco de código em php verifica se existe a sessão
	session_start(); 
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) {
	 unset($_SESSION['login']); unset($_SESSION['senha']); header('location:index.html'); 
	}

	$logado = $_SESSION['login'];

	$con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco

	

?>
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
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link href="css/responsive-slider.css" rel="stylesheet">
		<link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- skin -->
		<link rel="stylesheet" href="skin/default.css">
		<script type="text/javascript">
			function print_specific_div_content(div, titulo){
			    var win = window.open('','','left=0,top=0,width=552,height=477,toolbar=0,scrollbars=1,status =0');

			    var content = "<html><link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>";
			    content += "<body onload=\"window.print(); window.close();\">";
			    content += "<h1>"+titulo+"</h1>";
			    content += document.getElementById(div).innerHTML ;
			    content += "<span>Women Who Code - Recife</span>"
			    content += "</body>";
			    content += "</html>";
			    win.document.write(content);
			    win.document.close();
			}

		</script>

    </head>
	 
    <body>
	
	
	<div class="header">
	<section id="header">
		
		<div class="navbar navbar-fixed-top" role="navigation" style="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
			
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-bars color-white"></span>
					</button>
					<h1><a class="navbar-brand" href="index.html" style="line-height:50px;">GREEN
					</a></h1>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" style="margin-top:5px;" >
						<li class="active"><a href="#cadastrados">Cadastrados</a></li>
						<li><a href="#section-about">Top 5 Idosos/Jovens</a></li>
						<li><a href="#team">Delegados/Delegados Natos</a></li>
						<li><a href="#section-contact">Totalizador</a></li>
						<li><a href="login/logout.php" class="usuario" title="Sair">Sair</a></li>	
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		
		
	</section>
	</div>
	

	<!--Cadastrados-->
	<section id="cadastrados">
		<div class="container">
			<div class="about">
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="title">
							<div class="wow bounceIn">
							<h2 class="section-heading animated" data-animation="bounceInUp">Cadastrados</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
						$busca = ("SELECT * FROM tb_membros order by nome");
						$total_reg = "10";

						
						$pagina = $_GET['pagina'];  
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
						        <td>".$dados["nome_clube"]."</td>
						        <td>".$dados["distrito"]."</td>
						      </tr>";
        				} 
        				echo "</tbody>
  							</table>
  							</div>";

					?>
				</div>
					
			</div>
			
		</div>
	</section>
	<!--/Cadastrados-->
		
	<!--about-->
	<section id="section-about">
		<div class="container">
			<div class="about">
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="title">
							<div class="wow bounceIn">
						
							<h2 class="section-heading animated" data-animation="bounceInUp">Top 5 Idosos/Jovens</h2>
							
						
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
						$busca = ("SELECT * FROM tb_membros order by nome");
						$total_reg = "10";

						
						$pagina = $_GET['pagina'];  
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
						        <th>Data Nascimento</th>
						      </tr>
						    </thead>
						    <tbody>";
        				// vamos criar a visualização 
        				while ($dados = mysql_fetch_array($limite)) { 
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
						        <td>".$dados["nome_clube"]."</td>
						        <td>".$dados["distrito"]."</td>
						      </tr>";
        				} 
        				echo "</tbody>
  							</table>
  							</div>";

					?>
				</div>
					
			</div>
			
		</div>
	</section>
	<!--/about-->
		
	<!-- spacer section:testimonial -->
		<section id="testimonials-3" class="section" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">				
					<div class="col-lg-12">
							<div class="align-center">
										<div class="testimonial pad-top40 pad-bot40 clearfix">
											<h5>
												Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum. In vitae nulla lacus. Sed sagittis tortor vel arcu sollicitudin nec tincidunt metus suscipit.Nunc velit risus, dapibus non interdum.
											</h5>
											<br/>
											<span class="author">&mdash; Jouse Manuel <a href="#">www.jouse-manuel.com</a></span>
										</div>

								</div>
							</div>
					</div>
				
			</div>	
		
		</section>
		
		<!-- services -->
		<section id="services" class="section pad-bot5 bg-white">
		<div class="container"> 
				<div class="row mar-bot5">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
						<div class="wow bounceIn"data-animation-delay="7.8s">
						
							<h2 class="section-heading animated"  >Our Service</h2>
							<h4>Neque porro quisquam est, qui dolorem ipsum quia dolor.</h4>
						
						</div>
						</div>
					</div>
				</div>
			<div class="row mar-bot40">
				<div class="col-lg-4" >
					<div class="wow bounceIn">
						<div class="align-center">
					
							<div class="wow rotateIn">
								<div class="service-col">
									<div class="service-icon">
										<figure><i class="fa fa-cog"></i></figure>
									</div>
										<h2><a href="#">Easy to Customize</a></h2>
										<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-lg-4" >
					<div class="align-center">
						<div class="wow bounceIn">
					   
							<div class="wow rotateIn">
								<div class="service-col">	
									<div class="service-icon">
										<figure><i class="fa fa-desktop"></i></figure>
									</div>
										<h2><a href="#">Responsive Layout</a></h2>
										<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
								</div>
							</div>	
						</div>
					</div>
				</div>
			
				<div class="col-lg-4" >
					<div class="align-center">
						<div class="wow bounceIn">
							<div class="service-col">
								<div class="service-icon">
									<figure><i class="fa fa-dropbox"></i></figure>
								</div>
									<h2><a href="#">Ready to Use</a></h2>
									<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
							</div>
						</div>
					</div>
				</div>
			
			</div>	

		</div>
		</section>
		<!--/services-->
		
		<!-- spacer section:testimonial -->
		<section id="testimonials" class="section" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">				
					<div class="col-lg-12">
							<div class="align-center">
										<div class="testimonial pad-top40 pad-bot40 clearfix">
											<h5>
												Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum. In vitae nulla lacus. Sed sagittis tortor vel arcu sollicitudin nec tincidunt metus suscipit.Nunc velit risus, dapibus non interdum.
											</h5>
											<br/>
											<span class="author">&mdash; Jouse Manuel / www.jouse-manuel.com</span>
										</div>

								</div>
							</div>
					</div>
				
			</div>	
		
		</section>
			
		<!-- team -->
		<section id="team" class="team-section appear clearfix">
		<div class="container">

				<div class="row mar-bot10">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
						<div class="wow bounceIn">
						
							<h2 class="section-heading animated" data-animation="bounceInUp">Our Team</h2>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia non numquam.</p>
						
						</div>
						</div>
					</div>
				</div>

					<div class="row align-center mar-bot45">
						<div class="col-md-4">
						<div class="wow bounceIn" data-animation-delay="4.8s">
							<div class="team-member">
								<div class="profile-picture">
									<figure><img src="img/members3.jpg" alt=""></figure>
									<div class="profile-overlay"></div>
										<div class="profile-social">
											<div class="icons-wrapper">
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
												<a href="#"><i class="fa fa-linkedin"></i></a>
												<a href="#"><i class="fa fa-pinterest"></i></a>
												<a href="#"><i class="fa fa-google-plus"></i></a>
											</div>
										</div>
								</div>
								<div class="team-detail">
									<h4>Ron Evgeniy</h4>
									<span>User experiences</span>
								</div>
								<div class="team-bio">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, fugiat, harum, adipisci accusantium minus asperiores.</p>
								</div>
							</div>
						</div>
						</div>
						<div class="col-md-4">
							
							<div class="wow bounceIn">
							<div class="team-member">
								<div class="profile-picture">
									<figure><img src="img/members1.jpg" alt=""></figure>
									<div class="profile-overlay"></div>
										<div class="profile-social">
											<div class="icons-wrapper">
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
												<a href="#"><i class="fa fa-linkedin"></i></a>
												<a href="#"><i class="fa fa-pinterest"></i></a>
												<a href="#"><i class="fa fa-google-plus"></i></a>
											</div>
										</div>
								</div>
								<div class="team-detail">
									<h4>Alexander Chernov</h4>
									<span>Web developer</span>
								</div>
								<div class="team-bio">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, fugiat, harum, adipisci accusantium minus asperiores.</p>
								</div>
							</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="wow bounceIn">
							<div class="team-member">
								<div class="profile-picture">
									<figure><img src="img/members2.jpg" alt=""></figure>
									<div class="profile-overlay"></div>
										<div class="profile-social">
											<div class="icons-wrapper">
												<a href="#"><i class="fa fa-facebook"></i></a>
												<a href="#"><i class="fa fa-twitter"></i></a>
												<a href="#"><i class="fa fa-linkedin"></i></a>
												<a href="#"><i class="fa fa-pinterest"></i></a>
												<a href="#"><i class="fa fa-google-plus"></i></a>
											</div>
										</div>
								</div>
								<div class="team-detail">
									<h4>Jose Manuel</h4>
									<span>Web designer</span>
								</div>
								<div class="team-bio">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, fugiat, harum, adipisci accusantium minus asperiores.</p>
								</div>
							</div>
							</div>
						</div>
						
					</div>
						
		</div>
		</section>
		<!-- /team -->
		
		<!-- spacer section:stats -->
		<section id="parallax1" class="section pad-top40 pad-bot40 mar-bot20" data-stellar-background-ratio="0.5">
			<div class="container ">
            <div class="align-center pad-top40 pad-bot40">
                <h4 class="color-white pad-top50">Indoctum accusamus comprehensam</h4>
				<p class="color-white">Nullam id dolor id nibh ultricies vehicula ut id elit. Donec sed odio dui. Fusce dapibus, tellus ac cursus etiam porta sem malesuada magna mollis euismod. commodo, Faccibus mollis interdum. Morbi leo risus, porta ac, vestibulum at eros.Feugiat accumsan Suspendisse eget Duis faucibus tempus pede pede augue pede. Dapibus mollis
								dignissim suscipit porta justo nisl amet Nunc quis semper.</p>
            </div>
			</div>	
		</section>
		<section id="line-pricing" class="line-section line-center">
			<div class="container pad-top50">
				<div class="row mar-bot10 ">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<div class="wow bounceIn">
						
								<h2 class="section-heading animated" data-animation="bounceInUp">Pricing Table</h2>
								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia non numquam.</p>
						
							</div>
						</div>
					</div>
				</div>
				<div class="line-wrap">
					<div class="line-pricing-table">
									<div class="pricing-table-wrap" data-scrollreveal="enter top over 0.5s after 0.3s">
										<ul>
											<li class="line-head-row">
												Free
											</li>
											<li class="line-price-row">
												<p>
													<span class="symbol">$</span>
													<span>0</span>
												</p>
												<small>Ideal for beginners</small>
											</li>
											<li>
												1 theme included
											</li>
											<li>
												1 year of theme updates
											</li>
											<li>
												20% off future purchases
											</li>
											<li class="line-btn-row">
												<a href="" class="line-btn light">Get Started</a>
											</li>
										</ul>
									</div>
									<div class="pricing-table-wrap" data-scrollreveal="enter top over 0.5s after 0.5s">
										<ul class="line-highlight">
											<li class="line-head-row">
												Premium
											</li>
											<li class="line-price-row">
												<p>
													<span class="symbol">$</span>
													<span>300</span>
												</p>
												<small>Per user / month</small>
											</li>
											<li>
												24 themes included
											</li>
											<li>
												Lifetime of premium support
											</li>
											<li>
												Access all new themes
											</li>
											<li class="line-btn-row">
												<a href="" class="line-btn green">Get Started</a>
											</li>
										</ul>
									</div>
									<div class="pricing-table-wrap" data-scrollreveal="enter top over 0.5s after 0.7s">
										<ul>
											<li class="line-head-row">
												Standard
											</li>
											<li class="line-price-row">
												<p>
													<span class="symbol">$</span>
													<span>150</span>
												</p>
												<small>Per user / month</small>
											</li>
											<li>
												12 themes included
											</li>
											<li>
												1 year of theme updates
											</li>
											<li>
												Access all new themes
											</li>
											<li class="line-btn-row">
												<a href="" class="line-btn light">Get Started</a>
											</li>
										</ul>
									</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- spacer section:testimonial -->
		<section id="testimonials-2" class="section" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">				
					<div class="col-lg-12">
							<div class="align-center">
										<div class="testimonial pad-top40 pad-bot40 clearfix">
											<h5>
												Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum. In vitae nulla lacus. Sed sagittis tortor vel arcu sollicitudin nec tincidunt metus suscipit.Nunc velit risus, dapibus non interdum.
											</h5>
											<br/>
											<span class="author">&mdash; Jouse Manuel / www.jouse-manuel.com</span>
										</div>

								</div>
							</div>
					</div>
				
			</div>	
		
		</section>
		
		<!-- section works -->
		<section id="section-works" class="section appear clearfix">
			<div class="container">
				
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">Portfolio</h2>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia non numquam.</p>
						</div>
					</div>
				</div>
					
                        <div class="row">
                          <nav id="filter" class="col-md-12 text-center">
                            <ul>
                              <li><a href="#" class="current btn-theme btn-small" data-filter="*">All</a></li>
                              <li><a href="#"  class="btn-theme btn-small" data-filter=".webdesign" >Web Design</a></li>
                              <li><a href="#"  class="btn-theme btn-small" data-filter=".photography">Photography</a></li>
                              <li ><a href="#" class="btn-theme btn-small" data-filter=".print">Print</a></li>
                            </ul>
                          </nav>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="portfolio-items isotopeWrapper clearfix" id="3">
							  
                                <article class="col-md-4 isotopeItem webdesign">
									<div class="portfolio-item">
									<div class="wow rotateInUpLeft" data-animation-delay="4.8s">
										<img src="img/portfolio/1.jpg" alt="welcome" />
									</div>
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">Project name 1</a></h5>
												<a href="img/portfolio/1.jpg" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem photography">
									<div class="portfolio-item">
									<div class="wow bounceIn">
										<img src="img/portfolio/2.jpg" alt="" />
									</div>
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">Project name 2</a></h5>
												<a href="img/portfolio/2.jpg" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>
								

                                <article class="col-md-4 isotopeItem photography">
									<div class="portfolio-item">
									<div class="wow rotateInDownRight">
										<img src="img/portfolio/3.jpg" alt="" />
									</div>	
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">Project name 3</a></h5>
												<a href="img/portfolio/3.jpg" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem print">
									<div class="portfolio-item">
									<div class="wow rotateInUpLeft">
										<img src="img/portfolio/4.jpg" alt="" />
									 </div>	
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">Project name 4</a></h5>
												<a href="img/portfolio/4.jpg" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem photography">
									<div class="portfolio-item">
									<div class="wow bounceIn">
										<img src="img/portfolio/5.jpg" alt="" />
									</div>
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">Project name 5</a></h5>
												<a href="img/portfolio/5.jpg" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem webdesign">
									<div class="portfolio-item">
									<div class="wow rotateInDownRight">
										<img src="img/portfolio/6.jpg" alt="" />
									 </div>		
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">Project name 6</a></h5>
												<a href="img/portfolio/6.jpg" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem print">
									<div class="portfolio-item">
									<div class="wow rotateInUpLeft">
										<img src="img/portfolio/7.jpg" alt="" />
									</div>
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">Project name 7</a></h5>
												<a href="img/portfolio/7.jpg" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem photography">
									<div class="portfolio-item">
									<div class="wow bounceIn">
										<img src="img/portfolio/8.jpg" alt="" />
									</div>	
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">Project name 8</a></h5>
												<a href="img/portfolio/8.jpg" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>

                                <article class="col-md-4 isotopeItem print">
									<div class="portfolio-item">
									<div class="wow rotateInDownRight">
										<img src="img/portfolio/9.jpg" alt="" />
									</div>
										 <div class="portfolio-desc align-center">
											<div class="folio-info">
												<h5><a href="#">Project name 9</a></h5>
												<a href="img/portfolio/9.jpg" class="fancybox"><i class="fa fa-external-link fa-2x"></i></a>
											 </div>										   
										 </div>
									</div>
                                </article>
                                </div>
                                        
							</div>
                                     

							</div>
                        </div>
				
			</div>
		</section>
		<section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">	
            <div class="align-center pad-top40 pad-bot30">
                <h4 class="color-white pad-top50">The middle of that asteroid field</h4>
				<p class="color-white">We can repair any dings and scrapes to your spacecraft and support,Planning a time travel trip to the middle ages Feugiat accumsan Suspendisse eget Duis faucibus tempus pede pede augue pede.Dapibus mollis
								dignissim suscipit porta justo nisl amet Nunc quis semper.</p>
            </div>
		</section>

		<!-- contact -->
		<section id="section-contact" class="section appear clearfix">
			<div class="container">
				
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">Contact us</h2>
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia non numquam.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="cform" id="contact-form">
							<div id="sendmessage">
								 Your message has been sent. Thank you!
							</div>
							<form action="contact/contact.php" method="post" role="form" class="contactForm">
							<div class="wow bounceIn">
							  <div class="form-group">
								<label for="name">Your Name</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="email">Your Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="maxlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="message">Message</label>
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
								<div class="validation"></div>
							  </div>
							</div>
							  <button type="submit" class="line-btn green">SEND MESSAGE</button>
							</form>

						</div>
					</div>
					<!-- ./span12 -->
				</div>
				
			</div>
		</section>

		<!-- Restrito -->
		<section id="restrito" class="section appear clearfix">
			<div class="container">
				
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">Área Restrita</h2>
							<p>Para ter acesso será necessário realizar login com usuário e senha.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="cform" id="contact-form">
							<div id="sendmessage">
								 Your message has been sent. Thank you!
							</div>
							<form action="login/login.php" method="post"  class="logintForm">
							<div class="wow bounceIn">
							  <div class="form-group">
								<label for="login">Login</label>
								<input type="text" name="login" class="form-control" id="login" placeholder="Login" data- />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="password">Senha</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Senha"  />
								<div class="validation"></div>
							  </div>
							 
							</div>
							  <button type="submit" class="line-btn green">Acessar</button>
							</form>

						</div>
					</div>
					<!-- ./span12 -->
				</div>
				
			</div>
		</section>
		
		
	<section id="footer" class="section footer">
		<div class="container">
			<div class="row animated opacity mar-bot0" data-andown="fadeIn" data-animation="animation">
				<div class="col-sm-12 align-center">
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>				
				</div>
			</div>

			<div class="row align-center copyright">
					<div class="col-sm-12"><p>Copyright &copy; 2014 GREEN - by <a href="http://bootstraptaste.com">Bootstrap Themes</a></p></div>
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Green
                    -->
			</div>
		</div>

	</section>
	<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>	

	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.parallax-1.1.3.js" type="text/javascript" ></script>
	<script src="js/skrollr.min.js"></script>		
	<script src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script src="js/jquery.localscroll-1.2.7-min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/responsive-slider.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/validate.js"></script>
	<script src="js/grid.js"></script>
    <script src="js/main.js"></script>
       
		
	</body>
</html>