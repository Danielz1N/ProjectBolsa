<?php
	
	include('conexao.php');
	if((isset($_POST['login'])) && (isset($_POST['password']))){
		$login = $_POST['login'];
		$password = $_POST['password'];

		$get = mysqli_query($conn,"SELECT * FROM usuarios WHERE login = '$login' AND senha = $password");
		$num = mysqli_num_rows($get);

		if ($num==1) {
			while($percorrer = mysqli_fetch_array($get)){
				$adm = $percorrer['nivel_acesso'];
				$nome = $percorrer['login'];

				session_start();

				if ($adm == 1) {
					$_SESSION['adm'] = $login;
					$_SESSION['nor'] = NULL;
					echo '<script type="text/javascript">window.location="admnistradores/index.php"</script> ';
				}else{
					$_SESSION['adm'] = NULL;
					$_SESSION['nor'] = $login;
					echo '<script type="text/javascript">window.location="consultores/index.php"</script> ';
				}
			}
		}else{
			echo 'Login ou password inválidos.';
		}

	}else{
		echo 'Erro';
	}


?>