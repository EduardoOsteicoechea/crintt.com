<?php
	class Error_generic
	{
		public function __construct
		(
			$root_folder,
			$go_to_page,
			$error_message
		)
		{
			$_SESSION['error'] = $error_message;
			// echo $_SESSION['error'];
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
	}
?>