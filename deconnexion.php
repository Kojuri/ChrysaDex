<?php
	session_start();
	//echo $_SESSION['login'];
	unset($_SESSION['login']);
	//echo $_SESSION['login'];
?>
<script>
	document.location.href="./";
</script>