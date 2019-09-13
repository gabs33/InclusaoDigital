<?php

session_start();

$tema = $_POST['tema'];
$texto = $_POST['texto'];
$connect = mysqli_connect('localhost','root', '', 'inclusao');
//$db = mysqli_select_db('inclusao_digital', $connect) or print(mysqli_error());
$query_select = "SELECT texto FROM texto WHERE texto = '$texto'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['texto'];

	if ($texto == "" || $texto == null){
		echo "<script>
				alert('O campo texto deve ser preenchido');
				window.location.href='logado.php';
			</script>';";
	}
		die();
		}else{
			$query = "INSERT INTO texto (usuario_id,temas_id, texto, validacao) VALUES ('$nome','$email','$senha')";
			$insert = mysqli_query($connect, $query);
			if($insert){
				echo "<script>
				alert('Texto cadastrado com sucesso');
				window.location.href='logado.php';
			</script>';";
			}else{
				echo"<script language='javascript' type='text/javascript'>
				alert('Não foi possivel cadastrar este este texto');window.location.href='logado.php'</script>";
			}
		}
	}
	?>