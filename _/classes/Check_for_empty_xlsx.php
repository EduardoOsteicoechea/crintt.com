<?php
	include_once "Error_generic.php";
	class Check_for_empty_xlsx
	{
		public function __construct
		(
			$root_folder,
			$rows
		)
		{
			if (count($rows) == 1 && $rows[0][0] == "")
			{
				new Error_generic($root_folder, "", "El archivo .xlsx estaba vacío.");
			};
		}
	}
?>