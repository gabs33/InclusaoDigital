<?php
session_start();

$_SESSION = $_POST['email'] = $resultados['email'];
$_SESSION = $_POST['entrar'] = $resultados['entrar'];
$_SESSION = MD5 ($_POST['senha'] = $resultados['senha']);
$connect = mysqli_connect('localhost','root', '', 'inclusao');
//$resultados = mysql_fetch_array($query1);


//$db = mysqli_select_db('inclusao_digital', $connect) or print(mysqli_error());
//$query_select = "SELECT email FROM usuario WHERE email = '$email'";
//$select = mysqli_query($connect, $query_select);
//$array = mysqli_fetch_array($select);
//$logarray = $array['email'];

	if (isset($entrar)){

		$verifica = mysqli_query("SELECT * FROM usuarios WHERE usuario = $_POST['email'] AND senha = $_POST['senha']") or die ("erro ao selecionar");
		if (mysqli_num_rows($verifica)<=0){
			echo "<script>
				alert('email ou senha incorretos.');
				window.location.href='login.php';
			</script>';";
				die();
		}else{
				apd_set_session("email",$email);
				header("Location:logado.php");
			}
		}
			
?>