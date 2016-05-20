 
 <?php session_start();?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <!-- BASICS -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Convencao DMLA</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" /> 
        <link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
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
    
    
   
    <!-- Relatório Modal 1 / Todos os Inscritos -->
    <div class="" id="portfolioModal1" >
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Relatório Details Go Here -->
                            <h2>Todos os Inscritos</h2>
                            <?php include 'relatorios/cadastrados.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

    </body>
</html>
