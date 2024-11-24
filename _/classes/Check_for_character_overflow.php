<?php
	include_once "Error_generic.php";
	function Check_for_character_overflow
	(
		$field_spare_character_number,
		$field_value,
		$field_name,
		$row,
		$column
	)
	{
		if ($field_spare_character_number != 0)
		{
			$message = "";
			$message .= "<b>Error en la fila " . $row . " columna " . $column . ".</b>";
			$message .= " El campo ".$field_name." tenía " .$field_spare_character_number. " caracteres sobrantes.";
			$message .= " Ingrese un valor que posea ".(strlen($field_value) - $field_spare_character_number)." caracteres.";
			$message .= "<br>";
			return $message;
		};
	}
?>