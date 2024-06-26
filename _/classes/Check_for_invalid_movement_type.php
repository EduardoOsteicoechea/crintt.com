<?php
	include_once "Error_generic.php";
	function Check_for_invalid_movement_type
	(
		$value,
		$name,
		$row,
		$column
	)
	{
		if ($value != "MA" && $value != "MV" && $value != "ME")
		{
			$message = "";
			$message .= "Error en la fila " .$row. " columna " .$column. ".";
			$message .= " El campo ".$name." solo admite los valores \"MA\" para agregar, \"MV\" para mover y \"ME\" para eliminar vehículos.";
			$message .= " El valor que ingresó fue : \"".$value."\".";
			$message .= " Ingrese uno de estos valores.";
			$message .= "<br>";
			return $message;
		};
	}
?>