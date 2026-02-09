<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

	function go_login(){
		$is_authenticated = isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;

		if (!$is_authenticated) {
			header('Location: http://localhost/php/OEAMS/admin/');
			exit;
		}
	}
?>