<!-- homePage.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$email = $_POST['loginEmail'];
	$password = $_POST['loginPassword'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Home</title>
	<link rel="stylesheet" href="index.css" type="text/css" />

	<?php
		include 'phpHelper.php';
		@ $db = new mysqli('localhost', 'root', '', 'team01_mon_amis');
		if(mysqli_connect_errno()){
			echo 'Error...Idiot';
			echo mysqli_connect_error();
			exit;
		}
	?>
	</head>
	<body>
		<?php
			validateLogin($email, $password);
		?>

	</body>
