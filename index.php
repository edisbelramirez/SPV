<?php
	if(!isset($_SESSION)){
    	session_start();
	}

	$id_user = $_SESSION['idUsuario'];

	if(!isset ($_SESSION['idUsuario'])) {
    	header('Location: login.php');
	}

	require_once('evento/action/conexao.php');
	date_default_timezone_set('America/Bogota');
	

	$database = new Database();
	$db = $database->conectar();

	$sql = "SELECT id_evento, titulo, descricao, inicio, termino, cor, fk_id_destinatario, fk_id_remetente, status FROM eventos as e
	LEFT JOIN convites as c ON e.id_evento = c.fk_id_evento
	Where fk_id_usuario = $id_user";
	$req = $db->prepare($sql);
	$req->execute();
	$events = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="es-do">

	<head>

    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="">
    	<meta name="author" content="">

    	<title>SPV - Sistema de Planificación de Videoconferencias</title>

    	<!-- Bootstrap Core CSS -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
	
		<!-- FullCalendar -->
		<link href='css/fullcalendar.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />

    	<!-- Custom CSS Calendario -->
    	<link href='css/calendar.css' rel='stylesheet' />

	</head>

	<body>

    	<!-- Menu Superior -->
		<?php include ('menu/menuSuperior.php'); ?>
   
		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p class="lead"></p>
					<div id="calendar" class="col-centered">
					</div>
				</div>
			</div>
			<!-- /.row -->

			<!-- Valida data dos Modals -->
			<script type="text/javascript">
				function validaForm(erro) {
					if(erro.inicio.value>erro.termino.value){
						alert('La fecha de inicio debe ser menor o igual a la del término horario establecido');
						return false;
					}else if(erro.inicio.value==erro.termino.value){
						alert('Defina un horario de inicio en un término de 24 horas)');
						return false;
					}
				}
			</script>


			<!-- Modal Adicionar Evento -->
			<?php include ('evento/modal/modalAdd.php'); ?>
			
			
			<!-- Modal Editar/Mostrar/Eliminar Evento -->
			<?php include ('evento/modal/modalEdit.php'); ?>

		</div>

		<!-- jQuery Version 1.11.1 -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		
		<!-- FullCalendar -->
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='locale/es-do.js'></script>
		<?php include ('calendario.php'); ?>
		

	</body>

</html>