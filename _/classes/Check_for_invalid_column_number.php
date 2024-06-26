<?php
	include_once "Error_generic.php";
	class Check_for_invalid_column_number
	{
		public function __construct
		(
			$root_folder,
			$rows
		)
		{
			if (count($rows[0]) != 44)
			{
				new Error_generic($root_folder, "", "El archivo no tenía los 44 campos requeridos por el numeral 5 del documento del INTT.");
			};
		}
	}
?>