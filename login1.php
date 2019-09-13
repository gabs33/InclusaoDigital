<?php
session_start();

$_SESSION = $_POST['email'] = $resultados['email'];
$_SESSION = $_POST['entrar'] = $resultados['entrar'];
// $_SESSION = MD5 ($_POST['senha'] = $resultados['senha']);
// $connect = mysqli_connect('localhost','root', '', 'inclusao');
//$resultados = mysql_fetch_array($query1);


//$db = mysqli_select_db('inclusao_digital', $connect) or print(mysqli_error());
//$query_select = "SELECT email FROM usuario WHERE email = '$email'";
//$select = mysqli_query($connect, $query_select);
//$array = mysqli_fetch_array($select);
//$logarray = $array['email'];

	require 'app/functions/bdq.php';
	$_SESSION['email'] = $validate->email;
	$_SESSION['senha'] = $validate->senha;	

	if($entrar){
		$validate = validate([            
            'email' => 'e',
            'senha' => 's'
		]);
		$validate->senha = md5($validate->senha);
		$usuarioEmail = DBReadOne("usuario","idUsuario","WHERE email = \"$validate->email\"");
		$usuarioSenha = DBReadOne("usuario","senha","WHERE email = \"$validate->email\"");
		if($usuarioEmail==NULL){
			echo "<script>
						alert('Email incorreto');
						window.location.href='login.php';
					</script>';";
		} else{
			if($validate->senha!==$usuarioSenha){
			echo "<script>
					alert('Senha incorreta');
					window.location.href='login.php';
				</script>';";
			}
			
			$_SESSION['id'] = $usuarioEmail;
			$_SESSION['email'] = $validate->email;
			$id = $usuarioEmail;
			$_SESSION['nome'] = DBReadOne("usuario","nome","WHERE idUsuario = $id");
			unset($_SESSION['email']);
			unset($_SESSION['senha']);

		}
	}
?>