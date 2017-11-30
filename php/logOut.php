<!DOCTYPE html>
<?php
	session_start();
	session_destroy();
	echo "<script>
				alert('Laster arte!');
				window.location.href='layout.php';
		</script>";
?>