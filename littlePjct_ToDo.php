<?php

	//iniciando a ação=>
	session_start();

	//verificando se o form foi enviado =>
	//o 'act' é o name do input que envia o form
	if (isset($_POST['act'])) {

		//recuperando/pegando o que foi escrito (valor) no input task | filtrando se o usuário colocar tags
		$tarefa = strip_tags($_POST['task']);

		//verificando se exite a seção tarefas
		if (!isset($_SESSION['tarefas'])) {
			$_SESSION['tarefas'] = array();
			$_SESSION['tarefas'][] = $tarefa;

		}else{
			$_SESSION['tarefas'][] = $tarefa;

		}

		echo "<script>alert('Consulta de lembrete: OK')</script>";
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lembretes rápidos | Com php</title>
</head>
<body>
	<br>
	<h1 style="margin-left: 10px;border-radius: 15px;">Lembretes rápidos | by saihtaM</h1>
	<form method="POST" style="margin-left: 10px;"><input type="submit" name="deletarTask" value="Deletar Lembretes"></form>
	<form method="POST" class="form">
		<br>
		<textarea type="text" name="task" placeholder="Digite o novo lembrete" style="width: 400px;color:black;height:200px;box-shadow: 0 0 20px 4px black;resize: none;" maxlength="600" minlength="2" required></textarea>

		<input type="submit" name="act" value="Salvar lembrete" style="width:400px;background: #374AC5;color: #fff;border: none;border-radius: 3px;cursor: pointer;">
	</form>
	<br>
	<hr style="border-color:orange;position: absolute;width: 90vw;margin-left: 5vw;"><br>
	<h2 style="text-align: center;">Lembretes:</h2>
	<?php
		echo "<div class='lembretes'>" . $_SESSION['tarefas'][] =$tarefa . "<div>";	
	?>
</body>
</html>
<style type="text/css">
	*{margin: 0;box-sizing: border-box;font-family: monospace;}
	body{height: 100vh;width:100vw;background: #374A;overflow-x: hidden;}
	.form{display: flex;flex-direction: column;align-items:center;margin-top: 15vh;}
	.lembretes{border: 1px solid white;display: flex;align-items: center;justify-content: center;width: 50vw;height: auto;transform: translateX(25vw);margin-top: 10vh;}

</style>