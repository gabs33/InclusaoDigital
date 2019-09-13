<?php

$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = MD5 ($_POST['senha']);
$connect = mysqli_connect('localhost','root', '', 'inclusao_digital');
//$db = mysqli_select_db('inclusao_digital', $connect) or print(mysqli_error());
$query_select = "SELECT email FROM usuario WHERE email = '$email'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['email'];

	if ($email == "" || $email == null){
		echo "<script>
				alert('O campo email deve ser preenchido');
				window.location.href='cadastro.php';
			</script>';";
	}else{
		if($logarray == $email){

			echo "<script>
				alert('O  email ja foi cadastrado');
				window.location.href='cadastro.php';
			</script>';";
		die();
		}else{
			$query = "INSERT INTO usuario (email,nome,senha) VALUES ('$email','$nome','$senha')";
			$insert = mysqli_query($connect, $query);
			if($insert){
				echo "<script>
				alert('Email cadastrado com sucesso');
				window.location.href='cadastro.php';
			</script>';";
			}else{
				echo"<script language='javascript' type='text/javascript'>
				alert('Não foi possivel cadastrar este email');window.location.href='cadastro.php'</script>";
			}
		}
	}
	?>